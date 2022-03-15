<?php
session_start();
$data = ' ';
$id=' ';
$id = $_GET['video'];
$empty = array('file'=>'',
              'poster'=>'', 
              'vidname'=>'', 
              'view'=> '', 
              'like'=>'' , 
              'dislike'=>'' , 
              'save'=>'' , 
              'authorname'=>'', 
              'authorimg'=>'',
              'originalurl'=>'');

$one = array('file'=>'1.mp4',
             'poster'=>'1.mp4#t=10',
             'vidname'=>'Peppa Pig is playing with her family!', 
             'view'=>69, 
             'like'=>48, 
             'dislike'=>0, 
             'save'=>10, 
             'authorname'=>'PeppaPigFreeTVCartoons', 
             'authorimg'=>'https://yt3.ggpht.com/ytc/AKedOLREN1pLcplbkzE2HU3h8lZAx_iAwoMhHjLq_p4H=s88-c-k-c0x00ffffff-no-rj',
             'originalurl'=>'https://www.youtube.com/watch?v=mA1UxREUs5c');

$two = array('file'=>'2.mp4', 
             'poster'=>'2.mp4#t=5', 
             'vidname'=>'Long pork makes her satisfying!', 
             'view'=>84, 
             'like'=>50, 
             'dislike'=>10,
             'save'=>20, 
             'authorname'=>'RA Maxwell',
             'authorimg'=>'https://yt3.ggpht.com/ytc/AKedOLTqrAiM8eD6IL7MpZGwcx9RHQ9YrNj0tzwWW1Yc=s88-c-k-c0x00ffffff-no-rj',
             'originalurl'=>'https://www.youtube.com/watch?v=L7lHdaKJC8A');

$three = array('file'=>'3.mp4', 
               'poster'=>'3.mp4#t=5', 
               'vidname'=>'Hot pan wants to fill up by oil', 
               'view'=>1503, 
               'like'=>400, 
               'dislike'=>90, 
               'save'=>205, 
               'authorname'=>'Tammicia Rochelle',
               'authorimg'=>'https://yt3.ggpht.com/YKlHmdQqN2E15D5l6ZDbtGVSkhVMatPiFHd80RNl33ON_ueoJqOdQ4mCarClsrNyf8oEHZZ4XA=s88-c-k-c0x00ffffff-no-rj',
               'originalurl'=>'https://www.youtube.com/watch?v=C6XQuegX-m0');

$four = array('file'=>'4.mp4',
              'poster'=>'4.mp4#t=2.5', 
              'vidname'=>'Our pork hub intro!', 
              'view'=>10000, 
              'like'=>4605, 
              'dislike'=>100, 
              'save'=>2006, 
              'authorname'=>'Jm7 official', 
              'authorimg'=>'jm7newlogo.png',
              'originalurl'=>'http://localhost:8080/porkhub/viewvideo.php?video=04');
$idarray = array('01'=> $one, '02'=> $two, '03'=> $three, '04'=> $four);
$_SESSION['array'] = $idarray[$id];
?>
