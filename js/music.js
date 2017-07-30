    
    function loadmusic(music_url){
        document.getElementById('music_source').src = music_url;
        document.getElementById('music_block').style.display = "block";
        var audio = document.getElementById('music');
        var source = document.getElementById('audioSource');
        audio.load(); //preload without playing
        audio.play(); //play right away
    }
    