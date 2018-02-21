<!DOCTYPE html>
<html>
<head>
     <?php
    session_start();
    $host="localhost";
    $username="root";
    $passsword="";
    $database="empresa";
    $message;
    
    try
    {
        $base=new PDO("mysql:host=localhost; dbname=wardondb", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if (isset($_POST["btnLogin"]))
        {
            if(empty($_POST["email"]) || empty($_POST["pass"]))
            {
                $message="Requerimos el nombre de usuario y la contraseña para ingresar ";
            }
            else
            {
                $consulta="SELECT * FROM usuario WHERE email_user=:mail AND contrasena_user=:password";
                $sentencia=$base->prepare($consulta);
                $sentencia->execute(
                    array
                    (
                    "mail"=>$_POST["email"],
                    "password"=>$_POST["pass"]
                ));
                $count = $sentencia->rowCount();
                if ($count>0)
                {
                    $_SESSION["email"] = $_POST["email"];
                    header("location:profiles/profile.php");
                }
                else{
                    $message="No encontramos registros que coincidan con esta información";
                }
            }
            
        }
    }
    catch(Exception $e)
    {
        die("Algo ha salido mal :( Error:".$e->getMessage());
    }
    ?>
    <script>
        function Error(){
            alert("<?php echo $message;?>");
        }
    </script>
    <link rel="stylesheet" type="text/css" href="reg/reg-style.css">
    
</head>
<body>
    <video  autoplay loop preload="auto" class="video2">
    <source src="../images/cityuser.mp4" >
    </video>
     <div class="txtHome" onclick="window.location.href='../index.php'">Home</div>
     <p class="txtAdmin"  onclick="window.open('../wardonadmin/index.php')">Administrador</p>
   
    <div id="container" align="center">
       
        <img id="logo" src="../images/logo.png">
        <form action="" method="post" align="center">
            <center>
                
                <br><h1>Inicia Sesion</h1>
            <table align="center">
            <tr>
                    <td><input type="text" placeholder="@email" required name="email"></td>
                    <td><input type="password" placeholder="Contraseña" required name="pass"></td>
            </tr>
            </table>
                
            </center>
            <div align="center" class="submit"><input align="center"  type="submit" value="Comenzar!" name="btnLogin"></div>
        </form>
  
      
    </div>
     <footer align="center">
        
        <p align="center"><span>WARDON</span>™ Algunos derechos reservados. Designed by Juan E. Lopez, Sneider Narvaez<br> 2017© </p> 
    </footer>
</body>
  <audio loop autoplay preload="auto">
    <source src="../images/audio2.mp3">
    </audio>
</html>