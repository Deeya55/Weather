<?php

// Connecting to the Database
$servername = "sql108.epizy.com";
$username = "epiz_34211819";
$password = "D3Gyrl9X6LzYMSn";
$db='epiz_34211819_deeyabastola';


// Create a connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "connection was successful!";
}

$api_key = "2c4794b819ef45030c24d05cc15edb4a";

$city_name = "Sefton";

$url= "https://api.openweathermap.org/data/2.5/weather?q=".urlencode($city_name)."&appid=".$api_key."&units=metric";

$response = file_get_contents($url);

$data = json_decode($response);

$sql = "INSERT INTO weather (temperature, humidity, pressure, wind_speed, weather_description)
        VALUES ('" . $data->main->temp . "','" . $data->main->humidity . "','" . $data->main->pressure . "','" . $data->wind->speed. "','" . $data->weather[0]->description. "')";

if (mysqli_query($conn, $sql)) {
    echo "  ";
} else {
    echo "" . mysqli_error($conn);
}

$sql = "SELECT * FROM weather";
$result = mysqli_query($conn, $sql);
$weather = array();
while ($row = mysqli_fetch_assoc($result)){
    $weather[] = $row;
}


foreach($weather as $data){

}
if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
      navigator.serviceWorker.register("./service-worker.js").then((registration) => {
        console.log("Service worker registered with scope: ", registration.scope);
      });
    });
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather app </title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

    <h3> Past Weathers  </h3 >
    <button> <a href="index.php">back</a></button>
    
    <section class="container">
        <?php $previous_date = null; // Variable to store the previous date ?>
    <?php foreach ($weather as $data): ?>
        <?php $current_date = date('l, F j, Y', strtotime($data['date'])); // Get the current date
        if ($current_date != $previous_date):?>
    <div class="card"> 
    
      <h2 class="date"><?php echo $current_date ?></h2>
      <p class="pressure">Pressure:<?php echo $data['pressure'] ?> hPa</p>
      <p class="pressure">Temperature:<?php echo $data['temperature'] ?> °C </p>
      <p class="humidity">Humidity:<?php echo $data['humidity'] ?>% </p>
      <p class="weather condition">Weather condition:<?php echo $data['weather_description'] ?> </p>
      <p class="wind speed">Wind speed:<?php echo $data['wind_speed'] ?>m/s</p>
      </div>
        </div>
        <?php endif; ?>
        <?php  $previous_date = $current_date; // Set the current date as the previous date for the next iteration ?>
        <?php endforeach; ?>
      </section>
    
</body>
</html>

