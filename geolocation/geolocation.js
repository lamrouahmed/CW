if('geolocation' in navigator) {
    navigator.geolocation.getCurrentPosition(position => {
        const latitude = position.coords.latitude;
        const longtitude = position.coords.longitude;
        console.log(latitude, longtitude);
    })
} else {
    console.log("nah bro");
}