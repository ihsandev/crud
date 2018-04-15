<?php 
  require_once "core/init.php"; 
  require_once "view/sidebar.php";

  if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }

  $data = tampilkan_admin();

?>

<br>

<div class="container">



  <table class="table table-bordered table-responsive table-striped">
    
      <tr>
        <th>Nama</th>
        <th>Status Admin</th>
        <th>Action</th>
      </tr>
  <?php while($row = mysqli_fetch_assoc($data)) : ?>
      <tr>
        <td><?= $row['username']; ?></td>
        <td><?= $row['status']; ?></td>
        <td>
          <a href="delete_admin.php?id=<?= $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
          <a href="edit_admin.php?id=<?= $row['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
        </td>
      </tr>
  <?php endwhile;  ?>
  </table>
</div>
<?php require_once "view/footer.php"; ?>

