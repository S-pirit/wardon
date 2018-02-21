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
      $b_name = $_POST['nombre'];
     $b_numero = $_POST['numero'];
    $b_city = $_POST['ciudad'];
     try
     {
        $base=new PDO('mysql:host=localhost; dbname=wardondb', 'root','');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

      
   
    
        $sql="UPDATE usuario SET nombre_user=:n, numero_user=:numb, id_city=:city where email_user=:mail";
    
     
    
        $resul=$base->prepare($sql);
        $resul->execute(array(
                              ":mail"=>$b_email,
                              ":n"=>$b_name,
                              ":numb"=>$b_numero,
                              ":city"=>$b_city
                           ));
         
        header("Location:configuracion.php");
     }
    catch(Exception $e)
    {
        die("Algo salio mal, intentalo de nuevo".$e->getMessage() );
    }
?>
</html>