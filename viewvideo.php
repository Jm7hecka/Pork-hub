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
    <title> Free Pork Video & Peppa Pig </title>
    <link rel="icon" href="porkhubicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script type="text/javascript" src="videoplay.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
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
                    <p class="itemname"> HOME </p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORK VIDEOS <span class="arrow">&#9699;</span></p>
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
    <div class="mainvideo">
        <div class="videoplayer" id="videoplayer" >
            <?php 
            echo '<video id="videoplay" playsinline preload="metadata" width="1000" height="550" onloadedmetadata="initializeVideo()">';
            $file = $data['file'];
            echo '<source src="'.$file.' " type="video/mp4">';
            ?>
            </video>
            <button id='phoneplay' onclick="playvideo()" > &#x25B7; </button>
            <div id='videocontrolphone'>
                <time id="timeplayed1">00:00</time>
                <div class="progressphone" id="progressphone">
                    <input type='range' id="progress-barphone" step="0.01" value="0" min="0"></input>
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
        echo '<div class="videoinfo">
                   <p class="information"> '.$data['view'].' Views | <i class="fa fa-thumbs-up"> </i> '.$likeper.'| 1 day ago </p>
              </div>
              <div class="videorespo">
                   <button onclick="respobtn1()"><i class="fa fa-thumbs-up" id="thumbup"> </i><p>'.$data['like'].'</p> </button>
                   <button onclick="respobtn2()"><i class="fa fa-thumbs-down" id="thumbdown"> </i><p>'.$data['dislike'].'</p></button>
                   <button onclick="respobtn3()"><i class="fa fa-heart" id="heart"> </i><p>'.$data['save'].'</p> </button>
                   <button onclick="sharebtn()"><i class="fa fa-share-alt"></i> Share </button>
                 </div>'
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
            <div class="video">
               <a href="viewvideo.php?video=01" class="videolink">
                   <video width="255" height="140" class="videocover">
                       <source src="1.mp4#t=10" type="video/mp4">
                   </video>
                    <p class="videonamelink"> Peppa Pig is playing with her family!</p>
               </a>
               <p class="view"> 69 views <i class="fa fa-thumbs-up , thumbup"></i> 70%</p>
           </div>
           <div class="video">
               <a href="viewvideo.php?video=02" class="videolink">
                   <video width="255" height="140" class="videocover" >
                       <source src="2.mp4#t=5" type="video/mp4">
                   </video>
                   <p class="videonamelink"> Long pork makes her satisfying!</p>
               </a>
               <p class="view"> 84 views  <i class="fa fa-thumbs-up , thumbup"></i> 60%</p>
           </div>
           <div class="video">
               <a href="viewvideo.php?video=03" class="videolink">
                   <video width="255" height="140" class="videocover">
                       <source src="3.mp4#t=10" type="video/mp4">
                   </video>
                   <p class="videonamelink"> Hot pan wants to fill up by</p>
               </a>
               <p class="view"> 1503 views  <i class="fa fa-thumbs-up , thumbup"></i> 27%</p>
               
           </div>
           <div class="video">
               <a href="viewvideo.php?video=04" class="videolink">
                   <video width="255" height="140" class="videocover">
                       <source src="4.mp4#t=5" type="video/mp4">
                   </video>
                   <p class="videonamelink"> Our pork hub intro!</p>
               </a>
               <p class="view"> 10000 views  <i class="fa fa-thumbs-up , thumbup" ></i> 46%</p>
           </div>
        </div>
    </div>
    <script type="text/javascript" src="videoplay.js"></script>
</body>
</html>
