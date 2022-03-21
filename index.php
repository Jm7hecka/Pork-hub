<?php 
require 'array.php'; 
?>
<!DOCTYPE html>

<html>
<head>
    <title> Free Pork Video & Peppa Pig | Best Pork tube, Pork-hub, Pornhub, Pork Video, meme, meme website</title>
    <meta name='description'
      Content="Porkhub, the smallest pork tube in the internet . We provide tons of pork video(if you can provide the pork video to us) everyday. The concept of porkhub is the world most famous website pornhub, if you like pornhub, you must also like porkhub. Porkhub is a cool, stunning and hilarious website ever. Porn have pornhub, and pork have porkhub. Porn is the best, and so is pork. We are porkhub, the best website ever(if pornhub doesn't exist). ">
    <script type="text/javascript" src="app.js"></script>
    <link rel="icon" href="porkhubicon.png" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <div class="top">
        <div class='menupage' id='menupage'>
            <div class='menutop'>
                <img src='porkhublogo.png'>
                <button id='closemenu' onclick='menuclose()'>
                   <div></div><div></div>
                </button>
            </div>
            <button id='' class='menubtn' id='menubtn' onclick="window.location.href='./'"><p><i class="fa fa-home"></i>Home</p> </button>
            <button id='' class='menubtn' id='menubtn' onclick="window.location.href='./'"><p><i class="fas fa-video"></i>Pork videos <span class="arrow">&#9699;</span></p></button>
            <button id='' class='menubtn' id='menubtn' onclick="window.location.href='./'"><p><span class="iconify , pigicon" data-icon="mdi:pig" style="color: white;"></span>Porkstars <span class="arrow">&#9699;</span></p></button>
            <button id='' class='menubtn' id='menubtn' onclick="window.location.href='./socialmedia'"><p><i class="fa fa-male"></i>Social <span class="arrow">&#9699;</span></p> </button>
            <button id='' class='menubtn' id='menubtn' onclick="window.location.href='./'"><p><i class="fa fa-camera"></i>Photos <span class="arrow">&#9699;</span></p> </button>
        </div>
        <div class="header">
            <button id='openmenu' onclick='menuopen()'>
                <div></div><div></div><div></div>
            </button>
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
                <a href="./socialmedia" class="menuname" onmouseover="menuappear('social')" >
                    <p class="itemname" id='socialbtn'> SOCIAL <span class="arrow">&#9699;</span></p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PHOTOS <span class="arrow">&#9699;</span></p>
                </a>
            </div>
        </div>
    </div>
    
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
    <div class='social' id='social'>
        <p class='socialtext'>Our Social Media</p>
        <span class='socialtext2'>Follow Porkhub's social media for more information</span>
        <div class='iconcontainer'>
            <a href='https://github.com/jm7meme/Pork-hub'>
                <div class='github , socialdiv'>
                <i class="fab fa-github , socialicon"></i>
                <p>Github</p>
            </div>
            </a>
            <div class='twitter , socialdiv' >
                <i class="fab fa-twitter , socialicon"></i>
                <p>Twitter</p>
            </div>
            <a href='https://www.instagram.com/porkhub_social/'>
                <div class='instagram , socialdiv'>
                    <i class="fab fa-instagram , socialicon"></i>
                    <p>Instagram</p>
                </div>
            </a>
            <div class='discord , socialdiv'>
                <i class='fab fa-discord , socialicon'></i>
                <p>Discord</p>
            </div>
        </div>
    </div>
    <div class="main" id='main'>
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
