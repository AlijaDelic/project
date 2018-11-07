<?php
session_start();
include "../helpers/ClassLoader.php";
User::logout();
$user = User::getLoggedInUser();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Recept.ba</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device width, initial-scale = 1">
    <link href="/assets/bootstrap/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.css" type="text/css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="../assets/bootstrap/js/jquery.session.js"></script>
    <script src="../assets/bootstrap/js/javascript.js"></script>
    <script src="../assets/script.js"></script>
</head>
<body class="bg-light">
<?php
if($user){
    include "../views/nav/nav_when_logged_in.php";
}
else
{
    User::login();
    include "../views/nav/nav_when_not_logged_in.php";
}
?>




