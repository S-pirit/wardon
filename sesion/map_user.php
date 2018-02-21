<!DOCTYPE html>
<?php
session_start();
    ?>
   <script>
        function logIn(){
            alert( 'Hola  ' + "<?php echo $_SESSION["email"]; ?>"  +  '! Sé bienvenido a WARDON');
        }
    </script>
<?php

if(isset($_SESSION["email"]))
{
    echo"<script>logIn()</script>";
}
else
{
    header("location:index_login.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="../style-index.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="style_user.css">
</head>
<body>
    <div class="cover"></div>
   <header>
    
        <nav>
           <ul>
               <li onclick="window.location.href=''">Mapa</li>
               <li onclick="window.location.href='profiles/profile.php'">Mi Perfil</li>
               <li><img class='perfil' src="../images/user.png" width="200px"></li>
               <li onclick="window.location.href='profiles/configuracion/configuracion.php'">Configuracion</li>
               <li onclick="window.location.href='sesion/profiles/profile.php'">Nosotros</li>
           </ul>
        </nav>
          
    </header>
    <main>
        
        <div class="container">
            <br><br><br><br><br><br>
            <center><img src="../images/location.gif"></center>
            <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d33798.88176979444!2d-76.06211391156982!3d1.8507526072382257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e250b7dba6f64ff%3A0x7a99e7b32e8fa32c!2sPitalito%2C+Huila%2C+Colombia!5e0!3m2!1ses!2ses!4v1500285532426" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </main>
</body>
    <style>
        .container{
            position:absolute;
            width:100%;
        }
    </style>
</html>