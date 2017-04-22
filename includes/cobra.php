<?php
include_once 'cobra-config.php';

function sec_session_start() 
{
    $session_name = 'sec_session_id'; 
    $secure = SECURE;

    $httponly = true;

    if (ini_set('session.use_only_cookies', 1) === FALSE) 
	{
        header("Location: ../error.php?message=I_dont_know_how_to_make_a_session.lol");
        exit();
    }

    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

    session_name($session_name);

    session_start();
    session_regenerate_id();
}

function login($email, $password, $mysqli) 
{
    if ($stmt = $mysqli->prepare("SELECT player_id, gamer_tag, email, password FROM game WHERE email = ? LIMIT 1")) 
	{
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($player_id, $gamer_tag, $email1, $db_password);
        $stmt->fetch();

        if ($stmt->num_rows == 1) 
		{
            if ($db_password == $password) 
			{
				$user_browser = $_SERVER['HTTP_USER_AGENT'];

				$player_id = preg_replace("/[^0-9]+/", "", $player_id);
				$_SESSION['player_id'] = $player_id;

				$gamer_tag = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $gamer_tag);

				$_SESSION['player_id'] = $player_id;
				$_SESSION['gamer_tag'] = $gamer_tag;
				$_SESSION['login_string'] = hash('sha512', $password . $user_browser);
				$_SESSION['email'] = $email1;
 
				return true;
			}
				header("Location: ../cobra_error.php?message=great_you_broke_everything.lol");
				return false;
		}

    } 
	else 
	{
		header("Location: ../cobra_error.php?message=you_and_the_database_arent_friends_right_now.lol");
		return false;
    }
} 
/*else 
{
        header("Location: ../error.php?message=great_you_broke_everything.lol");
        exit();
}*/


function login_check($mysqli) 
{
    if (isset($_SESSION['player_id'], $_SESSION['gamer_tag'], $_SESSION['login_string'])) 
	{
        $player_id = $_SESSION['player_id'];
        $login_string = $_SESSION['login_string'];
        $gamer_tag = $_SESSION['gamer_tag'];

        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password FROM game WHERE player_id = ? LIMIT 1")) 
		{
			
            $stmt->bind_param('i', $player_id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) 
			{
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);

                if ($login_check == $login_string) 
				{ 
                    return true;
                } 
				else 
				{
                    header("Location: ../cobra_error.php?message=they_dont_match_bro.lol");
            		exit();
					return false;
                }
            } 
			else 
			{
                header("Location: ../cobra_error.php?message=more_than_one_on_log_on_check_yo.lol");
            	exit();
				return false;
            }
        } 
		else 
		{
            header("Location: ../cobra_error.php?message=you_and_the_login_check_arent_friends_right_now.lol");
            exit();
        }
    } 
	else 
	{
        return false;
    }
}

function esc_url($url) 
{

    if ('' == $url) 
	{
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
    
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
    
    $count = 1;
    while ($count) 
	{
        $url = str_replace($strip, '', $url, $count);
    }
    
    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);
    
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') 
	{
        return '';
    } 
	else 
	{
        return $url;
    }
}
