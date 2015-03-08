<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Review
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();
	private $user = null;
	private $tittle_film = null;
    public function __construct($user, $tittle_film, $film_id)
    {
	    $this->user=$user;	
		$this->tittle_film=$tittle_film;	
        $this->connectdb();	
        if (isset($_POST["add"])) {	
        	$this->addreview();
			header("Location: http://v-ie.uek.krakow.pl/~s174126/index.php?site=film&id=" . $film_id . "&message='Your review have bean add!'");
			die();
		}
		
    }

    private function connectdb()
    {
        //create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_FILMS);

        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
		
		if ($this->db_connection->connect_errno) {
	            $this->errors[] = "Sorry, no database connection.";
	    } 	
    }
	
	private function addreview(){
		if (!$this->db_connection->connect_errno) {
			$tittle_review = $this->db_connection->real_escape_string(strip_tags($_POST['tittle_review'], ENT_QUOTES));
			$description_review = $this->db_connection->real_escape_string(strip_tags($_POST['description_review'], ENT_QUOTES));
			$points=$this->db_connection->real_escape_string(strip_tags($_POST['points'], ENT_QUOTES));
			$sql = "INSERT INTO reviews (tittle_film, user_name, title_review, review, points)
	                VALUES('" . $this->tittle_film . "', '" . $this->user . "', '" . $tittle_review . "', '" . $description_review . "', '" . $points . "');";
	        $query_new_review_insert = $this->db_connection->query($sql);
			$this->messages[] = $this->tittle_film;
			$this->messages[] = $this->user;
			$this->messages[] = $tittle_review;
			$this->messages[] = $description_review;
	        // if user has been added successfully
	        if ($query_new_review_insert) {
	            $this->messages[] = "Your review has been add";
	        } else {
	            $this->errors[] = $this->db_connection->error;
	        }
			
			$sql = "SELECT tittle_film FROM reviews WHERE tittle_film='" . $this->tittle_film . "';";
			$result_of_item = $this->db_connection->query($sql);
		    $reviews_count=$result_of_item->num_rows;
			
			$sql = "UPDATE films SET reviews=" . $reviews_count . " WHERE tittle_film='" . $this->tittle_film . "';";
			$query_update_reviews = $this->db_connection->query($sql);
		}

	}
	
	public function checkuser()
	{
		//$sql = "SELECT * FROM reviews WHERE user_name = '" . $this->user . "';";
		$sql = "SELECT * FROM reviews WHERE user_name = '" . $this->user . "' AND tittle_film = '" . $this->tittle_film . "';";
        $query_check_review_user = $this->db_connection->query($sql);

        if ($query_check_review_user->num_rows == 1) {
            return false;
        } else {
            return true;
        }
		
		
	}
}
