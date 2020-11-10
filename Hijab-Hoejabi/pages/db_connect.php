<?php 
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "hoejabi";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
 
	function register($username,$password,$nama)
	{	
		$insert = mysqli_query($this->koneksi,"insert into admin values ('','$username','$password','$nama')");
		return $insert;
	}
 
	function login($username,$password,$remember)
	{
		$query = mysqli_query($this->koneksi,"select * from admin where username='$username'");
		$data_admin = $query->fetch_array();
		if(password_verify($password,$data_admin['password']))
		{
			
			if($remember)
			{
				setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_admin['nama'], time() + (60 * 60 * 24 * 5), '/');
			}
			$_SESSION['username'] = $username;
			$_SESSION['nama'] = $data_admin['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from admin where username='$username'");
		$data_admin = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_admin['nama'];
		$_SESSION['is_login'] = TRUE;
	}
	
}
