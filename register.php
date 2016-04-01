<?php 
	mysql_connect("127.0.0.1","mysql","mysql") or die(mysql_error()); 
	mysql_select_db('Note'); 
	if(isset($_POST['submit'])){ 
	$login=$_POST['login']; 
	$password=$_POST['password']; 
	$r_password=$_POST['r_password']; 
	if($password==$r_password){ 
	$password=md5($password); 
	$query=mysql_query("INSERT INTO users VALUES('','$login','$password')") or die(mysql_error()); 
	header("Location: index.html"); exit; 
	} 
	else die('password must be one'); 
	} 
	if(isset($_POST['enter'])){ 
	$login_enter=$_POST['login_enter']; 
	$password_enter=md5($_POST['password_enter']); 

	$query=mysql_query("SELECT * FROM users WHERE login = '$login_enter'"); 
	$user_data=mysql_fetch_array($query); 

	if($user_data['password']==$password_enter){ 
	session_start(); 
	$_SESSION['name']=$login_enter; 
	header("Location: notes1.html"); 
	} 
	else die('Wrong password or login'); 
	} 
?>