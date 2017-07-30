    // Google Map =======================
    function myMap() {

        var mapProp= {
            center:new google.maps.LatLng(33.6056734,58.6980667),
            zoom:3,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        $.ajax({
            type: "GET",
            url: "get_scene_list.php?lang="+$("#lang").val(),
            dataType: "json",
            success: function(data){
                // console.log(data);
                points = data;
                for (var i = 0; i < points.length; i++) {
                    var infowindow = new google.maps.InfoWindow({
                        content: '<b>'+points[i][0]+'</b><br><a href="'+points[i][3]+'" target="_blank">Your Guide</a>'
                    });
                    var marker = new google.maps.Marker({
                        title : points[i][0],
                        position: {lat: points[i][1], lng: points[i][2]},
                        map: map,
                        zIndex: 12,
                        infowindow: infowindow
                    });
                    google.maps.event.addListener(marker, "click", function() {
                        this.infowindow.open(map, this);
                        // this.infowindow.close();
                    });
                }
            }
        });
    }