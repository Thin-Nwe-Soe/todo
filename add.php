<?php  
require 'config.php';

if($_POST){
	$title = $_POST['title'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO todo(title,description) VALUES(:title,:description)";
	$pdostatement = $pdo->prepare($sql);
	$result = $pdostatement->execute(
		array(
			':title'=>$title,
			':description'=>$desc
		)
	);
	if($result){
		echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div clas="card">
	<div class="card-body">
		<h2>Create New ToDo</h2>
		<form action="add.php" method="post">
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" value="" required>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="" value="SUBMIT">
				<a href="index.php" type="button" class="btn btn-warning">BACK</a>
			</div>
		</form>
		
	</div>
</div>
</body>
</html>