<?php
include_once 'cobra.dbcon.php';
include_once 'cobra.php';

sec_session_start(); 

if (isset($_POST['email']) && isset($_POST['password'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (login($email, $password, $mysqli) == true) 
	{
        header("Location: ../cobra_game.php");
        exit();	
		
    } 
	else 
	{
        header('Location: ../cobra_login.php?message=dange_dude_you_didnt_give_the_right_info.lol');
        exit();
    }
}
 else {
	
    header('Location: ../cobra_error.php?message=i_is_broken.lol');
    exit();
}