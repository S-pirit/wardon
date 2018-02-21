<html>
    
<body>
    <script>
        function success(){
            alert("Bienvenido a Wardon! ");
            window.location.href="../index_login.php";
        }
    </script>
<?php
    $name=$_POST["nombre"];
    $email=$_POST["mail"];
    $number=$_POST["numero"];
    $password=$_POST["contrasena"];
    $city=$_POST["ciudad"];
    
    try 
    {
        $base= new PDO("mysql:host=localhost; 
        dbname=wardondb", "root", "");
        $base->exec("SET CHARACTER SET utf8");
            echo"conectado";
        
       
        $foto=$_FILES["photo"]["name"];
        $ruta=$_FILES["photo"]["tmp_name"];
        $destino="../profiles/photo/".$foto;
        copy($ruta,$destino);
        
        $sql="INSERT INTO usuario(nombre_user, email_user, numero_user, contrasena_user, id_city, photo) VALUES (:nam, :em, :num, :pass, :cty, :photo)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nam"=>$name, 
                                  ":em"=>$email,
                                  ":photo"=>$destino,
                                  ":num"=>$number,
                                  ":pass"=>$password,
                                  ":cty"=>$city
                                 ));
        
        $resultado->closeCursor();
        
       
        ?><script>success();</script><?php
    }
    catch(Exeption $e)
    {
        die("Algo anda mal, hubo un error: ".$e->getMessage());
    }
    finally
    {
        $base=null;
    }

?>
  

</body>
</html>