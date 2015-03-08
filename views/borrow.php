<?php
   
?>
<div class="row">
	<div class="col-lg-8">
		<h5>You have ordered a film from the Movie Rental. You have 24h since you get this to pay. After that your film will be available to you under “watch” button in the “my borrowed films” on our website. You can pay using your credit card</h5>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
		<h5>Payment date: <?php echo date("d.m.y", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); ?></h5>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
		<?php echo '<form method="post" action="?site=borrow&id='. $Film->film_id .'" name="borrow"">'; ?>
		<div class="row">
			<input type="checkbox" id="accept" name="accept" required/><label for="add_input_tittle">I accept the terms</label>
		</div>
		
		<div class="row">
			<input type="submit"  name="send" value="send" />
		</div>
		</form>
	</div>
</div>