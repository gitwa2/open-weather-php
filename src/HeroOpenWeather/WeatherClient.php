<?php

namespace HeroOpenWeather;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WeatherClient
{
    private $client;
    private $baseUrl = 'https://api.open-meteo.com/v1/forecast';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getWeather($latitude, $longitude)
    {
        try {
            $response = $this->client->request('GET', $this->baseUrl, [
                'query' => [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'hourly' => 'temperature_2m'
                ]
            ]);
            
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            throw new \Exception('Failed to fetch weather data: ' . $e->getMessage());
        }
    }
}
