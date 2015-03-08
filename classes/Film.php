<?php
class Reviewstore{
	public $tittle_film;
	public $user_name;
	public $title_review;
	public $review;
	public $points;
	
	public function __construct($tittle_film, $user_name, $title_review, $review, $points)
    {
       $this->tittle_film=$tittle_film;
	   $this->user_name=$user_name;
	   $this->title_review=$title_review;
	   $this->review=$review;
	   $this->points=$points;
    }
}


class Film {
    public $film_id;
    public $tittle;
    public $description;
	public $image;
	public $actors;
	public $pay;
	public $reviews = array();
	
	private $db_connection = null;
	
	public $errors = array();
	
	public $messages = array();
	
	public function __construct($film_id)
    {
       $this->film_id=$film_id;
	   $this->connectdb();
	   $this->getfilmfromsql();
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
	
	private function getfilmfromsql()
	{
		$sql = "SELECT * FROM films WHERE film_id=" . $this->film_id . ";";
		$result_of_item = $this->db_connection->query($sql);
		    
		$result_row = $result_of_item->fetch_object();
		
		$this->tittle=$result_row->tittle_film;
		$this->description=$result_row->description_film;
		$this->image=$result_row->image_film;
		$this->actors=$result_row->actors_film;
		$this->pay=$result_row->pay_film;
		
	}
	
	public function getreviewsfromsql()
	{
		$sql = "SELECT * FROM reviews WHERE tittle_film ='" . $this->tittle . "';";
		$result_of_item = $this->db_connection->query($sql);
		$this->errors[] = $this->db_connection->error;
		
		while ($result_row = $result_of_item->fetch_object()) {
			$this->reviews[]= new Reviewstore($result_row->tittle_film, $result_row->user_name, $result_row->title_review, $result_row->review, $result_row->points);
		}	
	}
	
	public function printreviews(){
		foreach ($this->reviews as $review) {
		echo '<div class="row">
				<div class="col-lg-1">
					<h5>' . $review->user_name . '</h5>
					<h5>' . $review->points . '/10</h5>
				</div>
				
				<div class="col-lg-8">
					<div class="row">
						<h4>' . $review->title_review . '</h4>
					</div>
					<div class="row">
						<h5>' . $review->review . '</h5>
					</div>
				</div>
			</div>
			<br>
			<br>
			';
		}
	}

}