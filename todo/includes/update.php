<?php 
include('header.php');
include('sqlfunctions.php');



$date = $_POST['tododuedate'];
$newdatetime = DateTime::createFromFormat('Y-m-d h:i:s',$date);
$formatedDate = $newdatetime->format('m/d/Y');

echo '
<div class="container updater">
<div class="row">
		<section class="content">
			<div class="col-md-4 col-md-offset-4">
			<form class="form-container" action="processupdate.php" method="POST">
				<input class="form-field" type="hidden" name="updatets"/>
				<input class="form-field" type="hidden" name="todoid" value="'.$_POST['todoid'].'"/>

				<div class="form-title"><h2>Make a Change?<br>Finished?</h2></div>
				<div class="form-title">To Do</div>
					<input class="form-field" type="text" name="todotitle" value="'.$_POST['todotitle'].'"/><br />
				<div class="form-title">Description</div>
					<input class="form-field" type="text" name="tododescription" value="'.$_POST['tododescription'].'"/><br />
				<div class="form-title">Date Due</div>
					<input class="form-field" type="text" name="newdate"  id="current" value="'.$formatedDate.'"/><br />
				<div class="submit-container">
				<div class="form-title">Completed?</div>
					<select name="completedselection">
						<option value="true">Yes</option>
						<option value="false">No</option>
					</select>
				<div class="submit-container">
					<input class="submit-button" type="submit" value="Submit" />
				</div>
			</form>
		</section>
</div>
</div>
';

include('footer.php');





 ?>