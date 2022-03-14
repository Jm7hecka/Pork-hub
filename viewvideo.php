<?php
    $id = $_GET['video'];
    $one = array('file'=>'1.mp4', 'vidname'=>'Peppa Pig is playing with her family!', 'view'=>69, 'like'=>48, 'dislike'=>0, 'save'=>10);
    $two = array('file'=>'2.mp4', 'vidname'=>'Long pork makes her satisfying!', 'view'=>84, 'like'=>50, 'dislike'=>10, 'save'=>20);
    $three = array('file'=>'3.mp4', 'vidname'=>'Hot pan wants to fill up by oil', 'view'=>1503, 'like'=>400, 'dislike'=>90, 'save'=>205);
    $four = array('file'=>'4.mp4', 'vidname'=>'Our pork hub intro!', 'view'=>10000, 'like'=>4605, 'dislike'=>100, 'save'=>2006);
    $idarray = array('01'=> $one, '02'=> $two, '03'=> $three, '04'=> $four);
    $data = $idarray[$id];
?>
<!DOCTYPE html>

<html>
<head>
    <title> Free Pork Video & Peppa Pig </title>
    <link rel="icon" href="porkhublogo.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <div class="top">
        <div class="header">
            <img src="porkhublogo.png" class="porkhublogo">
            <form class="searchbar" action="">
                <input type="text" placeholder="Search videos">
                <button type="submit" value=" "><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="headerbottom">
            <div class="menu">
                <a href="./" class="menuname">
                    <p class="itemname"> HOME</p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORK VIDEOS</p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PORKSTARS</p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> COMMUNITY</p>
                </a>
                <a href="" class="menuname">
                    <p class="itemname"> PHOTOS</p>
                </a>
            </div>
        </div>
    </div>
    <div class="mainvideo">
        <div class="videoplayer" id="videoplayer" >
            <video id="videoplay" preload="metadata" width="1000" height="550"  onclick="initializeVideo()">
                <?php 
                    $file = $data['file'];
                    echo '<source src="'.$file.' " type="video/mp4">';
                ?>
            </video>
            <div class="playback-animation" id="playback-animation">
                <img id="icon" class='animationimg' src="playicon.png">
            </div>
            <div class="progress" id="progress">
                <progress id="progress-bar" value="0" min="0"></progress>
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
                    <div id="volume"   onmouseleave="bardisappear()" >
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
        <div id="sharediv">
            <p class="shareword"> Copy link</p>
            <div class="shareurl">
                <input type="text" id="shareurl">
                <button id="shareurlbtn" onclick="copyurl()">Copy</button>
            </div>
            <p id="copied"></p>
        </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>
