<?php require 'C:/xampp/htdocs/projekt/server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../../Public/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<title>Log In</title>


</head>
<body>
<div class = "container">
<form action="../SinginController/signin.php">
	<input id = "signin" type="submit" name="signin" value="SINGIN">
</form>
	<img id ="Dude" src="../../Public/img/Dude.png" alt="Dude">
	<img src = "../../Public/img/Where is my car.png" alt = "wimc">
	<form action="login.php" method="POST">
			 <div class="messages">
			 <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
			 </div>
			 <input name="email" type="text" placeholder="email@email.com" value = "<?php echo $email;?>">
			 <input name="password" type="password" placeholder="password" value = "<?php echo $password;?>" >
			
			 <button type="submit" name = "login">LOGIN</button>


	 </form>


</div>
</body>
