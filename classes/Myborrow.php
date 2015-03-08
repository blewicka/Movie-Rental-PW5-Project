<?php
class Filmborrow {
    public $film_id;
    public $tittle;
    public $description;
	public $image;
	public $actors;
	public $pay;
	public $borrowed;
	
	public function __construct($film_id, $tittle, $description, $image, $actors, $pay, $borrowed)
    {
        $this->film_id=$film_id;				
        $this->tittle=$tittle;
		$this->description=$description;
		$this->image=$image;
		$this->actors=$actors;
		$this->pay=$pay;
		$this->borrowed=$borrowed;
    }
	
	public function printfilm()
	{
			echo '<div class="row">
				<div class="col-lg-2">
					<a href="?site=film&id='. $this->film_id .'"><img src="images/'. $this->image . '" alt="'.$this->image .'" style="width:100%;height:100%"></a>
				</div>
				
				<div class="col-lg-3">
					
						<div class="row"><h4><a href="?site=film&id='. $this->film_id .'">' . $this->tittle . '</a></h4></div>
						<div class="row"><h4> <small>Pay: '. $this->pay .'$</small></h4></div>
					
					<div class="row">
						<h5>Description: ' . $this->description . '</h5>
					</div>
				</div>';
			
			if (isset($_SESSION['user_name']) && $_GET['status'] == 1) {
				echo '<div class="col-lg-3">
					<div class="row">
						<a class="btn btn-default" id="watch-button" onClick="alert(\'Watching now!\')">Watch</a>
					</div>
				</div>';
			}
			echo '</div>
			<br>
			<br>
			';
	}
}


class Myborrow {
	
	private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();
    public $user_borrowed = array();
    public $user = NULL;
	private $status = NULL;
    public function __construct($user, $status)
    {	
		$this->user = $user;
		$this->status=$status;
		$this->connectdb();
		$this->getborrowbyusersql();
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
	
	private function getborrowbyusersql()
	{
		$sql = "SELECT tittle_film FROM borrow WHERE user_name='" . $this->user . "' AND status=" . $this->status . ";";
		$result_of_item = $this->db_connection->query($sql);
		while ($result_row = $result_of_item->fetch_object())
		{
			$this->user_borrowed[]=$result_row->tittle_film;
		}	
		
		
		
	}
	
	public function printborrowed() 
	{		
		foreach ($this->user_borrowed as $user_borrowed) {
		$sql = "SELECT * FROM films WHERE tittle_film='" . $user_borrowed . "';";
		$result_of_item = $this->db_connection->query($sql);
		$result_row = $result_of_item->fetch_object();
		$filmtoprint = new Filmborrow($result_row->film_id, $result_row->tittle_film, $result_row->description_film, $result_row->image_film, $result_row->actors_film, $result_row->pay_film, $result_row->borowed);
		$filmtoprint->printfilm();
		}
	}
}
