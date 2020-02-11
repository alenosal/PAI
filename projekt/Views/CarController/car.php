<?php require 'C:/xampp/htdocs/projekt/server.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="stylecar.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<title>YOUR CAR</title>
</head>

<body>

    <div class = "container">
        <div class ="arrow">
            <a href = "../BoardController/map.php"><img id = "arrow" src = "../../Public/img/left-arrow.png"></a>
        </div>
    <img id ="Dude" src="../../Public/img/Dude.png" alt="Dude">
	<img id = "wimc" src = "../../Public/img/Where is my car.png" alt = "wimc">
        <h1 class = "label_2">MY CAR</h1>
    <form method = "post" action = "car.php">
        <div id = "label">
        <label>Brand:</label>
        </div>
        <div class = "input">
        <input name="brand" type="text" placeholder="brand" value = "<?php echo $brand;?>">
        </div>
        <div id = "label">
        <label>Model:</label>
        </div>
        <div class = "input">
        <input name="model" type="text" placeholder="model" value = "<?php echo $model;?>">
        </div>
        <div id = "label">
        <label>Color:</label>
        </div>
        <div class = "input">
        <input name="color" type="text" placeholder="color" value = "<?php echo $color;?>">
        </div>
        <button type="submit" name = "submit">SUBMIT</button>

    </form>

    </div>
</body>

