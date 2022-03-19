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