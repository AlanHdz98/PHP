<?php

//iniciar session y conectar a la base de datos
require_once 'includes/conexion.php';


/// recoger datos de formulario 
if (isset($_POST)){
    
    //borrar eror antiguo
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }



    $email = trim($_POST['email']);
    $password =$_POST['password'];


    //consulta para comprobar credenciales de usuario

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db,$sql);

    if ($login && mysqli_num_rows($login) == 1){

        $usuario = mysqli_fetch_assoc($login);
        
       $verify = password_verify($password, $usuario['password']);

       if ($verify) {
           //utilizar una sesion para guardar los datos del ususario
           $_SESSION['usuario'] = $usuario;

           

        } else{
            $_SESSION['error_login'] = "Login incorrecto";
        }

    }
    
    //redirigir al index
    header("Location:index.php");
        
    
}



//comprobar la contraseña de





//utiliar una sesion para guardar datos de usuario logueado



//si algo falla enviar sesion con el fallo



//redirigir al index 


