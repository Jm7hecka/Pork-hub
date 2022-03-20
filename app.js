function menuappear(item){
    switch(item){
        case 'social':
            document.getElementById('social').style.display='block';
            document.getElementById('social').addEventListener('mouseenter', function(){
                document.getElementById('social').style.display='block';
            })
            document.getElementById('social').addEventListener('mouseleave', function(){
                setTimeout(function(){document.getElementById('social').style.display='none';}, 2000)
            })
    }
    
}
function menuopen(){
    document.getElementById('menupage').style.width='90%';
    document.body.style.overflow = 'hidden';
}
function menuclose(){
    document.getElementById('menupage').style.width='0%';
    document.body.style.overflow = 'auto';
}
