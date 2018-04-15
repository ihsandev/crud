<?php 
  require_once "core/init.php"; 
  require_once "view/sidebar.php";

  if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }

  $error = '';
  $id = $_GET['id'];
  if(isset($_GET['id'])){
  	$data = tampilkan_id_admin($id);
  	while ($row = mysqli_fetch_assoc($data)) :
  		$username   = $row['username'];
  		$password 	= $row['password'];
  		$status 	= $row['status'];
  	endwhile;
  }

  if (isset($_POST['submit'])){
  	$username   = $_POST['username'];
  	$password 	= $_POST['password'];
  	$status 	= $_POST['status'];

  	if(strtolower($status) == 'super admin'){
      $status = 1;
    } else {
      $status = 0;
    }

  	if(!empty(trim($username)) && !empty(trim($password))){
  		if(edit_admin($username, $password, $status, $id)){
  			header('Location: data_admin.php');
  		} else {
  			$error = "Ada Masalah saat mengedit";
  		}
  	} else {
  		$error = "Nama dan Course tidak Boleh kosong";
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
		    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $username; ?>">
		  </div>
		   <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= $password; ?>">
		  </div>
      <div class="form-group">
        <label for="status">Status User</label>
        <select class="form-control" name="status">
        	<option selected>
        		<?php
        			if($status == 1){
        				$status = 'Super Admin';
        				echo $status;
        			} else {
        				$status = 'Admin Biasa';
        				echo $status;
        			}
        		?>
        	</option>
          <option>Super Admin</option>
          <option>Admin Biasa</option>
        </select>
      </div>

		  <br>
		  <?php if ($error){ ?>
		  	<div id="error"><?php echo $error; ?></div>
		  <?php } ?>
		  <br>

		  <button type="submit" class="btn btn-success" name="submit">Edit</button>
		</form>
		</div>
	</div>
</div>
<?php require_once "view/footer.php"; ?>
