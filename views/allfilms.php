<?php
// show potential errors / feedback
if (isset($allfilms)) {
    if ($allfilms->errors) {
        foreach ($allfilms->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($allfilms->messages) {
        foreach ($allfilms->messages as $message) {
            echo $message . "\n";
        }
    }
}
?>

<div class="row">
		<div class="col-lg-6">
			<?php
			foreach ($allfilms->filmspart1 as $filmspart1) {
	            $filmspart1->printfilm();
	        }
			?>		
		</div>

		<div class="col-lg-6">
			<?php
			foreach ($allfilms->filmspart2 as $filmspart2) {
	            $filmspart2->printfilm();
	        }
			?>		
		</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<?php
			$oldsite=$_GET['nrsite']-1;
			$newsite=$_GET['nrsite']+1;
			if ($_GET['nrsite']!=0) {
				echo '<a href="?site=allfilms&nrsite='. $oldsite .'" class="btn btn-default" id="nextpage">Back page</a>';
			}
			echo '<a href="?site=allfilms&nrsite='. $newsite .'" class="btn btn-default" id="nextpage">Next page</a>';
			
		?>	
</div>
</div>
		
