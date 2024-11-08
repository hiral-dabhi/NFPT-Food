if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Use the Google Maps Geocoding API to reverse-geocode the coordinates
        var geocodeUrl =
            `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key={{ env('GOOGLE_MAP_API') }}`;

        axios.get(geocodeUrl)
            .then(response => {
                // Check if the response contains any results
                if (response.data && response.data.results && response.data.results.length > 0) {
                    // Get the formatted address from the response
                    var address = response.data.results[0].formatted_address;

                    // Send the latitude, longitude, and address to the backend to store in the session
                    axios.post('/store-location-session', {
                        latitude: latitude,
                        longitude: longitude,
                        address: address
                    }).then(response => {
                        console.log(response.data);
                    }).catch(error => {
                        console.log('Error sending location to backend:', error);
                    });
                } else {
                    console.log('No results found from Geocoding API');
                }
            })
            .catch(error => {
                console.log('Error getting address from Geocode API:', error);
            });

    }, function(error) {
        console.log('Error getting location: ' + error.message);
    });
} else {
    console.log('Geolocation is not supported by this browser.');
}