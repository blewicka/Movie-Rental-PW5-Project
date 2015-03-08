<?php
// show potential errors / feedback
if (isset($allorders)) {
    if ($allorders->errors) {
        foreach ($allfilms->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($allorders->messages) {
        foreach ($allorders->messages as $message) {
            echo $message . "\n";
        }
    }
}
?>

<div class="row">
		<div class="col-lg-6">
			<?php
			foreach ($allorders->orderpart1 as $orderpart1) {
	            $orderpart1->printfilm();
	        }
			?>		
		</div>

		<div class="col-lg-6">
			<?php
			foreach ($allorders->orderpart2 as $orderpart2) {
	            $orderpart2->printfilm();
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
		
