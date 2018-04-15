<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Ihsan English Course</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>
<?php 
  require_once "core/init.php"; 
  // require_once "view/sidebar.php";

  if(isset($_SESSION['admin'])){
  	header('Location: index.php');
  }

  $error = '';

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty(trim($username)) && !empty(trim($password)) ){
      if(cek_data_admin($username, $password)){
        $_SESSION['admin'] = $username;
        header('Location: index.php');
      } else {
        $error = 'Ada Masalah saat Login';
      }
    } else {
      $error = 'username dan Password Wajib di Isi';
    }
  }
?>

<div class="container">
	<h1 class="text-center">FORM LOGIN ADMIN</h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">	
			<br>
		<form action="" method="post">
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
		  </div>
		   <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
		  </div>

		  <br>
		  <?php if ($error){ ?>
		  	<div id="error"><?php echo $error; ?></div>
		  <?php } ?>
		  <br>

		  <button type="submit" class="btn btn-success" name="submit">Login</button>
		</form>
		</div>
	</div>
</div>
<?php require_once "view/footer.php"; ?>
