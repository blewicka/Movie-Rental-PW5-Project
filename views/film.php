<?php
if (isset($Film)) {
    if ($Film->errors) {
        foreach ($Film->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($Film->messages) {
        foreach ($Film->messages as $message) {
            echo $message . "\n";
        }
    }
if (isset($_GET['message'])) {
	echo $_GET['message'];
}
}

echo '<br>
<div class="row">
	<div class="col-lg-4">
		<a href="?site=film&id='. $Film->film_id .'"><img src="images/'. $Film->image . '" alt="'.$Film->image .'" style="width:100%;height:100%"></a>
	</div>
	
	<div class="col-lg-6">
		<div class="row">
			<h4><a href="?site=film&id='. $Film->film_id .'">' . $Film->tittle . '</a> <small>Pay: '. $Film->pay .'$</small></h4>
		</div>
		<div class="row">
			<h5>Description: ' . nl2br($Film->description) . '</h5>
			<h5>Actors: ' . nl2br($Film->actors) . '</h5>
		</div>
	</div>';



	echo '<div class="col-lg-2">
		<a href="?site=borrow&id='. $Film->film_id .'" class="btn btn-default" id="borrow-button">Borrow</a>';
		if (isset($_SESSION['user_name'])) {echo '<a href="?site=addreview&id='. $Film->film_id .'" class="btn btn-default" id="review-button">Add review</a>';}
	echo '</div>';
	
echo '</div>';
?>

<div class="row">
	<div class="col-lg-4">
		<h3>Reviews!</h3>
	</div>
</div>

<?php
$Film->printreviews();
?>