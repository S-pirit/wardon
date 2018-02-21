(function(){
    var preload=document.getElementById(@splash);
    var loading=0;
    var id= setInterval(frame, 64);
    

            loading=loading+1;
            if(loading == 90)
                {
                    splash.style.animation = "fadeout 1s ease";
                }
        
    }
    
    
})();