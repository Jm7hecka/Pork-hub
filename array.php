<?php
session_start();    
if(isset($_GET['video'])){
    $id = $_GET['video'];   
}
$empty = array('file'=>'',
              'poster'=>'', 
              'vidname'=>'', 
              'view'=> '', 
              'like'=>'' , 
              'dislike'=>'' , 
              'save'=>'' , 
              'date'=> date_create(''),
              'authorname'=>'', 
              'authorimg'=>'',
              'originalurl'=>'');

$one = array('file'=>'./video/1.mp4',
             'poster'=>'./video/1.mp4#t=10',
             'vidname'=>'Peppa Pig is playing with her family!', 
             'view'=>69, 
             'like'=>48, 
             'dislike'=>0, 
             'save'=>10, 
             'date'=> date_create('2022-03-13'),
             'authorname'=>'PeppaPigFreeTVCartoons', 
             'authorimg'=>'https://yt3.ggpht.com/ytc/AKedOLREN1pLcplbkzE2HU3h8lZAx_iAwoMhHjLq_p4H=s88-c-k-c0x00ffffff-no-rj',
             'originalurl'=>'https://www.youtube.com/watch?v=mA1UxREUs5c');

$two = array('file'=>'./video/2.mp4', 
             'poster'=>'./video/2.mp4#t=5', 
             'vidname'=>'Long pork makes her satisfying!', 
             'view'=>84, 
             'like'=>50, 
             'dislike'=>10,
             'save'=>20, 
             'date'=> date_create('2022-03-13'),
             'authorname'=>'RA Maxwell',
             'authorimg'=>'https://yt3.ggpht.com/ytc/AKedOLTqrAiM8eD6IL7MpZGwcx9RHQ9YrNj0tzwWW1Yc=s88-c-k-c0x00ffffff-no-rj',
             'originalurl'=>'https://www.youtube.com/watch?v=L7lHdaKJC8A');

$three = array('file'=>'./video/3.mp4', 
               'poster'=>'./video/3.mp4#t=5', 
               'vidname'=>'Hot pan wants to fill up by oil', 
               'view'=>1503, 
               'like'=>400, 
               'dislike'=>90, 
               'save'=>205, 
               'date'=> date_create('2022-03-13'),
               'authorname'=>'Tammicia Rochelle',
               'authorimg'=>'https://yt3.ggpht.com/YKlHmdQqN2E15D5l6ZDbtGVSkhVMatPiFHd80RNl33ON_ueoJqOdQ4mCarClsrNyf8oEHZZ4XA=s88-c-k-c0x00ffffff-no-rj',
               'originalurl'=>'https://www.youtube.com/watch?v=C6XQuegX-m0');

$four = array('file'=>'./video/4.mp4',
              'poster'=>'./video/4.mp4#t=2.5', 
              'vidname'=>'Our pork hub intro!', 
              'view'=>10000, 
              'like'=>4605, 
              'dislike'=>100, 
              'save'=>2006, 
              'date'=> date_create('2022-03-13'),
              'authorname'=>'Jm7 official', 
              'authorimg'=>'jm7newlogo.png',
              'originalurl'=>'http://localhost:8080/porkhub/viewvideo.php?video=04');

$five = array('file'=>'./video/5.mp4',
              'poster'=>'./video/5.mp4#t=24', 
              'vidname'=>'Fat pork is attracted by hot pot!', 
              'view'=> '589', 
              'like'=>'132' , 
              'dislike'=>'89' , 
              'save'=>'64' , 
              'date'=> date_create('2022-03-15'),
              'authorname'=>'li sun', 
              'authorimg'=>'https://yt3.ggpht.com/48uvMpwYcLKZOI_PRRNkI6GTEwkZHzWPpGkp3R-OpcW_g_qfqB6jOi_ZRc3hj6SFIaDDGs4zyR0=s88-c-k-c0x00ffffff-no-rj',
              'originalurl'=>'https://www.youtube.com/watch?v=UpKJuGQ9c0U');
$idarray = array('01'=> $one, '02'=> $two, '03'=> $three, '04'=> $four, '05'=>$five);
if(isset($id)){
    $_SESSION['array'] = $idarray[$id];
}
$_SESSION['idarray'] = $idarray;
?>
