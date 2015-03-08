<?php
class Filmstore {
    public $film_id;
    public $tittle;
    public $description;
	public $image;
	public $actors;
	public $pay;
	public $borrowed;
	
	public function __construct($film_id, $tittle, $description, $image, $actors, $pay, $borrowed, $reviews, $image_size)
    {
        $this->film_id=$film_id;				
        $this->tittle=$tittle;
		$this->description=$description;
		$this->image=$image;
		$this->actors=$actors;
		$this->pay=$pay;
		$this->borrowed=$borrowed;
		$this->reviews=$reviews;
		$this->image_size=$image_size;
    }
	
	public function printfilm()
	{
			echo '<div class="row">
				<div class="col-lg-'. $this->image_size .'">
					<a href="?site=film&id='. $this->film_id .'"><img src="images/'. $this->image . '" alt="'.$this->image .'" style="width:100%;height:100%"></a>
				</div>
				
				<div class="col-lg-8">
					
						<div class="row"><h4><a href="?site=film&id='. $this->film_id .'">' . $this->tittle . '</a></h4></div>
						<div class="row"><h4> <small>Pay: '. $this->pay .'$	Borrowed: ' . $this->borrowed . ' Reviews: ' . $this->reviews . '</small></h4></div>
					
					<div class="row">
						<h5>' . $this->description . '</h5>
					</div>
				</div>';
			
			
				echo '<div class="col-lg-8">
					<div class="row">
						<a href="?site=borrow&id='. $this->film_id .'" class="btn btn-default" id="borrow-button">Borrow</a>
					</div>
					<div class="row">
						
					</div>
				</div>';
			
			echo '</div>
			<br>
			<br>
			';
	}
}


class Home
{
	
    private $db_connection = null;

	public $last5films = array();
	public $borrowed5films = array();
    public $reviewed5films  = array();
    /* @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();
    
    public function __construct()
    {			
        $this->connectdb();
		$this->getlast5films();
		$this->getmostborrowed5films();
		$this->getmostreviewed5films();
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
	
	private function getmostborrowed5films(){
		$sql = "SELECT * FROM films ORDER BY borowed DESC LIMIT 5;";
		$result_of_item = $this->db_connection->query($sql);
		while ($result_row = $result_of_item->fetch_object())
		{
			$this->borrowed5films[]= new Filmstore($result_row->film_id, $result_row->tittle_film, $result_row->description_film, $result_row->image_film, $result_row->actors_film, $result_row->pay_film, $result_row->borowed, $result_row->reviews, 3);
		}	
	}
	
    private function getlast5films(){
	   $sql = "SELECT * FROM films ORDER BY film_id DESC LIMIT 5;";
		$result_of_item = $this->db_connection->query($sql);
		while ($result_row = $result_of_item->fetch_object())
		{
			$this->last5films[]= new Filmstore($result_row->film_id, $result_row->tittle_film, $result_row->description_film, $result_row->image_film, $result_row->actors_film, $result_row->pay_film, $result_row->borowed, $result_row->reviews, 3);
		}	
	}

	private function getmostreviewed5films(){
		$sql = "SELECT * FROM films ORDER BY reviews DESC LIMIT 5;";
		$result_of_item = $this->db_connection->query($sql);
		while ($result_row = $result_of_item->fetch_object())
		{
			$this->reviewed5films[]= new Filmstore($result_row->film_id, $result_row->tittle_film, $result_row->description_film, $result_row->image_film, $result_row->actors_film, $result_row->pay_film, $result_row->borowed, $result_row->reviews, 2);
		}	
	}
}
