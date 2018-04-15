<?php 

function tampilkan_admin(){
	$query = "SELECT * FROM admin";
	return result($query);
}

function tampilkan_id_admin($id){
	$query = "SELECT * FROM admin WHERE id='$id'";
	return result($query);
}


function cek_nama_admin($username){
	global $link;
	$username = escape($username);
	$query = "SELECT * FROM admin WHERE username='$username'";
	$result = mysqli_query($link, $query) or die(mysqli_error());

	if(mysqli_num_rows($result) == 0) return true;
	else return false;
}

function register_admin($username, $password, $status){
	$username = escape($username);
	$password = escape($password);

	$password = md5($password);

	$query = "INSERT INTO admin (username, password, status)
	         VALUES ('$username', '$password', $status)";
	return result($query);
}

function cek_data_admin($username, $password){
	
	$username = escape($username);
	$password = escape($password);

	$password = md5($password);

	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	global $link;
	if ($result = mysqli_query($link, $query)){
		if (mysqli_num_rows($result)) return true;
		else return false;
	}
	
}

function edit_admin($username, $password, $status, $id){
	$username = escape($username);
	$password = escape($username);

	$password = md5($password);

	$query = "UPDATE admin SET username='$username', 
							   password='$password',
							   status ='$status' WHERE id='$id'";
	 return result($query);
}

function delete_admin($id){
	$query = "DELETE FROM admin WHERE id='$id'";
	return result($query);
}

function cek_status_admin($username){
	$query = "SELECT status FROM admin WHERE username='$username'";
	$result = result($query);
	while($row = mysqli_fetch_assoc($result)){
		$status = $row['status'];
	}

	return $status;
}

function escape($data){
	global $link;
	$data = mysqli_escape_string($link, $data);
	return $data;
}

 ?>