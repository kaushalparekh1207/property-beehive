<html>

<head>
    <title>Event Click LatLng</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/front/assets/css/map.css" />

    <script type="module" src="{{ url('/') }}/front/assets/js/index.js"></script>
</head>

<body>
    <div id="map"></div>

    <!--
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See http://maps.google.com/mapfiles/ms/micons/blue.png
      for more information.
      -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8s4KXzSqGnhEJdyKXIpiHCp-OWetO5aE&callback=initMap&v=weekly"
        defer></script>
</body>

</html>
