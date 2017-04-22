<?php


include_once 'cobra.dbcon.php';
include_once 'cobra-config.php';
        

if (isset($_POST['gamer_tag'], $_POST['email'], $_POST['password'])) 
{
    // Sanitize and validate the data passed in
    $gamer_tag = filter_input(INPUT_POST, 'gamer_tag', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    
    $prep_stmt = "SELECT player_id FROM game WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
    
    if ($stmt) 
	{
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) 
		{
            $error_msg .= '<p>this email already in here fool.</p>';
        }
    } 
	else 
	{
        $error_msg .= '<p>the database is dead</p>';
    }
    
    if (empty($error_msg)) 
	{
        if ($insert_stmt = $mysqli->prepare("INSERT INTO game (gamer_tag, email, password) VALUES (?, ?, ?)")) 
		{
            $insert_stmt->bind_param('sss', $gamer_tag, $email, $password);
            if (! $insert_stmt->execute()) 
			{
                header("Location: ../error.php?message=can_you_remind_me_how_to_register_someone.lol");
        		exit();
            }
        } 
    	$to = $_POST['email'];
    	$subject2 = "Thank you " . $gamer_tag . ". Welcome to The experiance of a lifetime!";
    	
		$headers2 = "To: " . strip_tags($to) . "\r\n";
		$headers2 .= "From: theman@bigbrother.com\r\n";
		$headers2 .= "MIME-Version: 1.0\r\n";
		$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message2 = '<html><body>';
		$message2 .= '<img src="http://3.bp.blogspot.com/_7CJoipoOhz8/Ss-pGcLgWiI/AAAAAAAAAA0/UFh-iHE9BBM/S269/PRESTIGE.png" height="100" alt=";(" />';
		$message2 .= '<h1>Thank You for Registering.</h1>';
		$message2 .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message2 .= "<tr style='background: #eee;'><td><strong>Gamer_tag:</strong> </td><td>" . strip_tags($gamer_tag) . "</td></tr>";
		$message2 .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($to) . "</td></tr>";
		$message2 .= "<tr><td><strong>Password:</strong> </td><td>" . strip_tags($title) . "</td></tr>";
		$message2 .= "</table>";
		$message2 .= "</body></html>";
		
    	mail($from,$subject2,$message2,$headers2); 
        header('Location: ./cobra_login.php');
        exit();
    }
	echo('we dead');
}