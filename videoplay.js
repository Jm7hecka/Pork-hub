var player = document.getElementById('videoplay');
var video = document.getElementById('videoplayer');

if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    var progressBar = document.getElementById('progress-barphone');
    document.getElementById('phoneplay').textContent = "\u25B7";
    progressBar.addEventListener('input', changetime);
    player.addEventListener('timeupdate', timeplayed);
    player.addEventListener('ended', ended);
    window.addEventListener('keypress', shortcut);
    var duration = document.getElementById('duration1');
    var fullscreenicon= document.getElementById('fullscreen1');
    var timeplayed = document.getElementById('timeplayed1');
    
} else{
    var progressBar = document.getElementById('progress-bar');
    progressBar.addEventListener('input', changetime);
    player.addEventListener('timeupdate', timeplayed);
    video.addEventListener('mouseenter', controlappear);
    video.addEventListener('mousemove', controlappear);
    video.addEventListener('mouseleave', controldisappear);
    player.addEventListener('click', animatePlayback);
    player.addEventListener('ended', ended);
    window.addEventListener('keypress', shortcut);
    var duration = document.getElementById('duration');
    var timeplayed = document.getElementById('timeplayed');
    var fullscreenicon= document.getElementById('fullscreen');
}


function shortcut(event) {
    var event = window.event;
    event.preventDefault();
    switch (event.key) {
        case ' ':
            if (player.setAttribute('onclick', 'playvideo()')){
                playvideo();
            } else {
                initializeVideo();
            };
        case 'ArrowLeft':
            player.currentTime = player.currenttime - 5.0 ;
        case 'ArrowRight':
            player.currentTime = player.currenttime + 5.0 ;
        case 'f':
            fullscreen();
        case 'Escape':
            normalscreen();
    }
}

function formatTime(timeInSeconds) {
    const result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);
    return {
        minutes: result.substr(3, 2),
        seconds: result.substr(6, 2),
    };
}

function initializeVideo() {
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        document.getElementById('lds-spinner').style.display='none';
        document.getElementById('phoneplay').textContent = "\u25B7";
        controlappearphone()
        const videoDuration = Math.round(player.duration);
        const time = formatTime(videoDuration);
        duration.innerText = `${time.minutes}:${time.seconds}`;
        duration.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`);
        progressBar.setAttribute('max', player.duration);
        player.setAttribute('onclick', 'controlappearphone()');
    } else{
        document.getElementById('lds-spinner').style.display='none';
        document.getElementById('playback-animation').style.opacity='0'
        document.getElementById('progress-bar').style.display='block';
        document.getElementById('icon').classList.remove('animationimg')
        document.getElementById('volumebar').value = 1;
        document.getElementById('volumebar').style.background=' rgb(255,154,0)';
        document.getElementById('videocontrol').style.display='flex'; 
        document.getElementById('progress-bar').style.display='block';
        const videoDuration = Math.round(player.duration);
        const time = formatTime(videoDuration);
        duration.innerText = `${time.minutes}:${time.seconds}`;
        duration.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`);
        progressBar.setAttribute('max', player.duration);
        player.setAttribute('onclick', 'playvideo()');
        controlappear()
    }
}
function loading() {
    document.getElementById('lds-spinner').style.display='block';
}
function playvideo() {
    var element = document.getElementById('play');
    if(player.paused) {
        document.getElementById('phoneplay').innerHTML='<div class="pausebtn"><i class="playicon"></i> <i class="playicon"></i></div>';
        player.play();
        element.textContent = "\u23F8";
        element.setAttribute('title', 'Pause');
        document.getElementById('icon').src='playicon.png';
        document.getElementById('icon').classList.add('playiconanimate');
        document.getElementById('icon').classList.remove('pauseiconanimate');
        

    }else {
        player.pause();
        document.getElementById('phoneplay').textContent = "\u25B7";
        element.textContent = "\u23F5";
        element.setAttribute('title', 'Play');
        document.getElementById('icon').src='pauseicon.png';
        document.getElementById('icon').classList.add('pauseiconanimate');
        document.getElementById('icon').classList.remove('playiconanimate');
        animatePlayback();
    
    }
}

