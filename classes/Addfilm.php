<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Addfilm
{
	/**
     * @var object The database connection
     */
    private $db_connection = null;
	private $target_name = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();
    
    public function __construct()
    {			
         if (isset($_POST["add"])) {
				 if($this->uploadImage()) {
				 	$this->addNewFilm();
				 }	 
         	}
    }
	
    private function uploadImage()
    {
        $target_dir = "images/";
		$this->target_name = strip_tags($_POST['tittle_film'], ENT_QUOTES);
		$target_file = $target_dir . $this->target_name;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["image_film"]["tmp_name"]);
	    if($check !== false) {
	        $this->errors[] = "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        $this->errors[] = "File is not an image.";
	        $uploadOk = 0;
	    }
		// Check if file already exists
		if (file_exists($target_file)) {
		    $this->errors[] = "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image_film"]["size"] > 5000000) {
		    $this->errors[] = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
			return 0;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image_film"]["tmp_name"], $target_file)) {
		        $this->errors[] = "The file ". basename( $_FILES["image_film"]["name"]). " has been uploaded.";
				return 1;
		    } else {
		        $this->errors[] = "Sorry, there was an error uploading your file.";
				return 0;
		    }
		}
    }
	
	
    private function addNewFilm(){
		if (empty($_POST['tittle_film'])) {
            $this->errors[] = "Empty Tittle";
        }
        
        if (empty($_POST['description_film'])) {
            $this->errors[] = "Empty Description";
        }
		
		//create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_FILMS);

        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
        	$tittle_film = $this->db_connection->real_escape_string(strip_tags($_POST['tittle_film'], ENT_QUOTES));
			$description_film = $this->db_connection->real_escape_string(strip_tags($_POST['description_film'], ENT_QUOTES));
			$image_film = $this->db_connection->real_escape_string(strip_tags($this->target_name));
			$actors_film = $this->db_connection->real_escape_string(strip_tags($_POST['actors_film'], ENT_QUOTES));
			$pay_film = $this->db_connection->real_escape_string(strip_tags($_POST['pay_film'], ENT_QUOTES));
			
			$sql = "SELECT * FROM films WHERE tittle_film = '" . $tittle_film . "';";
            $query_check_tittle_film = $this->db_connection->query($sql);

            if ($query_check_tittle_film->num_rows == 1) {
                $this->errors[] = "Sorry, this film allready exist.";
            } else {
            	// write new user's data into database
                $sql = "INSERT INTO films (tittle_film, description_film, image_film, actors_film, pay_film)
                        VALUES('" . $tittle_film . "', '" . $description_film . "', '" . $image_film . "', '" . $actors_film . "', '" . $pay_film . "');";
                $query_new_film_insert = $this->db_connection->query($sql);

                // if user has been added successfully
                if ($query_new_film_insert) {
                    $this->messages[] = "Your film has been add";
                } else {
                    $this->errors[] = "Failed add film";
                }
			}
		}
	}
}
