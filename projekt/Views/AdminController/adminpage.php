<!DOCTYPE html>
<?php
require 'C:/xampp/htdocs/projekt/server.php';
?>

<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<title>Admin Page</title>

</head>

<body>
<div class='container'>
    <?php
        echo '<a href = "../BoardController/map.php"><img id ="Dude" src="../../Public/img/Dude.png" alt="Dude" width="160" height="100"></a>';
        $db = new mysqli("localhost", "root", "", "pai2.0");
        $query = "SELECT * FROM users";
        
        echo "<label>USERS</label>";

        if ($result = $db->query($query)) {
            echo "<table>";
            echo "<tr>
            <th>ID</th>
            <th>email</th>
            <th>role</th>
            </tr>";
 
            while ($row = $result->fetch_assoc()) {
                $id_user = $row["id_user"];
                $email = $row["email"];
                $role = $row["role"];
                
                
                echo "<tr><td>$id_user</td><td>$email</td><td>$role</td></tr>" ;
               
                
            }
            echo "</table>";
            $result->free();
        }

        echo "<br><br>";
        echo "<label>CARS</label>";

        $query = "SELECT u.email, c.id_car, c.brand, c.model, c.color FROM car c, users u where c.id_user = u.id_user";
        if ($result = $db->query($query)) {
            echo "<table>";
            echo "<tr>
            <th>email</th>
            <th>Car Id</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            </tr>";
 
            while ($row = $result->fetch_assoc()) {
                $email = $row["email"];
                $id_car = $row["id_car"];
                $brand = $row["brand"];
                $model = $row["model"];
                $color = $row["color"];
                
                
                echo "<tr><td>$email</td><td>$id_car</td><td>$brand</td>
                    <td>$model</td><td>$color</td></tr>";
                // echo ' ';
                // echo $email;
                // echo ' ';
                // echo $role.'<br />';
                
            }
            echo "</table>";
            $result->free();
        }
    ?>
</div>
</body>
