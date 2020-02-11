<?php
require "Models/User.php";
require "Models/Car.php";
  session_start();
  $email ="";
  $password_1= "";
  $password_2 = "";
  $password = "";

  $brand = "";
  $model = "";
  $color = "";
  $errors = array();

  $curemail = "";

  $servername = "localhost";
  $username = "root";
  $database = "pai2.0";

  $db = new mysqli("localhost", "root", "", "pai2.0");
  $user = new User();



  if(isset($_POST['signin'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if(empty($email)){
      array_push($errors, "email is required");
    }

    if(empty($password_1)){
      array_push($errors, "password is required");
    }

    if(empty($password_2)){
      array_push($errors, "password is required");
    }

    if($password_1 != $password_2){
      array_push($errors, "passwords don't match");
    }

    if(count($errors)==0){
      // $user = new User();
      $user->setEmail($email);
      $password = md5($password_1);
      $user->setPassword($password);
      $user->setRole("user");
      $sql ="INSERT INTO users (email, password, role) VALUES ('$email', '$password','$user->role')";
      mysqli_query($db, $sql);
      $_SESSION['mail'] = $email;
      $curemail = $email;
      header('location: ../BoardController/map.php');
    }
  }

  if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($email)){
      array_push($errors, "email is required");
    }

    if(empty($password_1)){
      array_push($errors, "password is required");
    }

    if(count($errors) == 0) {
      $password = md5($password_1);
      // $user = new User();
      $car = new Car();
      $user->setEmail($email);
      $user->setRole("user");
      $user->setPassword($password);

      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($db,$query);
      
      $row = mysqli_fetch_array($result);
      
      $user->setId($row['id_user']);
      $id = $row['id_user'];
      $user->setRole($row["role"]);

      if(mysqli_num_rows($result) == 1)
      {
        if($user->getRole()=="admin")
        {
          $_SESSION['mail'] = $email;
          header('location: ../AdminController/adminpage.php');
        }else{
        $_SESSION['mail'] = $email;
        $curemail = $email;
        
        $query = "SELECT c.brand, c.model, c.color FROM car c LEFT JOIN users u ON c.id_user = u.id_user WHERE c.id_user ='$id'";
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_array($result);
        
        $car->setBrand($row['brand']);
        $car->setModel($row['model']);
        $car->setColor($row['color']);

      header('location: ../BoardController/map.php');}
      }else{
        array_push($errors, "the email or password is wrong");
        header('location: login.php');
      }
    }
  }

  if(isset($_POST['logout'])) {
    session_start();
    unset($_SESSION['mail']);
    header('location: ../SecurityController/login.php');
  }
     
  

  if(isset($_POST['submit'])) {
    $brand = mysqli_real_escape_string($db, $_POST['brand']);
    $model = mysqli_real_escape_string($db, $_POST['model']);
    $color = mysqli_real_escape_string($db, $_POST['color']);

    if(empty($brand)){
      array_push($errors, "brand is required");
    }

    if(empty($model)){
      array_push($errors, "model is required");
    }

    if(empty($color)){
      array_push($errors, "color is required");
    }

    if(count($errors) == 0) {
      $car = new Car();
     
      $query = "SELECT * FROM users WHERE email = '".$_SESSION['mail']."'";
      $result = mysqli_query($db,$query); 
      $row = mysqli_fetch_array($result);
      $id = $row['id_user'];
      //die($id);
      
      $sql ="INSERT INTO car (id_user, brand, model, color) VALUES ('$id','$brand', '$model','$color')";
      $car->brand = $brand;
      $car->model = $model;
      $car->color = $color;
      
      mysqli_query($db, $sql);
      header('location: ../BoardController/map.php');
    }
    
  }
?>
