<?php

	$arr = [];
	$arr['email'] 		= $_POST['email'];

 	$row = db_query("select * from users where email = :email limit 1",$arr);

	if(!empty($row))
	{
		$row = $row[0];

		//check the password
		if(password_verify($_POST['password'], $row['password']))
		{
			//password correct
			$info['success'] 	= true;
			$_SESSION['PROFILE'] = $row;
		}else
		{
			$info['errors']['email'] = "Wrong email or password";
		}

	}else
	{
		$info['errors']['email'] = "Wrong email or password";
	}