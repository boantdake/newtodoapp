<?php 
include('db.php');//connection file




function submitIt(){
//here we will be using PDO with prepared statements, now we are using PDO because it has has prepared statements support out of the box. Whats a Prepared statement Bo? a Prepared statement is the only proper way to run a query, if any variable is going to be used in it.  If you are new to web development and will continue learning more and more then you will undoubtedly run into a black hat method of site destruction called SQL injection which is the use of queries ran against a site that is vulnerable to SQL injection methods.  
		try{
		include('db.php');	//this is where our connection string resides we include it here.	
		
		//using unnamed placeholders for prepared statement
		$stmt = $pdo->prepare('INSERT INTO todolist (ToDoTitle,ToDoDescription,ToDueDate,EntryTS) VALUES 
			(?,?,?,?)');

		//binding the parameters in sequence if there are four placeholder then number them 1-4 easy peezy. for our reasons the bindParam function is a touch overkill just be aware that there are side effects to using this object method of PDO
		$stmt->bindParam(1,$title);
		$stmt->bindParam(2,$description);
		$stmt->bindParam(3,$duedate);
		$stmt->bindParam(4,$entryts);

		//set the variables from the post array, these are submitted and used in our query
		$title = $_POST['todotitle'];
		$description = $_POST['tododescription'];
		$duedate = $_POST['tododuedate'];
		$entryts = date("Y-m-d");
						
		$stmt->execute();//this execute funcion is necessary in order for the query to fire if it is not present then the query will not be executed.  In short 
		}
		catch(PDOException $e){
			echo "PDO Error: ". $e->getmessage();
		}
		$link = null;
		header('location:../index.php');//sends us right back to the front page of our todo application.

	}
function displayIt(){
	include('db.php');
	$stmt = $pdo->query('SELECT * FROM todolist ORDER BY ToDoID DESC LIMIT 5');
	
	foreach($stmt as $row){
				
		echo '
		<form method="POST">
				<tr>
				<td>
				<div>
					'.$row['ToDoID'].'
				</div>
				</td>
				<td>
					
				</td>
				<td>
				
				<div class="media">
					<div class="media-body">

						<span class="media-meta pull-right" >'.$row['ToDueDate'].'</span>
						
						<input type="hidden" name="todotitle" value="'.$row['ToDoTitle'].'">
						<input type="hidden" name="tododescription" value="'.$row['ToDoDescription'].'">
						<input type="hidden" name="tododuedate" value="'.$row['ToDueDate'].'">
						<input type="hidden" name="todoid" value="'.$row['ToDoID'].'">
						

						<h4 class="title">'.$row['ToDoTitle'].'
						
						<span class="pull-right" name="todostatus" id="status">'.$row['Complete'].'</span>
						<span class="pull-right true" >'.$row['CompleteTS'].'</span>
						</h4>
						<p class="summary" name="tododescription">'.$row['ToDoDescription'].'</p>
						<div class="btn-group pull-right">
							<button type="submit" class="btn btn-success" formaction="includes/update.php" formmethod="POST"><span class="glyphicon glyphicon-pencil"> Update</span></button>
							<button type="submit" class="btn btn-danger" formaction="includes/deletetodo.php" formmethod="POST"><span class="glyphicon glyphicon-trash"> Delete</span></button>
						</div>
						
					</div>
				</div>
				
				</td>
				</tr>
				</form>
			';
	}
}
function updateIT(){
	


	try{
		include('db.php');	//this is where our connection string resides we include it here.	
		
		//using unnamed placeholders for prepared statement
		$stmt = $pdo->prepare('UPDATE todolist SET ToDoTitle = ?
												,ToDoDescription = ?
												,Complete = ?
												,CompleteTS = ?
												,UpdateTS = NOW()
												 WHERE ToDoID = ?' 
								);

		//binding the parameters in sequence if there are four placeholder then number them 1-4 easy peezy. for our reasons the bindParam function is a touch overkill just be aware that there are side effects to using this object method of PDO
		$stmt->bindParam(1,$title);
		$stmt->bindParam(2,$description);
		$stmt->bindParam(3,$complete);
		$stmt->bindParam(5,$todoid);
		$stmt->bindParam(4,$completets);
		//set the variables from the post array, these are submitted and used in our query
		$title = $_POST['todotitle'];
		$description = $_POST['tododescription'];
		$todoid = $_POST['todoid'];

		if($_POST['completedselection'] == 'true'){
			$complete = $_POST['completedselection'];
			$completets = date("Y-m-d H:i:s");	
			
		}else{
			$complete = $_POST['completedselection'];
			$completets = "";	
			
		}
	 	
		
		
						
		$stmt->execute();//this execute funcion is necessary in order for the query to fire if it is not present then the query will not be executed.  In short 
		
		}
		catch(PDOException $e){
			echo "PDO Error: ". $e->getmessage();
		}
		$link = null;
		header('location:../index.php');//sends us right back to the front page of our todo application.
		
		
}
function deleteIT(){
	try{
		include('db.php');	//this is where our connection string resides we include it here.	
		
		//using unnamed placeholders for prepared statement
		$stmt = $pdo->prepare('DELETE FROM todolist WHERE ToDoID = ?');

		//binding the parameters in sequence if there are four placeholder then number them 1-4 easy peezy. for our reasons the bindParam function is a touch overkill just be aware that there are side effects to using this object method of PDO
		$stmt->bindParam(1,$todoid);

		//set the variables from the post array, these are submitted and used in our query
		$todoid = $_POST['todoid'];

		$stmt->execute();//this execute funcion is necessary in order for the query to fire if it is not present then the query will not be executed.  In short 
		
		}
		catch(PDOException $e){
			echo "PDO Error: ". $e->getmessage();
		}
		$link = null;
		header('location:../index.php');//sends us right back to the front page of our todo application.
}
							

















 ?>