var player = document.getElementById('videoplay');
var video = document.getElementById('videoplayer');
var progressBar = document.getElementById('progress-bar');
player.addEventListener('timeupdate', timeplayed);
video.addEventListener('mouseenter', controlappear);
video.addEventListener('mousemove', controlappear);
video.addEventListener('mouseleave', controldisappear);
player.addEventListener('click', animatePlayback)
function formatTime(timeInSeconds) {
    const result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);
    return {
        minutes: result.substr(3, 2),
        seconds: result.substr(6, 2),
    };
}

function initializeVideo() {
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
    progressBar.setAttribute('max', videoDuration);
    player.setAttribute('onclick', 'playvideo()');
    playvideo();
}

function playvideo() {
    var element = document.getElementById('play');
    if(player.paused) {
        player.play();
        element.textContent = "\u23F8";
        document.getElementById('icon').src='playicon.png';
        document.getElementById('icon').style='transform:scale(0.1)';
        animatePlayback();
    }else {
        player.pause();
        element.textContent = "\u23F5";
        document.getElementById('icon').src='pauseicon.png';
        document.getElementById('icon').style='transform:scale(0.2)';
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
        volumebar.style.width='0px';
        volumebar.classList.remove('showthumb');
        volumebar.classList.add('hidethumb');
    }
}

function timeplayed() {
    var timeplayed = document.getElementById('timeplayed');
    const duration = Math.round(player.currentTime);
    const time = formatTime(duration);
    progressBar.value = player.currentTime;
    timeplayed.innerText = `${time.minutes}:${time.seconds}`;
    timeplayed.setAttribute('datetime', `${time.minutes}m ${time.seconds}s`);
}
function barappear(){
    if (player.muted) {

    }else {
        var volumebar = document.getElementById('volumebar');
        var volume = document.getElementById('volume');
        volumebar.style.width='100px';
        volumebar.classList.remove('hidethumb');
        volumebar.classList.add('showthumb');
    }
    
}
function bardisappear(){
    var volumebar = document.getElementById('volumebar');
    window.setTimeout(function(){volumebar.style.width='0px';
                                 volumebar.classList.remove('showthumb');
                                 volumebar.classList.add('hidethumb');}, 1000);
    
}
function fullscreen(){
    var video = document.getElementById('videoplayer');
    if (document.fullscreenElement) {
        document.exitFullscreen();
        normalscreen();
    } else if (document.webkitFullscreenElement) {
        document.webkitExitFullscreen();
        normalscreen();
    } else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen();
        updateFullscreen();
    } else {
        video.requestFullscreen(); 
        updateFullscreen();
    }
}
function updateFullscreen(){
    var video = document.getElementById('videoplayer');
    document.getElementById('videocontrol').style.width='100%';
    document.getElementById('progress').style.width='99%';
    document.getElementById('fullscreen').style.marginLeft='57%';
    document.getElementById('playback-animation').style.marginTop='-50px'
    document.getElementById('fullscreen').innerHTML='<span class="iconify" data-icon="mdi:fullscreen-exit" style="color: white;" data-width="31" data-height="31"></span>'
    controlappear();
}
function normalscreen() {
    document.getElementById('videocontrol').style.width='1000px';
    document.getElementById('progress').style.width='99%';
    document.getElementById('fullscreen').style.marginLeft= '38%';
    document.getElementById('playback-animation').style.marginTop='-150px'
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
    document.getElementById('sharediv').style.display='block';
    document.getElementById('shareurl').value = window.location.href;
}
function copyurl(){
    navigator.clipboard.writeText(document.getElementById('shareurl').value);
    document.getElementById('copied').innerText='Copied to clipboard'
    window.setTimeout(function() {document.getElementById('copied').innerText=''}, 5000)
}