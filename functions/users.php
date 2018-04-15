<?php 

function tampilkan(){
	$query = "SELECT * FROM users";
	return result($query);
}

//tampilkan per id 

function tampilkan_per_id($id){
	$query = "SELECT * FROM users WHERE id='$id'";
	return result($query);
}

//hasil cari

function hasil_cari($cari){
	$query = "SELECT * FROM users WHERE nama LIKE '%$cari%' OR alamat LIKE '%$cari%' OR asal_daerah LIKE '%$cari%'";
	return result($query);
}

// register user 

function register_user($nama, $course, $alamat, $telpon, $asal){
	$query = "INSERT INTO users (nama, course, alamat, telpon, asal_daerah)
	         VALUES ('$nama', '$course', '$alamat', '$telpon', '$asal')";
	 return result($query);
}

// edit user

function edit_user($nama, $course, $alamat, $telpon, $asal, $id){
	$query = "UPDATE users SET nama='$nama', 
							   course='$course', 
							   alamat='$alamat',
							   telpon='$telpon',
							   asal_daerah='$asal' 
							   WHERE id='$id'";
	 return result($query);
}

// delete user 

function delete_user($id){
	$query = "DELETE FROM users WHERE id='$id'";
	return result($query);
}

function result($query){
	global $link;
	if($result = mysqli_query($link, $query) or die(mysqli_error())){
		return $result;
	}
}


 ?>