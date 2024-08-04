<?php

require 'vendor/autoload.php';

use HeroOpenWeather\WeatherClient;

$latitude = 35.6895; // Example: Latitude for Tokyo
$longitude = 139.6917; // Example: Longitude for Tokyo

$weatherClient = new WeatherClient();

try {
    $weatherData = $weatherClient->getWeather($latitude, $longitude);
    echo "Weather Data:\n";
    foreach ($weatherData['hourly']['time'] as $index => $time) {
        echo "Time: $time, Temperature: {$weatherData['hourly']['temperature_2m'][$index]}°C\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
