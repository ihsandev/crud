<?php 
  require_once "core/init.php"; 
  require_once "view/sidebar.php";

  if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }

  $error = '';

  if (isset($_POST['submit'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $status     = $_POST['status']; 

    if(strtolower($status) == 'super admin'){
      $status = 1;
    } else {
      $status = 0;
    }

    if(!empty(trim($username)) && !empty(trim($password))){
      if(cek_nama_admin($username)){
        if(register_admin($username, $password, $status)){
         // $_SESSION['admin'] = $username;
          header('Location: data_admin.php');
        } 
        else {
          $error = "Ada Masalah saat Register";
        } 
      } else {
          $error = "Username Sudah ada, Pilih yang lain.";
        }
      } else {
        $error = "Username dan Password tidak Boleh kosong";
      }
    } 

?>

<div class="container">
	<h1 class="text-center">FORM REGISTER ADMIN</h1>
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
      <div class="form-group">
        <label for="status">Status User</label>
        <select class="form-control" name="status">
          <option>Super Admin</option>
          <option selected>Admin Biasa</option>
        </select>
      </div>

		  <br>
		  <?php if ($error){ ?>
		  	<div id="error"><?php echo $error; ?></div>
		  <?php } ?>
		  <br>

		  <button type="submit" class="btn btn-success" name="submit">Register</button>
		</form>
		</div>
	</div>
</div>
<?php require_once "view/footer.php"; ?>
