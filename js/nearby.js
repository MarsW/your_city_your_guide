
    // POI
    var points = [];
    // Start at the page load
    $(document).ready(function(){
        // getLocation();
        trackKeyDown();
        // keep doing
        setInterval(function(){ 
            check_nearby();
        },5000); // every 5 secs
    });

    // KeyDown =======================
    function trackKeyDown(){
        var body = document.querySelector('body');
        body.onkeydown = function (e) {
            console.log(e.keyCode);
            if (e.keyCode==49){      //101 
                $("#lat").val("25.0339031");
                $("#lon").val("121.5623212");
            }else if (e.keyCode==76){ //L 龍山寺 
                $("#lat").val("25.0371623");
                $("#lon").val("121.497712");
            }else if (e.keyCode==75){ //"K"aohsiung 大樹舊鐵橋
                $("#lat").val("22.6623093");
                $("#lon").val("120.4248003");
            }else if (e.keyCode==84){ //"T"aitung 史前博物館
                $("#lat").val("22.7604012");
                $("#lon").val("121.0889871");
            }else if (e.keyCode==89){ //"Y"ilan 烏石港
                $("#lat").val("24.8735015");
                $("#lon").val("121.8371593");
            }else if (e.keyCode==66){ //"B"igBen 大笨鐘
                $("#lat").val("51.5007292");
                $("#lon").val("-0.1268141");
            }
        };
    }
    function check_nearby(){
        if ($("#lat").val() && $("#lon").val()){
            // console.log("refresh");
            var nearby = [];
            min_distance = 999999999;
            for (var i = 0; i < points.length; i++) {
                var lat = points[i][1];
                var lng = points[i][2];
                distance = getDistanceFromLatLonInKm($("#lat").val(),$("#lon").val(),lat,lng);
                if (distance<min_distance){
                    min_distance = distance;
                    nearby = points[i];
                }
            }
            // console.log(nearby[0]);
            // html = "<b><a href='"+nearby[3]+"' target='_blank'>"+nearby[0]+"</b></a> 在附近 is nearby";// +"("+min_distance+" kms)";
            // $("#alert").html(html);
            if (min_distance<=1){
                html = "<h3><a href='"+nearby[3]+"' target='_blank'>"+nearby[0]+"</a>";
                if($("#lang").val()=="en"){
                    html += " is nearby </h3>";
                }else{
                    html += " 在附近 </h3>";
                }
                $("#alert").html(html);
            }else{
                $("#alert").html("");
            }

        }
    }

    // Distance =======================
    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1); 
        var a = 
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2)
            ; 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI/180)
    }

    // getLocation and show =======================
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        $("#lat").val(position.coords.latitude.toString());
        $("#lon").val(position.coords.longitude.toString());
    }

