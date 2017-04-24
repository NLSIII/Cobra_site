<?php


include_once 'cobra.dbcon.php';
include_once 'cobra-config.php';

$stmt = $mysqli->query("UPDATE game SET current_room = '".$_POST['current_room']."', hp = '".$_POST['hp']."', money = '".$_POST['money']."', weapon = '".$_POST['weapon']."', head = '".$_POST['head']."', chest = '".$_POST['chest']."', hands = '".$_POST['hands']."', legs = '".$_POST['legs']."', ci_array = '".$_POST['ci_array']."', pi_array = '".$_POST['pi_array']."', hi_array = '".$_POST['hi_array']."', rm_array = '".$_POST['rm_array']."', dracula = '".$_POST['dracula']."', moves = '".$_POST['moves']."' WHERE email = '".$_POST['email']."' ");
	header('Location: ../cobra_game.php');
        exit();