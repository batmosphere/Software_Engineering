
<?php
include('db.php');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($db,"select username from customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Taxi Hailing Application</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 125%;
        position: relative;
        top: -186px;
        z-index: 1;
        width: 100%;
        transition: margin-left .5s;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        border-radius: 8px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 35px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        position: relative;
        margin-left: 75px;
        margin-top: 93px;
        width: 350px; 
        text-align: center;
        display: block;
        border-radius: 8px;
        
      }

      #proceed
      { text-align: center;
        color: white;
        font-family: Roboto;
        font-size: 15px;
        font-weight: bolder;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        z-index: 200;
        width: 350px;
        text-decoration: none;
        margin-top: 35px;
        margin-left: 95px;
        position: relative;
        bottom: 60px;
        left: 830px;
        background-color: #2EC563;
        display: block;
        border-radius: 8px;
        transition: margin-left .5s;

      } 

/*      #cabs
      {
        display: none;
        z-index: 200;
        position: relative;
        left: 500px;
        top: -30px; 
        background-color: #fff;
        border: 1px solid black;
        border-radius: 8px;
        width: 350px;
        padding-left: 30px;

      }

      #cabs p
      { 
        position: relative;
        z-index: 200;
        margin-left: 40px;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 300;
        
        text-overflow: ellipsis;

        
        
      }

      #greenbutton, #redbutton
      {
        background-color: #2EC563;
        display: block;
        position: relative;
        z-index: 200;
        margin: 10px;
        float: left;
       border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 35px;
        outline: none;
        right: 15px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        width: 150px;
        text-decoration: none;
        margin-top: 30px;
        border-radius: 8px;
      }

      #redbutton
      {
        background-color: #ff8e8e;
        display: block;
        position: relative;
        z-index: 200;
        float: left;
        margin: 10px;
       border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 35px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        width: 150px;
        text-decoration: none;
        margin-top: 30px;
        border-radius: 8px;
      }*/

      #logoutbutton
      { text-decoration: none;
        color: white;
        background-color: #ff8e8e;
        display: block;
        position: relative;
        z-index: 200;
        float: left;
        margin: 0px;
       border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 35px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        width: 910px;
        text-decoration: none;
        margin-top: 30px;
        border-radius: 8px;
        font-weight: bolder;
      }


.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 300;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}




.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 300; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 70%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
    margin-left: 320px;
    margin-right: 100px;
    margin-top: 30px;
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #ffbf00;
    color: white;
}

.modal-body {padding: 2px 16px;
background-color: white;}

.modal-footer {
    padding: 2px 16px;
    background-color: #ffbf00;
    color: white;
}
    </style>
  </head>
  <body>  

   <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h2 style="color: white; float: left; font-size: 1.3em; margin-left: 30px; margin-top: 0px; margin-bottom: 20px; ">   <?php echo $login_session; ?>'s Dashboard</h2> 
      <a  id="myBtn1" onclick="document.getElementById('about').style.display='block'">About</a>
      <a  id="myBtn2" onclick="document.getElementById('team').style.display='block'">Team</a>
      <a  id="myBtn3" onclick="document.getElementById('logout').style.display='block'">Log out</a>
      <a  id="myBtn4" onclick="document.getElementById('help').style.display='block'">Help</a>
    </div>

    <span style="font-size:50px; cursor:pointer; z-index: 200; position: relative; margin-left: 15px; top: 12px;"  onclick="openNav()">&#9776;</span>


    <form method="post" action="cab_options.php">
    <input id="origin-input" class="controls" type="text" name="source" placeholder="Enter an origin location">
    <input id="destination-input" class="controls" type="text" name="destination" placeholder="Enter a destination location">
    <input  id="proceed" class="controls" value="Proceed" name="submit" type="submit">
    </form>




  <!--   <div id="cabs" >
      <p>Do you want to share the ride?</p>
      <button id="greenbutton" class="controls" onclick="">Yes</button>
      <button id="redbutton" class="controls" onclick="">No</button>
    </div> -->


  <div id="map"></div>





  
  

  <!-- The Modal -->
<div id="about" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>About</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
   <!--  <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
  </div>

</div>


  <!-- The Modal -->
                <div id="team" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close">&times;</span>
                      <h2>Team Members</h2>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the Modal Body</p>
                      <p>Some other text...</p>
                    </div>
                   <!--  <div class="modal-footer">
                      <h3>Modal Footer</h3>
                    </div> -->
                  </div>

                </div>


                  <!-- The Modal -->
<div id="logout" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Logout</h2>
    </div>
    <div class="modal-body">
      <p>If you want to logout, click this button, else click anywhere outside the box or the close button above.</p> 
      <form method="post" action="logout.php">
      <button id="logoutbutton"><a href="logout.php">Logout</button> 
      </form>

    </div>
    <!-- <div class="modal-footer">
      
    </div> -->
  </div>

</div>


      <!-- The Modal -->
          <div id="help" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Help</h2>
              </div>
              <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
              </div>
             <!--  <div class="modal-footer">
                <h3>Modal Footer</h3>
              </div> -->
            </div>

          </div>


          <div id="output" style="height: 100px; width: 100px; background-color: red"></div>
