<?
ob_start();

header("Pragma: no-cache"); 
Header("Cache-control: private, no-store, no-cache, must-revalidate");  
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>

<html>

<head>
  <title>Google címkereső</title>
  <meta name="cache-control" content="private, no-store, no-cache, must-revalidate" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=hu&region=HU"></script>

  <script>

    var geocoder;
    var map;
  
    function alaphelyzet() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(47.055154, 19.500732);
      var myOptions = {
        zoom: 7,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      map = new google.maps.Map(document.getElementById("terkep"), myOptions);
    }

    function cim_kereses() {
      var address = document.getElementById("cim").value;
      if (map.zoom<15) {
        map.setZoom(15);
      }
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
        }
        else {
          alert("A helymeghatározás sikertelen volt. A hiba oka: " + status);
        }
      });
    }

  </script>

</head>

<body onload="alaphelyzet()">

  <br><br><br>

  <table width="700" align="center" style="background:#edf4fa">

    <tr height="100">
      <td align="center" style="padding:20px">
        <font style="font-size:30px; color:navy; font-family:helvetica"><b>Google címkereső</b></font>
      </td>
    </tr>

    <tr>
      <td valign="top" align="center" style="padding:20px">
      
        <input id="cim" value="" style="width:400px">
        &nbsp;&nbsp;
        <input type="button" value="Keresés" onclick="cim_kereses()">

        <br><br><br>

        <div id="terkep" style="width: 700px; height: 480px"></div>

        <br>

      </td>
    </tr>

</body>

</html>