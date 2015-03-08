<?php
class Orderstore {
    public $borrow_id;
    public $film_id;
	public $tittle_film;
    public $user_name;
	public $status;
	
	public function __construct($borrow_id, $film_id, $tittle_film, $user_name, $status)
    {
        $this->borrow_id=$borrow_id;				
        $this->film_id=$film_id;
		$this->tittle_film=$tittle_film;
		$this->user_name=$user_name;
		$this->status=$status;
    }
	
	public function printfilm()
	{
			echo '<div class="row">
				     <a href="?site=allorders&nrsite=' . $_GET['nrsite'] . '&borrow_id='. $this->borrow_id .'&status=1" class="btn btn-default" id="paid-button">Paid</a>
				     <a href="?site=allorders&nrsite=' . $_GET['nrsite'] . '&borrow_id='. $this->borrow_id .'&status=0" class="btn btn-default" id="unpaid-button">Unpaid</a>
				     '. $this->user_name .' Status ' . $this->status . '
				     <a href="?site=film&id='. $this->film_id .'"> ' . $this->tittle_film . ' </a>	
				  </div>';			
	}
}


class Allorders
{
	
    private $db_connection = null;
	public $orderpart1 = array();
	public $orderpart2 = array();
	public $nr_pages = null;
    /* @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();
    
    public function __construct($site)
    {		
        $this->connectdb();
		$this->get10orders($site);
		
		if (isset($_GET['borrow_id'])){
			$this->setstatus($_GET['borrow_id'], $_GET['status']);
			header("Location: http://v-ie.uek.krakow.pl/~s174126/index.php?site=allorders&nrsite=" . $_GET['nrsite']);
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
	
	private function setstatus($borrow_id, $status)
	{
		$sql = "UPDATE borrow SET status=" . $status . " WHERE borrow_id=" . $borrow_id . ";";
		$query_update_reviews = $this->db_connection->query($sql);
	}
	
    private function get10orders($site){
    	$startcount=$site*10;
	   	$sql = "SELECT * FROM borrow ORDER BY user_name ASC LIMIT ". $startcount .",40;";
		$result_of_item = $this->db_connection->query($sql);	
		for ($i=0; $result_row=$result_of_item->fetch_object(); $i++)
		{
			if ($i<20) {
				$this->orderpart1[]= new Orderstore($result_row->borrow_id,  $result_row->film_id, $result_row->tittle_film, $result_row->user_name, $result_row->status);
			} else {
				$this->orderpart2[]= new Orderstore($result_row->borrow_id,  $result_row->film_id, $result_row->tittle_film, $result_row->user_name, $result_row->status);
			}
			
		}	
	}

}
