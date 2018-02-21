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
    $foto=$_FILES["photo"]["name"];
    $ruta=$_FILES["photo"]["tmp_name"];
    $destino="../profiles/photo/".$foto;
    copy($ruta,$destino);
    $b_email=$_SESSION["email"];
     try
     {
        $base=new PDO('mysql:host=localhost; dbname=wardondb', 'root','');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $b_pass = $_POST['password'];
   
    
        $sql="UPDATE usuario SET photo=:ph where email_user=:mail";
    
     
    
        $resul=$base->prepare($sql);
        $resul->execute(array(
                              ":mail"=>$b_email,
                              ":ph"=>$destino
                           ));
         
        header("Location:configuracion/configuracion.php");
     }
    catch(Exception $e)
    {
        die("Algo salio mal, intentalo de nuevo".$e->getMessage() );
    }
?>
</html>