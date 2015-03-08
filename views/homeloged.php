<?php
// show potential errors / feedback
if (isset($home)) {
    if ($home->errors) {
        foreach ($home->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($home->messages) {
        foreach ($home->messages as $message) {
            echo $message . "\n";
        }
    }
}
?>

<div class="row">
		<div class="col-lg-6">
		<h3>Last added films</h3>

<?php
foreach ($home->last5films as $last5films) {
            $last5films->printfilm();
        }
?>		
	</div>

		<div class="col-lg-6">
		<h3>Most borrowed films</h3>

<?php
foreach ($home->borrowed5films as $borrowed5films) {
            $borrowed5films->printfilm();
        }
?>		
</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<h3>Most reviwed films</h3>
		<?php
		foreach ($home->reviewed5films as $reviewed5films) {
            $reviewed5films->printfilm();
        }
		?>	
</div>
</div>
		
