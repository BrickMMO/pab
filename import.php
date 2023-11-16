<?php

include('includes/connect.php');
include('includes/config.php');
include('includes/functions.php');

// Original store JSON is available at:
// https://www.lego.com/api/graphql/StoresDirectory
// 
// Individual stores follow the URL format:
// https://www.lego.com/en-my/stores/store/bondi-junction

$url = 'import.json';
$stores = json_decode(file_get_contents($url), true);

// echo '<pre>';
// print_r($stores);
// echo '</pre>';

$query = 'TRUNCATE TABLE regions';
mysqli_query($connect, $query);

$query = 'TRUNCATE TABLE countries';
mysqli_query($connect, $query);

$query = 'TRUNCATE TABLE locations';
mysqli_query($connect, $query);

foreach($stores['storesDirectory'] as $key => $country)
{ 

    // Check to see if region exists
    // Insert query for region

    // Check to see if country exists
    // Insert query for country

    foreach($country['stores'] as $key => $store)
    {

        $url = 'https://www.lego.com/en-my/stores/store/'.$store['urlKey'];

        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        curl_close($curl);
     
        echo '<pre>';
        print_r($store);
        print_r(($response));
        echo '</pre>';

        // Insert query for store

        sleep(10);

        echo '<hr>';

        die();

    }

    die();

}