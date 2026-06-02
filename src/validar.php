<?php 
session_start();
require_once 'conexion.php';

    $usuario_introducido = $_POST['login'];
    $contrasena_introducida = $_POST['contrasena'];

    $sql = "SELECT * FROM usuario WHERE login = ? AND password = ?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$usuario_introducido, $contrasena_introducida]);
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {

        $_SESSION['admin'] = $usuario['login'];
        header('Location: panel.php');
        exit;

        } else {

        header('Location: login.php');
        exit;
    }
    
?>