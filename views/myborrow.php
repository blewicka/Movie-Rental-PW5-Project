<?php
// show potential errors / feedback
if (isset($myborrow)) {
    if ($myborrow->errors) {
        foreach ($myborrow->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($myborrow->messages) {
        foreach ($myborrow->messages as $message) {
            echo $message . "\n";
        }
    }
}
?>

<div class="row">
		<div class="col-lg-8">
		<h2>My films:</h2>
		</div>
</div>
<?php
	$myborrow->printborrowed();
?>