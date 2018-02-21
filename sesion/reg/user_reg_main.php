<html>
<head>
    <meta charset="utf-8">
    <link href="reg-style.css" rel="stylesheet" type="text/css">
<title>
    Nuevo Usuario
</title>
    <?php
        $b_email=$_POST["email"];
        
    ?>
</head>
<body>
    
    <video autoplay loop preload="auto" class="video2">
        <source src="../../images/cityuser.mp4">
    </video>
       <div class="txtHome" onclick="window.location.href='../../index.php'">Home</div>
     <p class="txtAdmin"  onclick="window.open('../../wardonadmin/index.php')">Administrador</p>
    <div id="container" align="center">
        <img id="logo" src="../../images/logo.png">
        <form action="user-reg.php" method="post" align="center" enctype="multipart/form-data">
            <center>
                
                <br><h1>Registro</h1>
            <table align="center">
            <tr>
                    <td><input type="text" placeholder="Tu nombre" required name="nombre"></td>
                    <td><input type="password" placeholder="Contraseña" required name="contrasena"></td>
                    <td><input type="password" placeholder="Repite la contraseña" ></td>
                    <td><input type="email" placeholder="Google Mail" value="<?php echo $b_email;?>" required name="mail"></td>
                    <td><input type="text" placeholder="Numero de telefono"  name="numero"></td>
                    <td><label for="photo">Foto de perfil</label><input accept="image/*" type="file" name="photo" id="photo"></td>
              </tr>

            </table>
            <table>
               <tr>
                
                   <td><select name="ciudad">
                            <option>Ciudad</option>
                                           <?php
                                try{
                                        $base=new PDO("mysql:host=localhost; dbname=wardondb", "root", "");
                                        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $base->exec("SET CHARACTER SET utf8");
                                    
                                        $sql="SELECT * from ciudad";
                                        $resul=$base->prepare($sql);
                                        $resul->execute(array());
                                        while($consulta=$resul->fetch(PDO::FETCH_ASSOC))
                                        {
                                            echo'<option value=" '.$consulta['id_city'].'">'.$consulta['nombre_city'].'</option>';
                                        }
                                    
                                    }
                                catch(Exception $e)
                                    {
                                        die("Algo ha salido mal :( ".$e->getMessage());
                                    }
                            
                            ?>
                       </select></td>
                   
               </tr>
            </table>
                <br> Protegemos tu privacidad, por lo tanto el ingreso de ubicacion es opcional
            </center>
            <div align="center" class="button"><input align="center"  type="submit" value="Comenzar!"></div>
        </form>
         
    </div>
    <footer>
   <p align="center"><span>WARDON</span>™ Algunos derechos reservados. Designed by Juan E. Lopez, Sneider Narvaez<br> 2017© </p> 
        </footer>
    <style>
  
    #container{
    width:99.9%;
    position: absolute;
    top:50%;
    transform: translateY(-50%);
    }
</style>  
    <audio loop autoplay preload="auto">
    <source src="../../images/audio2.mp3">
    </audio>
</body>
</html>