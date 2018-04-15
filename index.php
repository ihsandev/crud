<?php 
  require_once "core/init.php"; 
  require_once "view/sidebar.php";

  if(!isset($_SESSION['admin'])){
    header('Location: login.php');
  }

//  $data = tampilkan();


  $perPage = 5;
  $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
  $start = ($page > 1) ? ($page*$perPage)-$perPage : 0;
  global $link;
  $tabeldata = "SELECT * FROM users LIMIT $start, $perPage";
  $resultdata = mysqli_query($link, $tabeldata); 

  $all = "SELECT * FROM users";
  $resultall = mysqli_query($link, $all);

  $total = mysqli_num_rows($resultall);

  $pages = ceil($total/$perPage);

  if(isset($_POST['cari'])){
    $cari = $_POST['cari'];
    $resultdata = hasil_cari($cari);
  }

?>

<h2>Selamat Datang di Sistem Informasi Kami</h2>

<br>

<div class="container">

<div class="row">
    <div class="col-md-4 col-md-offset-0 col-md-offset-8">
    <form method="post">
      <div class="form-group">
        <label for="nama">Pencarian</label>
        <input type="search" class="form-control" id="nama" placeholder="Masukkan Keyword.." name="cari">
      </div>
    </form>
  </div>
</div>

<br>

  <table id="tabel" class="table table-bordered table-responsive table-striped">
    
      <tr>
        <th>Nama</th>
        <th>Course</th>
        <th>Alamat</th>
        <th>No. Telpon</th>
        <th>Asal Daerah</th>
        <th>Action</th>
      </tr>
  <?php while($row = mysqli_fetch_assoc($resultdata)) : ?>
      <tr>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['course']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['telpon']; ?></td>
        <td><?= $row['asal_daerah']; ?></td>
        <td>
          <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
          <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
        </td>
      </tr>
  <?php endwhile;  ?>
  </table>
  <br>
  <div id="page">
    Halaman :
    <?php for($i = 1; $i<=$pages; $i++) : ?>
    <a href="?halaman=<?= $i; ?>" class="btn btn-default"><?= $i; ?></a>
  <?php endfor; ?>
  </div>

</div>
<?php require_once "view/footer.php"; ?>

