<?php

	session_save_path("/var/www/html/group34/pa2_gtt54n53ik9/admin/pa2/php/html/session_info");
	session_start();
	//RETURNS TRUE IF SESSION TIMED OUT(5 minutes)
	function checkTimeout(){
		if ($_SESSION['lastactivity'] + 5*60 < time()) {
                	return TRUE;			
        	} else {
	                $_SESSION['lastactivity'] = time();
			return FALSE;
	        }
	}
	function logoutUser() {
		session_destroy();
		$_SESSION = array();
	}
	include
   // Include the Smarty Templating Engine
   define('SMARTY_DIR', __DIR__ . '/Smarty-3.1.14/libs/');
   require_once(SMARTY_DIR . 'Smarty.class.php');
   $smarty = new Smarty();

   $smarty->setTemplateDir(__DIR__ . '/templates/templates/');
   $smarty->setCompileDir(__DIR__ . '/templates/templates_c/');
   $smarty->setConfigDir(__DIR__ . '/templates/configs/');
   $smarty->setCacheDir(__DIR__ . '/templates/cache/');

   // Notice how you can set variables here in the PHP that will get carried into the template files
   $smarty->assign('title', "EECS485");


   // Setup the Routing Framework
   require_once __DIR__ . '/vendor/autoload.php';
   $klein = new \Klein\Klein();


   /* Define routes here */



   

   $klein->respond('GET', '/aqsiby/pa2', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	if(isset($_SESSION['username'])) {
		//GET ALBUMS USER OWNS
                $query = "SELECT title, albumid FROM Album WHERE username= '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $album_titles[] = $row['title'];
                        $usernames[] = $_SESSION['username'];
                }
                
                //GET PUBLIC ALBUMS THAT THE USER DOESN'T OWN
                $query = "SELECT title, albumid, username FROM Album WHERE access= 'Public' AND username != '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $album_titles[] = $row['title'];
                        $usernames[] = $row['username'];
                }

                //GET ACCESSABLE ALBUMS
                $query = "SELECT albumid FROM AlbumAccess WHERE username= '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $query2 = "SELECT title, username FROM Album WHERE albumid= ".$row['albumid'];
                        $result2 = mysql_query($query2, $con) or die(mysql_error());
                        $row2 = mysql_fetch_array($result2);
                        $album_titles[] = $row2['title'];
                        $usernames[] = $row2['username'];
                }

                $smarty->assign('usernames', $usernames);
                $smarty->assign('albumids', $albumids);
                $smarty->assign('album_titles', $album_titles);
                $smarty->assign('username', $_SESSION['username']);
		$smarty->display('loggedin.tpl');
	}
	$smarty->display('index.tpl');
   });

  $klein->respond('POST', '/aqsiby/pa2', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
        $error_message = "";
	if($_POST['source'] == "login") {
                //CHECK IF USERNAME IS IN DATABASE
                $query = "SELECT username FROM User WHERE username= '".$_POST['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                $row = mysql_fetch_array($result);
                if($row) {
                        $query = "SELECT password FROM User WHERE username= '".$_POST['username']."'";
                	$result = mysql_query($query, $con) or die(mysql_error());
                	$row = mysql_fetch_array($result);
			if($row['password'] == md5($_POST['password'])){
				$_SESSION['username'] = $_POST['username'];
				//DO WE NEED TO STORE PASSWORD IN SESSION?
			}else {
				$error_message = "Wrong Password for ".$_POST['username'];
			}
                }else {
			$error_message = "Invalid Username";
		}
        }
        if(isset($_SESSION['username'])) {
                $loggedin = TRUE;
        }else {
                $loggedin = FALSE;
        }
        if($loggedin) {
		$_SESSION['lastactivity'] = time();
		//GET ALBUMS USER OWNS
                $query = "SELECT title, albumid FROM Album WHERE username= '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $album_titles[] = $row['title'];
                        $usernames[] = $_SESSION['username'];
                }
                
                //GET PUBLIC ALBUMS THAT THE USER DOESN'T OWN
                $query = "SELECT title, albumid, username FROM Album WHERE access= 'Public' AND username != '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $album_titles[] = $row['title'];
                        $usernames[] = $row['username'];
                }

                //GET ACCESSABLE ALBUMS
                $query = "SELECT albumid FROM AlbumAccess WHERE username= '".$_SESSION['username']."'";
                $result = mysql_query($query, $con) or die(mysql_error());
                while($row = mysql_fetch_array($result)){
                        $albumids[] = $row['albumid'];
                        $query2 = "SELECT title, username FROM Album WHERE albumid= ".$row['albumid'];
                        $result2 = mysql_query($query2, $con) or die(mysql_error());
                        $row2 = mysql_fetch_array($result2);
                        $album_titles[] = $row2['title'];
                        $usernames[] = $row2['username'];
                }

                $smarty->assign('usernames', $usernames);
                $smarty->assign('albumids', $albumids);
                $smarty->assign('album_titles', $album_titles);
                $smarty->assign('username', $_SESSION['username']);
		$smarty->display('loggedin.tpl');
	}else {
		$smarty->assign('error_message', $error_message);
                $smarty->display('index.tpl');
        }

   });


   $klein->respond('POST', '/aqsiby/pa2/pic', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
     	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
     	$query = "SELECT albumid FROM Contain WHERE picid = '".$_POST["picid"]."'";
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$albumid = $row['albumid'];
     	$pid = $_POST["picid"];

     	$query = "SELECT sequencenum FROM Contain WHERE albumid = ".$albumid." ORDER BY sequencenum ASC";
     	$result = mysql_query($query, $con) or die(mysql_error());
     	while($row = mysql_fetch_array($result)){
        	$sequence_nums[] = $row['sequencenum'];
     	}

     	//FIND MIN SEQUENCE NUMBER
     	$query = "SELECT MIN(sequencenum) FROM Contain WHERE albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	if($row = mysql_fetch_array($result)) {
       		$min_seq = $row['MIN(sequencenum)'];
     	}
     	$query = "SELECT picid FROM Contain WHERE sequencenum = ".$min_seq." AND albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$first_pic = $row['picid'];


     	//FIND MAX SEQUENCE NUMBER
     	$query = "SELECT MAX(sequencenum) FROM Contain WHERE albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	if($row = mysql_fetch_array($result)) {
       		$max_seq = $row['MAX(sequencenum)'];
     	}
     	$query = "SELECT picid FROM Contain WHERE sequencenum = ".$max_seq." AND albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$last_pic = $row['picid'];


     	if($_POST["button"]) {
        	$query2 = "SELECT sequencenum FROM Contain WHERE picid = '".$pid."'";
        	$result = mysql_query($query2, $con) or die(mysql_error());
        	$row = mysql_fetch_array($result);
        	$seqn = $row['sequencenum'];
        	$count = 0;

        	//IF NEXT OR PREV BUTTON WAS CLICKED vvv
        	if($_POST["button"] == "PREV") {
          		if($pid == $first_pic) {

            			//Do Nothing

          		}else {
            			while($sequence_nums[$count] != $seqn) {
              				$prev_seq_num = $sequence_nums[$count];
              				$count++;
            			}
            			$query = "SELECT picid FROM Contain WHERE sequencenum = ".$prev_seq_num." AND albumid = ".$albumid;
            			$result = mysql_query($query, $con) or die(mysql_error());
            			$row = mysql_fetch_array($result);
            			$pid = $row['picid'];         
          		}  
        	}
        	if($_POST["button"] == "NEXT") {
          		if($pid == $last_pic) {

            			//Do Nothing

          		}else {
            
            			while($sequence_nums[$count] != $seqn) {
              				$count++;
            			}
            			$query = "SELECT picid FROM Contain WHERE sequencenum = ".$sequence_nums[$count + 1]." AND albumid = ".$albumid;
            			$result = mysql_query($query, $con) or die(mysql_error());
            			$row = mysql_fetch_array($result);
            			$pid = $row['picid'];
         		}
      		}
       
     	}

     	$query = "SELECT url FROM Photo WHERE picid = '".$pid."'";
     	$query3 = "SELECT caption FROM Contain WHERE picid = '".$pid."'";
      
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$url = $row['url'];

     	$result = mysql_query($query3, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$caption = $row['caption'];
     
     	mysql_close($con); 
	$smarty->assign('username', $_SESSION['username']);
     	$smarty->assign('picid', $pid);
     	$smarty->assign('caption', $caption);
     	$smarty->assign('albumid', $albumid);
     	$smarty->assign('url', $url);
     	$smarty->display('pic.tpl');
   });

    $klein->respond('POST', '/aqsiby/pa2/albums/edit', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
      	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
      	 
      	if($_POST["op"] == "add") {
        	mysql_query("INSERT INTO Album (title, created, lastupdated, username, access) VALUES ('".$_POST["add"]."', CURDATE(), CURDATE(), '".$_POST['username']."', '".$_POST['access']."')", $con) or die(mysql_error());
	}
      	if($_POST["op"] == "delete") {
        	mysql_query("DELETE FROM AlbumAccess WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
		$res = mysql_query("SELECT picid FROM Contain WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
        	while($row = mysql_fetch_array($res)){
          		$picids[] = $row['picid'];
        	}
 		mysql_query("DELETE FROM Contain WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
		foreach($picids as &$id) {
            		$query2 = "SELECT url FROM Photo WHERE picid = '".$id."'";
            		$result2 = mysql_query($query2, $con) or die(mysql_error());
            		$row2 = mysql_fetch_array($result2);
            		$url = $row2['url'];
            		unlink($url);
            		mysql_query("DELETE FROM Photo WHERE picid = '".$id."'", $con) or die(mysql_error());          
        	}
        	mysql_query("DELETE FROM Album WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
      	}
     	 
      	$query = "SELECT access, title, albumid FROM Album WHERE username = '".$_SESSION['username']."'";
      	$result = mysql_query($query, $con) or die(mysql_error());
	
      	while($row = mysql_fetch_array($result)){
        	$albumids[] = $row['albumid'];
        	$title_array[] = $row['title'];
		$access_array[] = $row['access'];
      	}
      
      	mysql_close($con);
	$smarty->assign('access_array', $access_array); 
      	$smarty->assign('username', $_SESSION['username']);
      	$smarty->assign('albumids', $albumids);
      	$smarty->assign('title_array', $title_array);
      	$smarty->display('albums_edit.tpl'); 
    });


   $klein->respond('POST', '/aqsiby/pa2/album/edit', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
      	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
        $query = "SELECT access FROM Album WHERE albumid = ".$_POST["albumid"];
        $result = mysql_query($query, $con) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $current_access = $row['access'];

	if($_POST['op'] == "switch_access") {
		if($current_access == "Public") {
			mysql_query("UPDATE Album SET access = 'Private' WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
			$current_access = "Private";
		}else {
		        mysql_query("DELETE FROM AlbumAccess WHERE albumid = ".$_POST['albumid'], $con);
			mysql_query("UPDATE Album SET access = 'Public' WHERE albumid = ".$_POST['albumid'], $con) or die(mysql_error());
			$current_access = "Public";
		}
	}
	if($_POST['op'] == "add") {
		$query = "SELECT albumid FROM Album WHERE title = '".$_POST["album_title"]."'";
		$result = mysql_query($query, $con) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$albumid = $row['albumid'];

		//ASSIGN THE NEW PHOTO THE 1 MORE THAN THE HIGHEST SEQUENCE NUMBER
		$result2 = mysql_query("SELECT MAX(sequencenum) AS max_seqnum FROM Contain WHERE albumid = ".$albumid, $con) or die(mysql_error());
		$row2 = mysql_fetch_array($result2);
		$maxseq = $row2['max_seqnum'];

		//GIVE THE NEW PHOTO A UNIQUE picid
		$hashed_picid = md5(date('Y-m-d-H:i:s'));

		//FORMAT
		if($_FILES['userfile']['type'] == "image/jpeg") {
			$type = "jpg";
		}else {
			$type = substr($_FILES['userfile']['type'] ,strlen($_FILES['userfile']['type']) - 3);
		}

		mysql_query("INSERT INTO Photo (picid, url, format, date) VALUES ('".$hashed_picid."', 'static/pictures/".$hashed_picid."','".$type."', CURDATE())", $con) or die(mysql_error());
		mysql_query("INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES (".$albumid.", '".$hashed_picid."', 'NoCaption', ".($maxseq+1).")");
		move_uploaded_file($_FILES['userfile']['tmp_name'], "static/pictures/".$hashed_picid);
	}
     	if($_POST["op"] == "delete") {

        	mysql_query("DELETE FROM Contain WHERE picid = '".$_POST["picid"]."' AND albumid = ".$_POST["albumid"], $con) or die(mysql_error());
        	$result = mysql_query("SELECT * FROM Contain WHERE picid = '".$_POST["picid"]."'", $con) or die(mysql_error());
        
		//CHECK IF THE PHOTO EXISTS IN OTHER ALBUMS BEFORE DELETING IT
		if($row = mysql_fetch_array($result)) {
          
        	}else {
          		$query = "SELECT url FROM Photo WHERE picid = '".$_POST["picid"]."'";
          		$result = mysql_query($query, $con) or die(mysql_error());
          		$row = mysql_fetch_array($result);
          		$url = $row['url'];
          		unlink($url);
          		mysql_query("DELETE FROM Photo WHERE picid = '".$_POST["picid"]."'", $con) or die(mysql_error());
      	  	}
      	}
	if($_POST["op"] == "addUser") {
		$query = "SELECT username FROM User WHERE username='".$_POST["newUser"]."'";
		$result = mysql_query($query, $con) or die(mysql_error());
		if($row = mysql_fetch_array($result)) {	
			if($current_access == "Private"){
				//CHECK IF USER ALREADY HAS ACCESS TO THAT ALBUM FIRST
				if($_POST["newUser"] != $_SESSION['username']){
					mysql_query("INSERT INTO AlbumAccess (albumid, username) VALUES ('".$_POST["albumid"]."', '".$_POST["newUser"]."')", $con) or die(mysql_error());
				}
			}
		}
	}
	if($_POST["op"] == "rmUser") {
		mysql_query("DELETE FROM AlbumAccess WHERE username='".$_POST["oldUser"]."' AND albumid='".$_POST["albumid"]."'", $con) or die(mysql_error());
	}
 	//FIND WHAT USERS HAVE ACCESS TO THIS ALBUM
	$query = "SELECT username FROM AlbumAccess WHERE albumid = ".$_POST["albumid"];
        $result = mysql_query($query, $con) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
        	$accessable_users [] = $row['username'];
	}
     	$query = "SELECT * FROM Contain WHERE albumid = ".$_POST["albumid"]." ORDER BY sequencenum ASC";
     	$result = mysql_query($query, $con) or die(mysql_error());
      	while($row = mysql_fetch_array($result)){
      		$query2 = "SELECT url FROM Photo WHERE picid = '".$row['picid']."'";
		$result2 = mysql_query($query2, $con) or die(mysql_error());
		$row2 = mysql_fetch_array($result2);
		$pic_array[] = $info = array('picid' => $row['picid'], 'caption' => $row['caption'], 'url' => $row2['url']);
     	}
     	$query3 = "SELECT title FROM Album WHERE albumid = ".$_POST["albumid"];
     	$result3 = mysql_query($query3, $con) or die(mysql_error());
     	$row3 = mysql_fetch_array($result3);
     	$title = $row3['title'];
	
	//FIND ALBUMS OPPOSITE ACCESS
	if($current_access == "Public") {
		$other_access = "Private";
	}else {
		$other_access = "Public";
	}
 	
     	mysql_close($con);
	$smarty->assign('current_access', $current_access);
	$smarty->assign('other_access', $other_access);
	$smarty->assign('accessable_users', $accessable_users);    
	$smarty->assign('username', $_SESSION['username']); 
    	$smarty->assign('albumid', $_POST["albumid"]);
     	$smarty->assign('album_title', $title);
     	$smarty->assign('pic_array', $pic_array);
     	$smarty->display('album_edit.tpl');
   });

   $klein->respond('POST', '/aqsiby/pa2/album', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
     	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
     
     	//FIND EACH PICTURE'S INFORMATION IN ALBUM
     	$query = "SELECT * FROM Contain WHERE albumid = ".$_POST['albumid']." ORDER BY sequencenum ASC";
     	$result = mysql_query($query, $con) or die(mysql_error()); 

      	while($row = mysql_fetch_array($result)){
       		$query2 = "SELECT url FROM Photo WHERE picid = '".$row['picid']."'";
       		$result2 = mysql_query($query2, $con) or die(mysql_error());
       		$row2 = mysql_fetch_array($result2);
       		$pic_array[] = $info = array('picid' => $row['picid'], 'caption' => $row['caption'], 'url' => $row2['url']);
     	}
    
     	$query = "SELECT title FROM Album WHERE albumid = ".$_POST['albumid'];
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$title = $row['title'];

     	//GET ARRAY OF SEQUENCE NUMBERS
     	$sequence_nums = array ();
     	$query = "SELECT sequencenum FROM Contain WHERE albumid = ".$_POST['albumid']." ORDER BY sequencenum ASC";
     	$result = mysql_query($query, $con) or die(mysql_error());

      	while($row = mysql_fetch_array($result)){
       		$sequence_nums[] = $row['sequencenum'];
     	}

     	mysql_close($con);     
     	$smarty->assign('username', $_SESSION['username']);
     	$smarty->assign('album_title', $title);
     	$smarty->assign('pic_array', $pic_array);
     	$smarty->display('album.tpl');
   });

   $klein->respond('POST', '/aqsiby/pa2/albums', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
		echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }

	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
        
        $query = "SELECT albumid, access, title FROM Album WHERE username = '".$_SESSION['username']."'";
        $result = mysql_query($query, $con) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
                $albumids[] = $row['albumid'];
		$access_array[] = $row['access'];
		$title_array[] = $row['title'];
        }

        mysql_close($con);
	$smarty->assign('albumids', $albumids);
	$smarty->assign('access_array', $access_array);
        $smarty->assign('username', $_SESSION['username']);
        $smarty->assign('title_array', $title_array);
        $smarty->display('albums.tpl');

   });

   $klein->respond('POST', '/aqsiby/pa2/upload', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
      	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
      	$query = "SELECT albumid FROM Album WHERE title = '".$_POST["album_title"]."'";
      	$result = mysql_query($query, $con) or die(mysql_error());
      	$row = mysql_fetch_array($result);
      	$albumid = $row['albumid'];
      
      	//ASSIGN THE NEW PHOTO THE 1 MORE THAN THE HIGHEST SEQUENCE NUMBER
      	$result2 = mysql_query("SELECT MAX(sequencenum) AS max_seqnum FROM Contain WHERE albumid = ".$albumid, $con) or die(mysql_error());
      	$row2 = mysql_fetch_array($result2);
      	$maxseq = $row2['max_seqnum'];
      
      	//GIVE THE NEW PHOTO A UNIQUE picid
      	$hashed_picid = md5(date('Y-m-d-H:i:s'));

      	//FORMAT
      	if($_FILES['userfile']['type'] == "image/jpeg") {
        	$type = "jpg";
      	}else {
        	$type = substr($_FILES['userfile']['type'] ,strlen($_FILES['userfile']['type']) - 3);
      	}
      
      	mysql_query("INSERT INTO Photo (picid, url, format, date) VALUES ('".$hashed_picid."', 'static/pictures/".$hashed_picid."','".$type."', CURDATE())", $con) or die(mysql_error());
      	mysql_query("INSERT INTO Contain (albumid, picid, caption, sequencenum) VALUES (".$albumid.", '".$hashed_picid."', 'NoCaption', ".($maxseq+1).")");
      	move_uploaded_file($_FILES['userfile']['tmp_name'], "static/pictures/".$hashed_picid);

	$pic_array = array ();
	$query = "SELECT * FROM Contain WHERE albumid = ".$albumid." ORDER BY sequencenum ASC";
      	$result = mysql_query($query, $con) or die(mysql_error()); 
      	while($row = mysql_fetch_array($result)){
         	$query2 = "SELECT url FROM Photo WHERE picid = '".$row['picid']."'";
         	$result2 = mysql_query($query2, $con) or die(mysql_error());
         	$row2 = mysql_fetch_array($result2);
         	$pic_array[] = $info = array('picid' => $row['picid'], 'caption' => $row['caption'], 'url' => $row2['url']);
      	}
      	$query3 = "SELECT title FROM Album WHERE albumid = ".$albumid;
      	$result3 = mysql_query($query3, $con) or die(mysql_error());
      	$row3 = mysql_fetch_array($result3);
      	$title = $row3['title'];
 
      	mysql_close($con); 
	$smarty->assign('username', $_SESSION['username']);
      	$smarty->assign('albumid', $albumid);
      	$smarty->assign('album_title', $title);
      	$smarty->assign('pic_array', $pic_array);
      	$smarty->display('album_edit.tpl');
   });

   $klein->respond('POST', '/aqsiby/pa2/user/edit', function($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
        
	if(isset($_POST['attribute'])){
		$smarty->assign('username', $_SESSION['username']);
		$smarty->assign('attribute', $_POST['attribute']);
		$smarty->display('edit_attribute.tpl');
	}else {
		if(isset($_POST['changed_attribute'])){
			if($_POST['changed_attribute'] == "First Name") {
				$attribute = "firstname";
				$value = $_POST['new_value'];
			} elseif($_POST['changed_attribute'] == "Last Name") {
				$attribute = "lastname";
				$value = $_POST['new_value'];
			} elseif($_POST['changed_attribute'] == "E-mail") {
				$attribute = "email";
				$value = $_POST['new_value'];
			} elseif($_POST['changed_attribute'] == "Password") {
				$attribute = "password";
				$value = md5($_POST['new_value']);		
			}			
			mysql_query("UPDATE User SET ".$attribute." = '".$value."' WHERE username = '".$_SESSION['username']."'", $con);			
		}
		$query = "SELECT firstname, lastname, email FROM User WHERE username= '".$_SESSION['username']."'";
		$result = mysql_query($query, $con) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
		
		mysql_close($con); 
		$smarty->assign('username', $_SESSION['username']);
		$smarty->assign('firstname', $firstname);
		$smarty->assign('lastname', $lastname);
		$smarty->assign('email', $email);
		$smarty->display('user_edit.tpl');
	}
   });

   $klein->respond('GET', '/aqsiby/pa2/user', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	mysql_close($con); 
      	$smarty->display('user.tpl');

   });

   $klein->respond('POST', '/aqsiby/pa2/user', function ($request, $response, $service) use ($smarty) {
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());

	mysql_query("INSERT INTO User(username, firstname, lastname, password, email) 
		     VALUES ('".$_POST['username']."', '".$_POST['first_name']."', '".$_POST['last_name']."', 
		     '".md5($_POST['password'])."', '".$_POST['email']."')", $con);
        $_SESSION['username'] = $_POST['username'];
	mysql_close($con);
	$smarty->assign('username', $_SESSION['username']);
	$to = $_POST['email'];
	$subject = "Your account";
	$message = "Welcome! to your new account. To begin using your acount visit: http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2";
	$headers = "Confirming your new user account at for Group 34's online photo album.";
	mail($to, $subject, $message, $headers);
        $smarty->display('loggedin.tpl');

   });


   $klein->respond('GET', '/aqsiby/pa2/public_albums', function ($request, $response, $service) use ($smarty) {
	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
        $query = "SELECT title, albumid, username FROM Album WHERE access= 'Public' ORDER BY username ASC";
        $result = mysql_query($query, $con) or die(mysql_error());

        while($row = mysql_fetch_array($result)){
        	$usernames[] = $row['username'];
        	$album_titles[] = $row['title'];
        	$albumids[] = $row['albumid'];
        }

        mysql_close($con);
        $smarty->assign('usernames', $usernames);
        $smarty->assign('albumids', $albumids);
        $smarty->assign('album_titles', $album_titles);
      	$smarty->display('public_albums.tpl');

   });

 $klein->respond('POST', '/aqsiby/pa2/public_album', function ($request, $response, $service) use ($smarty) {
        $con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());

        //FIND EACH PICTURE'S INFORMATION IN ALBUM
        $query = "SELECT * FROM Contain WHERE albumid = ".$_POST['albumid']." ORDER BY sequencenum ASC";
        $result = mysql_query($query, $con) or die(mysql_error());

        while($row = mysql_fetch_array($result)){
                $query2 = "SELECT url FROM Photo WHERE picid = '".$row['picid']."'";
                $result2 = mysql_query($query2, $con) or die(mysql_error());
                $row2 = mysql_fetch_array($result2);
                $pic_array[] = $info = array('picid' => $row['picid'], 'caption' => $row['caption'], 'url' => $row2['url']);
        }

        $query = "SELECT title FROM Album WHERE albumid = ".$_POST['albumid'];
        $result = mysql_query($query, $con) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $title = $row['title'];

        //GET ARRAY OF SEQUENCE NUMBERS
        $sequence_nums = array ();
        $query = "SELECT sequencenum FROM Contain WHERE albumid = ".$_POST['albumid']." ORDER BY sequencenum ASC";
        $result = mysql_query($query, $con) or die(mysql_error());

        while($row = mysql_fetch_array($result)){
                $sequence_nums[] = $row['sequencenum'];
        }

        mysql_close($con);
        $smarty->assign('album_title', $title);
        $smarty->assign('pic_array', $pic_array);
        $smarty->display('public_album.tpl');
   });


   $klein->respond('POST', '/aqsiby/pa2/public_pic', function ($request, $response, $service) use ($smarty) {
	$con = mysql_connect('localhost:5834', 'group34', '34group');
     	@mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
     	$query = "SELECT albumid FROM Contain WHERE picid = '".$_POST["picid"]."'";
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$albumid = $row['albumid'];
     	$pid = $_POST["picid"];

     	$query = "SELECT sequencenum FROM Contain WHERE albumid = ".$albumid." ORDER BY sequencenum ASC";
     	$result = mysql_query($query, $con) or die(mysql_error());
     	while($row = mysql_fetch_array($result)){
        	$sequence_nums[] = $row['sequencenum'];
     	}

     	//FIND MIN SEQUENCE NUMBER
     	$query = "SELECT MIN(sequencenum) FROM Contain WHERE albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	if($row = mysql_fetch_array($result)) {
       		$min_seq = $row['MIN(sequencenum)'];
     	}
     	$query = "SELECT picid FROM Contain WHERE sequencenum = ".$min_seq." AND albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$first_pic = $row['picid'];


     	//FIND MAX SEQUENCE NUMBER
     	$query = "SELECT MAX(sequencenum) FROM Contain WHERE albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	if($row = mysql_fetch_array($result)) {
       		$max_seq = $row['MAX(sequencenum)'];
     	}
     	$query = "SELECT picid FROM Contain WHERE sequencenum = ".$max_seq." AND albumid = ".$albumid;
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$last_pic = $row['picid'];


     	if($_POST["button"]) {
        	$query2 = "SELECT sequencenum FROM Contain WHERE picid = '".$pid."'";
        	$result = mysql_query($query2, $con) or die(mysql_error());
        	$row = mysql_fetch_array($result);
        	$seqn = $row['sequencenum'];
        	$count = 0;

        	//IF NEXT OR PREV BUTTON WAS CLICKED vvv
        	if($_POST["button"] == "PREV") {
          		if($pid == $first_pic) {

            			//Do Nothing

          		}else {
            			while($sequence_nums[$count] != $seqn) {
              				$prev_seq_num = $sequence_nums[$count];
              				$count++;
            			}
            			$query = "SELECT picid FROM Contain WHERE sequencenum = ".$prev_seq_num." AND albumid = ".$albumid;
            			$result = mysql_query($query, $con) or die(mysql_error());
            			$row = mysql_fetch_array($result);
            			$pid = $row['picid'];         
          		}  
        	}
        	if($_POST["button"] == "NEXT") {
          		if($pid == $last_pic) {

            			//Do Nothing

          		}else {
            
            			while($sequence_nums[$count] != $seqn) {
              				$count++;
            			}
            			$query = "SELECT picid FROM Contain WHERE sequencenum = ".$sequence_nums[$count + 1]." AND albumid = ".$albumid;
            			$result = mysql_query($query, $con) or die(mysql_error());
            			$row = mysql_fetch_array($result);
            			$pid = $row['picid'];
         		}
      		}
       
     	}

     	$query = "SELECT url FROM Photo WHERE picid = '".$pid."'";
     	$query3 = "SELECT caption FROM Contain WHERE picid = '".$pid."'";
      
     	$result = mysql_query($query, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$url = $row['url'];

     	$result = mysql_query($query3, $con) or die(mysql_error());
     	$row = mysql_fetch_array($result);
     	$caption = $row['caption'];
     
     	mysql_close($con); 
     	$smarty->assign('picid', $pid);
     	$smarty->assign('caption', $caption);
     	$smarty->assign('albumid', $albumid);
     	$smarty->assign('url', $url);
     	$smarty->display('public_pic.tpl');
   });


 $klein->respond('POST', '/aqsiby/pa2/delete', function ($request, $response, $service) use ($smarty) {
        
	//SEE IF USER HAS ACCESS TO DELETE THIS ACCOUNT
	if(isset($_SESSION['username']) && checkTimeout()) {
                $message = "Your session has been timed out. Please login again.";
                logoutUser();
                echo "<script type='text/javascript'>alert('$message');</script>";
                $smarty->display('logout.tpl');
        }
	$con = mysql_connect('localhost:5834', 'group34', '34group');
        @mysql_select_db('group34pa2', $con) or die('Could not connect: ' . mysql_error());
	mysql_query("DELETE FROM AlbumAccess WHERE username = '".$_SESSION['username']."'", $con);
	$query = "SELECT albumid FROM Album WHERE username = '".$_SESSION['username']."'";
	$result = mysql_query($query, $con) or die(mysql_error());
	while($row = mysql_fetch_array($result)){
                $albumid[] = $row['albumid'];
        }
	foreach($albumid as $aid) {
		$picids = array();
		$query = "SELECT picid FROM Contain WHERE albumid = ".$aid;
		$result = mysql_query($query, $con) or die(mysql_error());
		while($row = mysql_fetch_array($result)){
        	        $picids[] = $row['picid'];
	        }
		mysql_query("DELETE FROM Contain WHERE albumid = ".$aid, $con);
		foreach($picids as $pid) {
			$query = "SELECT url FROM Photo WHERE picid = '".$pid."'";
		        $result = mysql_query($query, $con) or die(mysql_error());
		        $row = mysql_fetch_array($result);
		        $url = $row['url'];
		        unlink($url);
			mysql_query("DELETE FROM Photo WHERE picid = '".$pid."'", $con);
		}
	}
	mysql_query("DELETE FROM Album WHERE username = '".$_SESSION['username']."'", $con);
	mysql_query("DELETE FROM User WHERE username = '".$_SESSION['username']."'", $con);
	$smarty->display('index.tpl');
   });

   $klein->respond('POST', '/aqsiby/pa2/logout', function ($request, $response, $service) use ($smarty) {
	session_destroy();
	$smarty->display('logout.tpl');
   });

$klein->dispatch();

?>


