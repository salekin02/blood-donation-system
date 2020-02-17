<html>
    <head>
        <title>Google Map</title>
        <style>
          #map {

            height: 400px;
            width: 100%;
          }
          }
        </style>
    </head>
    <body>

        <script type="text/javascript">
        var map;

        function initMap() {
            var latitude = 23.756232735889714;
            var longitude = 90.41991378999683;

            var myLatLng = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 14,
              disableDoubleClickZoom: true,
            });

            google.maps.event.addListener(map,'click',function(event) {
                document.getElementById('latclicked').value = event.latLng.lat();
                document.getElementById('longclicked').value =  event.latLng.lng();
            });

            google.maps.event.addListener(map,'mousemove',function(event) {
                document.getElementById('latmoved').value = event.latLng.lat();
                document.getElementById('longmoved').value = event.latLng.lng();
            });

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,

              title: latitude + ', ' + longitude
            });


            marker.addListener('click', function(event) {
              document.getElementById('latclicked').innerHTML = event.latLng.lat();
              document.getElementById('longclicked').innerHTML =  event.latLng.lng();
            });


            google.maps.event.addListener(map,'dblclick',function(event) {
                var marker = new google.maps.Marker({
                  position: event.latLng,
                  map: map,
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });

                marker.addListener('click', function() {
                  document.getElementById('latclicked').innerHTML = event.latLng.lat();
                  document.getElementById('longclicked').innerHTML =  event.latLng.lng();
                });
            });


        }
        </script>
        <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGKxpbDZt-KFF6DRvJtqGC2saTW8x9cyc&callback=initMap"
        async defer></script>

          <p align="center"style="color:black;font-size:22px;"><b>Please Select and Submit Your Current Position on Map:</b></p>
            <table align="right">
            	<br>
              <form  align="center"class="mp" action="" method="post">
<p align="center">
              <input align="right"id="latclicked" type="number" name="latitude" step="any"
                placeholder="Latitude" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;">

              <input id="longclicked" type="number" name="longitude" step="any"
                placeholder="Longitude" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;">

                <input name="sub" type="submit" value="Submit" style="background-color:#1797DB;font-size:18px;" />
            		<input type="reset" value="Reset" style="background-color:#ff0000;color:white;font-size:18px;" />
</p>
                <div id="latmoved" type="text" name="latm"></div>
                <div id="longmoved" type="text" name="lngm"></div>
              </form>
            </table>


            <div style="width:100%;">
                <div id="map"></div>
            </div>

    </body>
</html>