function changevolume() {
    player.volume = document.getElementById('volumebar').value;
    if (player.volume > 0.5){
        document.getElementById('mute').innerHTML='<i class="fa fa-volume-up"></i>';
    }else if (player.volume < 0.6 && player.volume >0) {
        document.getElementById('mute').innerHTML='<i class="fa fa-volume-down"></i>';
    }else {
        document.getElementById('mute').innerHTML='<i class="fas fa-volume-mute"></i>';
    }
    var value =  document.getElementById('volumebar').value * 100 + '%';
    document.getElementById('volumebar').style.background='linear-gradient(to right,  rgb(255,154,0) ' + value + ', rgb(27,27,27) '+ value +',  rgb(27,27,27) 100% )';
}

function mute(){
    var volumebar = document.getElementById('volumebar');
    if (player.muted) { 
        player.muted = false;
        document.getElementById('volumebar').value = 1;
        document.getElementById('mute').innerHTML='<i class="fa fa-volume-up"></i>';
        document.getElementById('volumebar').style.background=' rgb(255,154,0)'
    } else {
        player.muted = true;
        document.getElementById('volumebar').value = 0;
        document.getElementById('mute').innerHTML='<i class="fas fa-volume-mute"></i>';
        document.getElementById('mute').setAttribute('title', 'Unmute');
        volumebar.style.width='0px';
        volumebar.classList.remove('showthumb');
        volumebar.classList.add('hidethumb');
    }
}

