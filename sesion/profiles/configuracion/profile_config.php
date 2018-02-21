<!DOCTYPE html>
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


<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../style-index.css">
    <link rel="stylesheet" type="text/css" href="../../../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../style_user.css">
    <link rel="stylesheet" type="text/css" href="../../../css/footer-style.css">
    <link rel="stylesheet" type="text/css" href="../../reg/reg-style.css">
</head>
<body>
     <div class="cover"></div>
   <header>
    
        <nav>
           <ul>
               <li onclick="window.location.href='../../map_user.php'" class="li">Mapa</li>
               <li onclick="window.location.href='../profile.php'">Mi Perfil</li>
               <li><img class='perfil' src="../../../images/user.png" width="200px"></li>
               <li onclick="window.location.href='configuracion.php'">Configuracion</li>
               <li onclick="window.location.href='../sesion/profiles/profile.php'">Nosotros</li>
           </ul>
        </nav>
          
    </header>
   
   <div>
        <div class="pagContainer">
        
            <main>
                <div id="container">
                    <?php
                        $b_email=$_SESSION["email"];
                            try
                            {
                                $base=new PDO('mysql:host=localhost; dbname=wardondb', 'root','');
                                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $base->exec("SET CHARACTER SET utf8");

                                $sentencia="select nombre_user, numero_user from usuario inner join ciudad on usuario.id_city=ciudad.id_city WHERE email_user = :mail";
                                $resul=$base->prepare($sentencia);
                                $resul->execute (array(
                                                        @":mail"=>$b_email
                                                        ));

                                

                                    while($consulta=$resul->fetch(PDO::FETCH_ASSOC))
                                    {
                                        ?>
                                            <center>
                                                <form action="profile_config_proceso.php" method="post">
                                                <table id='table1' align='center'>
                                                    
                                                <tr><td><input value="<?php echo $consulta["nombre_user"]; ?>" id="tile" type="text" name="nombre"></td></tr>
                                              
                                                    <tr><td><input value="<?php echo $consulta["numero_user"]; ?>" id="tile" type="text" name="numero"></td></tr>
                                                    <td>
                                                    <select name="ciudad">
                                                    <option>Ciudad</option>
                                                            <?php
                                                                try{
                                                                        

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
                                                    </select>
                                                    </td>
                   
                                                    <tr align="center"><td><input value="Update" id="button" type="submit" onclick="profile_config_proceso.php"></td></tr>
                                                        </table>
                                                </form>
                                            </center>
                                        </div>
                                        <?php
                                    }

                            }
                        catch(Exception $e)
                              {
                            die("Algo salio mal :c ,".$e->getMessage());
                            }

                ?>
                    
         
        
         </main>
    
          <footer>
              
            <div class="credits"><img src="../../../images/sena.png"><img src="../../../images/logo3.png"><img src="../../../images/balloon.png"> <p><span>WARDON</span>™ Algunos derechos reservados. Designed by Juan E. Lopez, Sneider Narvaez<br> 2017© </p> <div class="social"> <img src="../../../images/Google.svg"><img src="../../../images/Facebook.svg" ><img src="../../../images/Instagram.svg"><img src="../../../images/YouTube.svg"><img src="../../../images/Twitter.svg"  ></div></div>

            <div class="foot"></div>
          </footer>
       </div>
    </div>
<style>
    td,tr,input{
        color:#b7b7b7;
        float:none;
        border-color: #b7b7b7;
    }
    table{
        padding:0;
        width:10vw;
        background-color:#f0f0f0;
        border:2px solid black;
        margin:0;
    
    }
    footer{
     margin-top:100px;   
    }
    </style>
</body>
    
</html>