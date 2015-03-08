<?php

class Borrow {
	 /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

	public $tittle_film = NULL;
	public $borrow = NULL;
	public $user = NULL;
	public $film_id = NULL;
    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct($film_id, $tittle_film, $user)
    {
		$this->tittle_film = $tittle_film;
		$this->user = $user;
		$this->connectdb();
		$this->getborrowbyfilmsql();
		$this->film_id=$film_id;
		
		if (isset($_POST["send"]) && isset($_POST["accept"])) {
			$this->addborrowsql();
			mail($_SESSION['user_email'], 'You have borrowed a film!', "Hello, 
			You have ordered a film from the Movie Rental. You have 24h since you get this email to pay. 
			After that your film will be available to you under “watch” button in the “my borrowed films” on our website.  
			Payment date is: " . date("d.m.y", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))) . "
			Film is: ". $Film->tittle ."
			Best regards S174126");
			header("Location: http://v-ie.uek.krakow.pl/~s174126/index.php?site=film&id=" . $film_id . "&message='Film borrowed!'");
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
	public function checkuseralreadyborrowed()
	{
			
		$sql = "SELECT * FROM borrow WHERE user_name = '" . $this->user . "' AND tittle_film = '" . $this->tittle_film . "';";
		$result_of_item = $this->db_connection->query($sql);
		    
		//$result_row = $result_of_item->fetch_object();
		
		//$this->borrow=$result_row->borrow;
		return $result_of_item->num_rows;
	}
    
    private function getborrowbyfilmsql()
    {
		$sql = "SELECT tittle_film FROM borrow WHERE tittle_film='" . $this->tittle_film . "';";
		$result_of_item = $this->db_connection->query($sql);
		    
		//$result_row = $result_of_item->fetch_object();
		
		//$this->borrow=$result_row->borrow;
		$this->borrow=$result_of_item->num_rows;
	}
	
	public function addborrowsql()
	{
		$sql = "INSERT INTO borrow (film_id ,tittle_film, user_name)
                            VALUES('" .  $this->film_id . "', '" .$this->tittle_film . "', '" . $this->user . "');";
        
        $query_new_borrow_insert = $this->db_connection->query($sql);
		
		$this->getborrowbyfilmsql();
		
		$sql = "UPDATE films SET borowed=" . $this->borrow . " WHERE film_id=" . $this->film_id . ";";
		$query_update_borrowed = $this->db_connection->query($sql);
	}
	
	
}
