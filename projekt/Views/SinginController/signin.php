<?php require 'C:/xampp/htdocs/projekt/server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<title>Sign In</title>
</head>

<body>
<div class = "container">
<div class ="arrow">
    <a href = "../SecurityController/login.php"><img id = "arrow" src = "../../Public/img/left-arrow.png"></a>
</div>
  <img id ="Dude" src="../../Public/img/Dude.png" alt="Dude">
	<img id= "wimc" src = "../../Public/img/Where is my car.png" alt = "wimc">
    <form method = "post" action= "signin.php">
    <label>Email:</label>
      <div>
        <input name="email" type="text" placeholder="email@email.com" value = "<?php echo $email;?>">
      </div>
      <label>Password:</label>
      <div >
        <input name="password_1" type="text" placeholder="password" value = "<?php echo $password_1;?>">
      </div>
      <label>Repeat password:</label>
        <div>
          <input name="password_2" type="text" placeholder="password" value = "<?php echo $password_2;?>">
        </div>
      <button type="submit" name = "signin">SIGNIN</button>
      </form>

</div>
</body>
