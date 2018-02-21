<!DOCTYPE html>
<?php
session_start();
    ?>
   <script>
        
    </script>
<?php

if(isset($_SESSION["email"]))
{
    
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

                                $sentencia="select * from usuario inner join ciudad on usuario.id_city=ciudad.id_city WHERE email_user = :mail";
                                $resul=$base->prepare($sentencia);
                                $resul->execute (array(
                                                        @":mail"=>$b_email
                                                        ));

                                

                                    while($consulta=$resul->fetch(PDO::FETCH_ASSOC))
                                    {
                                        ?>
                                            <center>
                                                <form action="password_proceso.php" method="post">
                                                <table id='table1' align='center'>
                                                <tr class="tr">
                                                 <td colspan="4"><center><h1><?php echo $consulta['nombre_user'];?><br><h2><?php echo $consulta['email_user']?></h2></h1></center></td>

                                                </tr>


                                                 <tr>
                                                    <td><input required class="text" name="password" type="text" placeholder="Nueva contraseña"></td>
                                                </tr>
                                                <tr>
                                                    <td><input class="button2" type="submit" value="Cambiar"></td>
                                                </tr>
                                                </table>
                                                </form>
                                            </center>
                                        <?php
                                    }

                            }
                        catch(Exception $e)
                              {
                            die("Algo salio mal :c ,".$e->getMessage());
                            }

                ?>
            </div>
         
        
         </main>
    
          <footer>
              
            <div class="credits"><img src="../../../images/sena.png"><img src="../../../images/logo3.png"><img src="../../../images/balloon.png"> <p><span>WARDON</span>™ Algunos derechos reservados. Designed by Juan E. Lopez, Sneider Narvaez<br> 2017© </p> <div class="social"> <img src="../../../images/Google.svg"><img src="../../../images/Facebook.svg" ><img src="../../../images/Instagram.svg"><img src="../../../images/YouTube.svg"><img src="../../../images/Twitter.svg"  ></div></div>

            <div class="foot"></div>
          </footer>
       </div>
    </div>
<style>
    td,tr{
        background-color:#f0f0f0;
        border-style:none;
        border-color: #f0f0f0;
    }
    table{
           background-color:#f0f0f0;
        border-style:none;
        border-color: #f0f0f0;
    }

    </style>
</body>
    
</html>