<script>

 var modal1 = document.getElementById('about');
 var modal2 = document.getElementById('team');
 var modal3 = document.getElementById('logout');
 var modal4 = document.getElementById('help');



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal1.style.display = "none";
    modal2.style.display = "none";
    modal3.style.display = "none";
    modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
    
}



      function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
           document.getElementById("map").style.marginLeft = "250px";
           document.getElementById("proceed").style.marginLeft = "250px";
          document.getElementById('map').backgroundColor = "rgba(0,0,0,0.4)";
          document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("map").style.marginLeft = "0px";
           document.getElementById("proceed").style.marginLeft = "95px";
          document.body.style.backgroundColor = "white";
          document.getElementById('map').backgroundColor = "rgba(0,0,0,0.4)";

        }
      



      function hideinput()
      {
        document.getElementById('origin-input').style.display ='none';
        document.getElementById('destination-input').style.display = 'none';
        document.getElementById('proceed').style.display = 'none';

        document.getElementById('cabs').style.display ='block';
        
      }
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var origin_location = null;
      var destination_location = null;



      
      var flag = 0;


      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 17.5450, lng: 78.5718},
          zoom: 12
        });
        new AutocompleteDirectionsHandler(map);
        // new distance(map);

      }


var rad = function(x) {
  return x * Math.PI / 180;
};

var getDistance = function(p1, p2, p3, p4) {
  var R = 6378137; // Earth’s mean radius in meter
  var dLat = rad(p3 - p1);
  var dLong = rad(p4 - p2);
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(p1)) * Math.cos(rad(p3)) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d; // returns the distance in meter
};
      /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        
        // console.log("flag = " + flag);
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        // var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
        // console.log(originAutocomplete.place_id + " hello");
        var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
        // console.log(destinationAutocomplete + " bye");
        // this.setupClickListener('changemode-walking', 'WALKING');
        // this.setupClickListener('changemode-transit', 'TRANSIT');
        // this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        // console.log(originInput + " hello");
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }


      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) 
      {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() 
        {
          var place = autocomplete.getPlace();
          //console.log(place.geometry.location + " hello");
                  if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    return;
                  }
                  if (mode === 'ORIG') {
                    me.originPlaceId = place.place_id;
                    
                  } else {
                    me.destinationPlaceId = place.place_id;
                    //flag = 1;
                  }
                  me.route();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            var flag = 0;
            var origin1_latitude = "";
            var origin2_latitude = "";
            var origin1_longitude = "";
            var origin2_longitude = "";
            var source_name = "";
            var destination_name = "";
            // map.fitBounds(place.geometry.viewport);
                              if (mode === 'ORIG') {
                              origin1_latitude += place.geometry.location.lat();
                              origin1_longitude+= place.geometry.location.lng();
                              source_name = place.name;

                              document.cookie = "source="+source_name;
                              console.log(origin1_latitude + origin1_longitude + " " + place.name);   
                              flag = 0;       // //outputs the coordinates and name of the source 
                            } else {
                              origin2_latitude += place.geometry.location.lat();
                              origin2_longitude += place.geometry.location.lng();
                              destination_name = place.name;

                              document.cookie = "destination="+destination_name;
                              console.log(origin2_latitude + origin2_longitude  +  " " + place.name);          //outputs the coordinates and name of the destination 

                              flag = 1;
                            }
                    if(flag)
                    {   
                          
                        var distance = parseInt(getDistance(origin1_latitude, origin1_longitude, origin2_latitude, origin2_longitude));
                        // console.log("the distance in int is " + distance);
                        distance = (8806500 - distance ) * 2.484 / 1000;    //FINAL DISTANCE
                        distance = distance.toFixed(1) + " km";
                        document.getElementById('output').innerHTML = distance;
                        // console.log("the distance is " + distance);
                        flag = -1;

                        document.cookie = "distance="+distance;                      
                        
                        
                    }
    }

            // console.log(place.geometry.location + " hello");
          else {
            // map.setCenter(place.geometry.location);
            // map.setZoom(17);  // Why 17? Because it looks good.
          }
          // marker.setPosition(place.geometry.location);
          // marker.setVisible(true);
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };


      // function distance(map)
      // { 

      //   var originInput = document.getElementById('origin-input');
      //   var destinationInput = document.getElementById('destination-input');

      //   var originAutocomplete = new google.maps.places.Autocomplete(
      //       originInput, {placeIdOnly: true});
      //   var destinationAutocomplete = new google.maps.places.Autocomplete(
      //       destinationInput, {placeIdOnly: true});


      //   var service = new google.maps.DistanceMatrixService;
      //   service.getDistanceMatrix({
      //     origins: [originAutocomplete],
      //     destinations: [destinationAutocomplete],
      //     travelMode: 'DRIVING',
      //     unitSystem: google.maps.UnitSystem.METRIC,
      //     avoidHighways: false,
      //     avoidTolls: false
      //   }, function(response, status) {
      //     if (status !== 'OK') {
      //       alert('Error was: ' + status);
      //     } else {
      //       var originList = response.originAddresses;
      //       var destinationList = response.destinationAddresses;
      //       var outputDiv = document.getElementById('output');
      //       outputDiv.innerHTML = '';

            
            
      //         for (var j = 0; j < results.length; j++) {
      //           // geocoder.geocode({'address': destinationList[j]},
      //           //     showGeocodedAddressOnMap(true));
      //           outputDiv.innerHTML +=  results[j].distance.text;
      //         }
            
      //     }
      //   });

      // }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCicI10bn3r8cfqsHS-ErWlNKtVsWLrXdk&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>