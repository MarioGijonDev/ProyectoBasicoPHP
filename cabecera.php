<?php

    session_start();

    if(isset($_SESSION['usuario']) != 'develoteca'){
        header("location:login.php");
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Portafolio</title>
</head>
<body>

    <div class="container">
    
        <a href="index.php">Inicio</a>
        <a href="portafolio.php">Portafolio</a>
        <a href="cerrar.php">Cerrar</a>
        <br>