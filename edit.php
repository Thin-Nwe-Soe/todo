<?php  
require 'config.php';

if($_POST){
 $title = $_POST['title'];
 $desc = $_POST['description'];
 $id = $_POST['id'];

 $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
 $result = $pdostatement->execute();

 if($result){
		echo "<script>alert('New ToDo is updated');window.location.href='index.php';</script>";
	}
}
else{
	$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit New</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div clas="card">
	<div class="card-body">
		<h2>Edit New ToDo</h2>
		<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"><?php echo $result[0]['description'] ?></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" name="" value="UPDATE">
				<a href="index.php" type="button" class="btn btn-warning">BACK</a>
			</div>
		</form>
		
	</div>
</div>
</body>
</html>