<?php
    require 'array.php';   
    $data = '';
    $id = $_GET['video'];
    if(isset($_SESSION['array'])) {
        $data =  $_SESSION['array'];
    }
?>
<!DOCTYPE html>

<html>
<head>
    <?php 
     echo '<title>'.$data["vidname"].'</title>'
    ?>
    <link rel="icon" href="porkhubicon.png" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.'>
    <script type="text/javascript" src="videoplay.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
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
                <a href="./" class="menuname">
                    <p class="itemname"> HOME</p>
                    <p class="activeline"></p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORK VIDEOS <span class="arrow">&#9699;</span> </p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORKSTARS <span class="arrow">&#9699;</span></p>
                </a>
                <a href="" class="menuname" onmouseover="menuappear('social')" >
                    <p class="itemname" id='socialbtn'> Social <span class="arrow">&#9699;</span></p>
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
    <div class="mainvideo">
        <div class="videoplayer" id="videoplayer" >
            <div class="lds-spinner" id='lds-spinner'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            <?php 
            echo '<video id="videoplay" preload="metadata" width="1000" height="550"playsinline   onloadstart="loading()" onloadedmetadata="initializeVideo()">';
            $file = $data['file'];
            echo '<source src="'.$file.' " type="video/mp4">';
            ?>
            </video>
            <button id='phoneplay' onclick="playvideo()" >&#x25B7;</button>
            <div id='videocontrolphone'>
                <time id="timeplayed1">00:00</time>
                <div class="progressphone" id="progressphone">
                    <input type='range' class='progressthumb'  id="progress-barphone" step="0.01" value="0" min="0"></input>
                </div>
                <time id="duration1">00:00</time> 
                <button class="fullscreen" title="Full screen" onclick="fullscreen()" id="fullscreen1"><i class="material-icons" id="fullicon">&#xe5d0;</i></button>
            </div>
            <div class="playback-animation" id="playback-animation">
                <img id="icon" class='playiconanimate' src="playicon.png">
            </div>
            <div class="progress" id="progress">
                <input type='range' id="progress-bar" class='progresshide' step="0.01" value="0" min="0"></input>
            </div>
            <div id="videocontrol">
                <div class="leftbar">
                    <button id="play" title="Play" onclick="playvideo()">&#x23F5;</button>
                    <div class="time">
                        <time id="timeplayed">00:00</time>
                        <span> / </span>
                        <time id="duration">00:00</time> 
                    </div>
                    <button id="mute" title="Mute" onclick="mute()" onmouseover="barappear()" ><i class="fa fa-volume-up"></i></button>
                    <div id="volume">
                        <input type='range'oninput='changevolume()' id='volumebar' class="hidethumb" title="volume" min='0' max='1' step='0.1' value='1'> 
                    </div>
                </div>
                <button class="fullscreen" title="Full screen" onclick="fullscreen()" id="fullscreen"><i class="material-icons" id="fullicon">&#xe5d0;</i></button>
            </div>
        </div>
        <div class="advert"> 
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" >
                <center><img src="advert1.png" class="advert1"></center>
            </a>
        </div>
        <div class="videonameplace">
            <?php 
                $vidname = $data['vidname'];
                echo '<p class="videoname">'.$vidname.'</p>';
            ?>
        </div>
        <?php
        $likeper = strval(round(($data['like']/$data['view'])*100)) .'%';
        $datetime1 = date_create(date('Y-m-d'));
        $datetime2 = $data['date'];
        $interval = date_diff($datetime1, $datetime2);
        if(intval($interval->format('%y')) != 0){
            $date = $interval->format('%y years ago');
        }else if(intval($interval->format('%m')) != 0){
            $date =  $interval->format('%m months ago');
        }else if(intval($interval->format('%d')) != 0){
            $date =  $interval->format('%d days ago');
        }
        echo '<div class="videoinfo">
                   <p class="information"> '.$data['view'].' Views | <i class="fa fa-thumbs-up"> </i> '.$likeper.'| '.$date .' </p>
              </div>
              <div class="videorespo">
                   <button onclick="respobtn1()"><i class="fa fa-thumbs-up" id="thumbup"> </i><p>'.$data['like'].'</p> </button>
                   <button onclick="respobtn2()"><i class="fa fa-thumbs-down" id="thumbdown"> </i><p>'.$data['dislike'].'</p></button>
                   <button onclick="respobtn3()"><i class="fa fa-heart" id="heart"> </i><p>'.$data['save'].'</p> </button>
                   <button onclick="sharebtn()"><i class="fa fa-share-alt"></i> Share </button>
                 </div>';
        ?>
        <div id='sharedivphone'>
            <button onclick='closesharediv()' id='closesharediv'>x</button>
            <div class='textcontainer'>
                <p class='sharetext'>Share this video</p>   
            </div>
            <input type="text" id="shareurl">
            <button id="shareurlbtn" onclick="copyurl()">Copy</button>  
            <p id="copied"></p>
        </div>
        <div id="sharediv">
            <p class="shareword"> Copy link</p>
            <div class="shareurl">
                <input type="text" id="shareurl">
                <button id="shareurlbtn" onclick="copyurl()">Copy</button>
            </div>
            <p id="copied"></p>
        </div>
        <div class="author">
            <?php 
            echo '<img src=" ' .$data['authorimg'].'"/>
            <p class="authorname">'.$data['authorname'].'</p>
            <a href="'.$data['originalurl'].'">
                <button >Check original video </button>
            </a>
        </div>';
        ?>
        <div class='videolist'>
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
    </div>
    <script type="text/javascript" src="videoplay.js"></script>
</body>
</html>
