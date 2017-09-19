<?php 

include('includes/sqlfunctions.php');


?>

<!DOCTYPE html>
<html  lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Honey Do's</title>
 			
			<!-- bootstrap 3.3.7 cdn css -->
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<!-- stylesheet -->
			<link rel="stylesheet" type="text/css" href="css/custom.css">
		</head>

			<body>
				<!-- start modal -->												
				<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
							<h3 class="modal-title form-title" id="lineModalLabel">Add A Honey Do</h3>
						</div>
						<div class="modal-body">
							
				            <!-- content goes here -->
							<form class="form-container" action="includes/submit.php" method="POST">
								<div class="form-title">To Do</div>
									<input class="form-field" type="text" name="todotitle" /><br />
								<div class="form-title">Description</div>
									<input class="form-field" type="text" name="tododescription" /><br />
								<div class="form-title">Date Due</div>
									<input class="form-field" type="date" name="tododuedate" /><br />
								<div class="submit-container">
									<input class="submit-button" type="submit" value="Submit" />
								</div>
							</form>

						</div>
						
					</div>
				  </div>
				</div>
<!-- end modal -->
				<div class="container">
					<div class="row">
						<section class="content">
							<h1>Honey Do List</h1>
							<div class="col-md-8 col-md-offset-2">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="pull-right">
											<div class="btn-group" id="wrap">
												<!-- Button trigger modal -->
												<button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Click Me</button>

												<button type="button" class="btn btn-default btn-filter" >Oldest</button>
												<button type="button" class="btn btn-default btn-filter" data-target="newest">Newest</button>
											</div>

										</div>
										<div class="table-container">
											<table class="table table-filter" id='tbl'>
											<tbody>
											<?php 
											
												displayIT();
											?>
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</section>						
					</div><!-- end rows -->
				</div><!-- end main container -->
				
			    <!-- Jquery CDN -->
	 			<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	 			<!-- bootstrap 3.3.7 cdn js  -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				<!-- javascript custom -->
				<script src="js/js1.js" type="text/javascript"></script>
			</body>

</html>
