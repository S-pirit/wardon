<html>
    <?php
session_start();
    ?>
   <script>
        
    </script>
<?php

if(isset($_SESSION["email"]))
{
    echo"<script>logIn()</script>";
}
else
{
    header("location:../index_login.php");
}
?>
<?php
    $b_email=$_SESSION["email"];
     try
     {
        $base=new PDO('mysql:host=localhost; dbname=wardondb', 'root','');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $b_pass = $_POST['password'];
   
    
        $sql="UPDATE usuario SET contrasena_user=:p where email_user=:mail";
    
     
    
        $resul=$base->prepare($sql);
        $resul->execute(array(
                              ":mail"=>$b_email,
                              ":p"=>$b_pass
                           ));
         
        header("Location:configuracion.php");
     }
    catch(Exception $e)
    {
        die("Algo salio mal, intentalo de nuevo".$e->getMessage() );
    }
?>
</html>