function timeplayed() {
    const duration = Math.round(player.currentTime);
    const time = formatTime(duration);
    progressBar.value = player.currentTime;
    timeplayed.innerText = `${time.minutes}:${time.seconds}`;
    timeplayed.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`);
    var playvalue = (progressBar.value/player.duration)*100 +'%'; 
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        progressBar.style.background=`linear-gradient(to right,  rgb(255,255,255) ${playvalue}, rgb(204, 204, 204) ${playvalue},  rgb(204, 204, 204) 100%)`;
    }else{
         progressBar.style.background=`linear-gradient(to right,  rgb(255,154,0) ${playvalue}, rgb(27,27,27) ${playvalue},  rgb(27,27,27) 100%)`;
    }
    
    
}
function barappear(){
    var volume = document.getElementById('volume');
    if (player.muted) {

    }else {
        var volumebar = document.getElementById('volumebar');
        var volume = document.getElementById('volume');
        volumebar.style.width='100px';
        volumebar.classList.remove('hidethumb');
        volumebar.classList.add('showthumb');
        volume.addEventListener('mouseenter', barappear);
        volume.addEventListener('mouseleave', bardisappear);
    }
    
}
function bardisappear(){
    var volumebar = document.getElementById('volumebar');
    window.setTimeout(function() { 
        volumebar.style.width='0px';
        volumebar.classList.remove('showthumb');
        volumebar.classList.add('hidethumb');  
    }, 1000)

}
function fullscreen(){
    var video = document.getElementById('videoplayer');
    if (document.fullscreenElement) {
        document.exitFullscreen();
        normalscreen();
    } else if (document.webkitFullscreenElement) {
        document.webkitExitFullscreen();
        normalscreen();
    } else if (player.webkitEnterFullscreen ) {
        player.webkitEnterFullscreen() ;
        updateFullscreen();
    } else if(video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen()
        updateFullscreen();
    } else {
        if(video.enterFullscreen){
            video.enterFullscreen();
        }else{
            video.requestFullscreen();
        }
        updateFullscreen();
    }
}
function updateFullscreen(){
    var video = document.getElementById('videoplayer');
    document.getElementById('videocontrol').style.width='100%';
    document.getElementById('progress').style.width='99%';
    fullscreenicon.style.marginLeft='57%';
    document.getElementById('playback-animation').style.marginTop='350px'
    document.getElementById('fullscreen').innerHTML='<span class="iconify" data-icon="mdi:fullscreen-exit" style="color: white;" data-width="31" data-height="31"></span>';
    document.getElementById('fullscreen').setAttribute('title', 'Exit full screen')
    controlappear();
}
function normalscreen() {
    document.getElementById('videocontrol').style.width='1000px';
    document.getElementById('progress').style.width='99%';
    fullscreenicon.style.marginLeft= '38%';
    document.getElementById('playback-animation').style.marginTop='220px'
    document.getElementById('fullscreen').innerHTML='<i class="material-icons" id="fullicon">&#xe5d0;</i>';
}
function controlappear(){
    document.getElementById('videocontrol').style.zIndex='0';
    document.getElementById('videocontrol').style.marginTop='-40px';
    document.getElementById('progress').style.marginTop='-45px';
    document.getElementById('videocontrol').addEventListener('mouseenter', controlappear);
    document.getElementById('videocontrol').addEventListener('mouseleave', function() {window.setTimeout(controldisappear(), 3000);} )
    
}
function controldisappear(){
    setTimeout(function() {
        document.getElementById('videocontrol').style.zIndex='-1';
        document.getElementById('videocontrol').style.marginTop='10px';
        document.getElementById('progress').style.marginTop='10px';}, 3000);
    
}
var bar = document.getElementById('videocontrolphone');
var playbutton = document.getElementById('phoneplay');
function controlappearphone() {
    bar.style.top='85%';
    player.style.opacity='0.4';
    if(playbutton.style.display='block'){
        playbutton.style.opacity='1';
    };
    player.setAttribute('onclick', 'controldisappearphone()');
}
function controldisappearphone() {
    bar.style.top='100%';
    player.style.opacity='1';
    if(playbutton.style.opacity='0'){
        playbutton.style.display='none';
    };
    player.setAttribute('onclick', 'controlappearphone()');
}
var playbackAnimation = document.getElementById('playback-animation');
function animatePlayback() {
    playbackAnimation.animate([
      {
        opacity: 1,
        transform: "scale(1)",
      },
      {
        opacity: 0,
        transform: "scale(1.3)",
      }], {
      duration: 200,
    });
}
function respobtn1(){
    document.getElementById('thumbup').style.color='rgb(95, 170, 1)'
    if (document.getElementById('thumbdown').style.color == 'rgb(199, 29, 29)'){
        document.getElementById('thumbdown').style.color ='rgb(202, 202, 202)'
    }
}
function respobtn2(){
    document.getElementById('thumbdown').style.color='rgb(199, 29, 29)'
    if (document.getElementById('thumbup').style.color == 'rgb(95, 170, 1)'){
        document.getElementById('thumbup').style.color ='rgb(202, 202, 202)'
    }
}
function respobtn3(){
    if(document.getElementById('heart').style.color=='rgb(199, 29, 29)'){
        document.getElementById('heart').style.color='rgb(202, 202, 202)';
    }else  {
        document.getElementById('heart').style.color='rgb(199, 29, 29)'
    }
    
}
function sharebtn(){
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        document.getElementById('sharedivphone').style.display='block';
        document.getElementById('shareurl').value = window.location.href;
    }else{
        document.getElementById('sharediv').style.display='block';
        document.getElementById('shareurl').value = window.location.href;
    }
}
function copyurl(){
    navigator.clipboard.writeText(document.getElementById('shareurl').value);
    document.getElementById('copied').innerText='Copied to clipboard'
    window.setTimeout(function() {document.getElementById('copied').innerText=''}, 5000)
}
function changetime() {
    var value = progressBar.value;
    player.currentTime = value; 
    var playvalue = (progressBar.value/player.duration)*100 +'%'; 
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        progressBar.style.background=`linear-gradient(to right,  rgb(255,255,255) ${playvalue}, rgb(204, 204, 204) ${playvalue},  rgb(204, 204, 204) 100%)`;
    }else{
        progressBar.style.background=`linear-gradient(to right,  rgb(255,154,0) ${playvalue}, rgb(27,27,27) ${playvalue},  rgb(27,27,27) 100%)`;
    }
}
function ended() {
    var element = document.getElementById('play');
    element.innerHTML='<span class="iconify , replay" data-icon="mdi:replay" data-flip="horizontal"></span>'
}
document.getElementById('progress').addEventListener('mouseenter', progressthumb);
function progressthumb() {
    progressBar.classList.add('progressthumb');
    progressBar.classList.remove('progresshide');
    document.getElementById('progress').addEventListener('mouseleave', function(){
        progressBar.classList.add('progresshide');
        progressBar.classList.remove('progressthumb');
    });
}
function closesharediv(){
    document.getElementById('sharedivphone').style.display='none';
}
