<?php 
require 'array.php'; 
?>
<!DOCTYPE html>

<html>
<head>
    <title> Free Pork Video & Peppa Pig </title>
    <script type="text/javascript" src="app.js"></script>
    <link rel="icon" href="porkhublogo.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <div class="top">
        <div class="header">
            <a href='./'><img src="porkhublogo.png" class="porkhublogo"></a> 
            <form class="searchbar" action="">
                <input type="text" placeholder="Search videos">
                <button type="submit" value=" "><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="headerbottom">
            <div class="menu">
                <a href="" class="menuname">
                    <p class="itemname"> HOME</p>
                    <p class="activeline"></p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORK VIDEOS <span class="arrow">&#9699;</span> </p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORKSTARS <span class="arrow">&#9699;</span></p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> COMMUNITY <span class="arrow">&#9699;</span></p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PHOTOS <span class="arrow">&#9699;</span></p>
                </a>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="discover">
            <div class="discovervideo">
                <p class="discovertitle">Hottest ></p>
            </div>
            <div class="discovervideo">
                <p class="discovertitle">Recommended ></p>
            </div>
            <div class="discovervideo">
                <p class="discovertitle">Pig ></p>
            </div>
        </div>
        <a href="" class="nation">
            <p>Hot Pork Videos in World</p>
        </a>
    <?php
        if(isset($_SESSION['idarray'])){
            $idarray = $_SESSION['idarray'];
        }
        $array = array_values($idarray);
        for ($num =0;$num <= count($array); $num ++ ){
            echo '<div class="video">
                    <a href="viewvideo.php?video=0'. $num +1 .'" class="videolink">
                        <video width="255" height="140" class="videocover">
                            <source src="'.$array[$num]['poster'].'" type="video/mp4">
                        </video>
                        <p class="videonamelink">'.$array[$num]['vidname'].'</p>
                    </a>
                    <p class="view">'.$array[$num]['view'].' views <i class="fa fa-thumbs-up , thumbup"></i>'.strval(round(($array[$num]['like']/$array[$num]['view'])*100)) .'% </p>
                  </div>';
            if($num == count($array)-1 ){
                break;
            }
        }
    ?> 
        
        
    </div>
</body>
