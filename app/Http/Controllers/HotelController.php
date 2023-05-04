<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    function getRateHawkHotels($destination_id, $check_in, $check_out, $currency, $apiKey, $apiSecret)
    {
        // Set up the API endpoint URL
        $endpoint = "https://api.emergingtravel.com/hotels";

        // Set up the request headers
        $headers = array(
            "Authorization" => "Bearer $apiKey:$apiSecret",
            "Content-Type" => "application/json"
        );

        // Set up the request parameters
        $params = array(
            "destination_id" => $destination_id,
            "check_in" => $check_in,
            "check_out" => $check_out,
            "currency" => $currency
        );

        // Send the API request using Laravel's HTTP client
        $response = Http::withHeaders($headers)->get($endpoint, $params);

        // Parse the JSON response
        $data = $response->json();

        // Handle the API response data
        if (isset($data["hotels"])) {
            foreach ($data["hotels"] as $hotel) {
                echo $hotel["name"] . "\n";
            }
        } else {
            echo "API response error: " . $data["error"]["message"] . "\n";
        }
    }
}