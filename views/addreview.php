<?php
// show potential errors / feedback
if (isset($Review)) {
    if ($Review->errors) {
        foreach ($Review->errors as $error) {
            echo $error . "\n";
        }
    }
    if ($Review->messages) {
        foreach ($Review->messages as $message) {
            echo $message . "\n";
        }
    }
}



echo '<form method="post" action="?site=addreview&id='. $Film->film_id .'" name="addreview"">';
?>  
    <div class="row">
		<div class="col-lg-12">
			<div class="row">
				<input id="add_input_tittle" type="text"  name="tittle_review" required/>
				<label for="add_input_tittle">Tittle</label>
			</div>
			
			<div class="row">
				<textarea id="add_input_description" cols="80" rows="16" name="description_review" required></textarea>
				<label for="add_input_description">Description</label>
			</div>
			
			<div class="row">
				<input  type="number"  min="0" max="10" step="1" size="4" id="add_input_points" type="text"  name="points"  required/>
				<label for="add_input_points">Grade</label>
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

