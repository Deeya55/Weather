<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="weather_header">
            <form class="weather_search" action="index2.php" method="POST" >
                <input type="text" placeholder="Search for a city..." id="weather_searchform">  
                <button type="submit">Search</button>
            </form> 
            
            <div class="weather_units">
            <div id="weatherB"></div>
            <!-- <img src="https://openweathermap.org/img/w/${data.weather[0].icon}.png" alt="Loading..." id="weatherimage">
            <br> -->
            <div id="weather_condition"></div>
            </div>
             
        </div>
        <div class="weather_body">
            <h1 id="weather_city"></h1>
            <div id="weather_datetime"></div>
            <div class="weather_datetime">
            </div>
            <div class="weather_forecast"></div>
            <div class="weather_icon">
            </div>
            <p class="weather_temperature">
            </p>
            <div class="weather_minmax">
                <p id="days"></p>
                <p id="date"></p>
            </div>
            
        </div>

        <div class="weather_info">
            <div class="weather_card">
                <div>
                    <img src="rain.png" alt="weather">
                    <p>Rain: </p>
                    <p id="weather_rain">18&#176</p>
                </div>
            </div>
            <div class="weather_card">
                <div>
                    <img src="humidity.png" alt="weather">
                    <p>Humidity: </p>
                    <p id="weather_humidity">18&#176</p>
                </div>
            </div>
            <div class="weather_card">
                <div>
                    <img src="wind.png" alt="weather">
                    <p>Wind: </p>
                    <p id="weather_wind">18&#176</p>
                </div>
            </div>
            <div class="weather_card">
                <div>
                    <img src="pressure.png" alt="weather">
                    <p>Pressure: </p>
                    <p id="weather_pressure">18&#176</p>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    
</body>
</html>

