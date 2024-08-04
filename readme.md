
# Hero Open Weather PHP

A simple PHP package to fetch weather data using latitude and longitude.

## Installation

You can install this package via Composer:

```sh
composer require gitwa2/hero-open-weather-php
```

## Usage

### Importing the Package

To use the `hero-open-weather-php` package in your project, you need to include the Composer autoloader.

```php
require 'vendor/autoload.php';

use HeroOpenWeather\WeatherClient;
```

### Fetching Weather Data

You can fetch the weather data by providing the latitude and longitude.

```php
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
```

### Example Response

Here's an example of the response data you might receive:

```json
{
    "latitude": 35.6895,
    "longitude": 139.6917,
    "generationtime_ms": 1.5,
    "utc_offset_seconds": 0,
    "timezone": "UTC",
    "hourly_units": {
        "time": "iso8601",
        "temperature_2m": "°C"
    },
    "hourly": {
        "time": [
            "2024-08-04T00:00:00Z",
            "2024-08-04T01:00:00Z",
            "2024-08-04T02:00:00Z"
            // more timestamps
        ],
        "temperature_2m": [
            25.3,
            24.8,
            24.1
            // more temperatures
        ]
    }
}
```

## Author

Milad Davoodabadi (milad.davoodabadi@outlook.com)

## License

This project is licensed under the ISC License.
