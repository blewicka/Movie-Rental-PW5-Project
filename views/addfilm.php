<?php
// show potential errors / feedback
if (isset($addfilm)) {
    if ($addfilm->errors) {
        foreach ($addfilm->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($addfilm->messages) {
        foreach ($addfilm->messages as $message) {
            echo $message . "\n";
        }
    }
}
?>

<div class="row">
		<div class="col-lg-8">
		You can add films now!
		</div>
</div>


<form method="post" action="?site=addfilm" name="addform" enctype="multipart/form-data">
   
    <div class="row">
		<div class="col-lg-6">
			<div class="row">
				<input id="add_input_tittle" type="text"  name="tittle_film" required/>
				<label for="add_input_tittle">Tittle</label>
			</div>
			
			<div class="row">
				<textarea id="add_input_description" cols="40" rows="8" name="description_film" required></textarea>
				<label for="add_input_description">Description</label>
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="row">
				<input type="file" name="image_film" id="add_input_image" required>
				<label for="add_input_image">Image</label>
			</div>
			
			<div class="row">
				<textarea if="add_actors_description" cols="25" rows="4" name="actors_film" required></textarea>
				<label for="add_actors_description">Actors</label>
			</div>
			
			<div class="row">
				<input  type="number"  min="0" max="9999" step="0.01" size="4" id="add_input_pay" type="text"  name="pay_film"  required/>
				<label for="add_input_pay">Pay</label>
			</div>
		</div>

	</div> 
    
	
	
	<div class="row">
		<div class="col-lg-8">
			<input type="submit"  name="add" value="Add" />
		</div>
	</div>
</form>
</div>

