<?php
session_start();
if(!$_SESSION['nome']){
    header("location: ./login/sair.php");
}
require_once('./../evento/action/conexao.php');
$database = new Database();
$db = $database->conectar();
$cpf=$_SESSION['cpf'];
$sql1 = "SELECT * from denuncias where validacao='v'AND cpf='".$cpf."' ;";

$sql_pre1 = $db->prepare($sql1);
$sql_pre1 -> execute();
$events1 = $sql_pre1->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
    <title>Document</title>
</head>
    <body>
        <!-- Navbar -->
            <div class="navbar">
        <div class="box1">
            <img class="imglogo" src="./../../img/Smartlook.png" alt="Logo">
           
        </div>
        <div>
                <a href="./dashboard.php">dashboard</a>
                
        </div>

        <div>
                 <div>
                    <form action="./../evento/action/buscar.php" method="post" class="bar" >
                        <input type="search" class="search_bar" name="buscar" placeholder="Buscar:" required>
                        <button class="search-btn" type="submit">
                            <span class="material-symbols-outlined" >search</span>
                        </button>
                    </form>
                </div>
        </div>

            <div>
               
                <a href="./login/sair.php">Sair</a>
            </div>
        </div>

        <!-- Fim do navbar -->
    <div class="main">
        <div class="page">

        
        <?php 
        $i = 0;
        foreach($events1 as $eventss1){
            
            echo('
                <div class="min_box">
                    <div class="box_img">
                        <img  src="./img_denu/'.$events1[$i][5].' " alt="Logo">
                    </div>

                    <div class="for">
                        <h1 style="color:black; ">Lixo tipo:</h1>
                        <h1> '.$events1[$i][2].' </h1>
                        <p>'.$events1[$i][1].'</p>
                        <p>'.$events1[$i][3].'</p>
                        <p>'.$events1[$i][6].'</p>
                         <p>'.$events1[$i][4].'</p>
                    </div>
                </div>'
            );
            $i ++;
             }
            ?>
        </div>
    </div>
 
   <!-- começo do footer -->
        <div class="footer">
            
            <div>
            <a href=""></a>
            <a href=""></a>
            </div>
        
        </div>
    </body>
</html>