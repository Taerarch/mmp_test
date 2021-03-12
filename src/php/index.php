<?php
    require "vendor/autoload.php";

    header("Access-Control-Allow-Origin: *"); //Not ideal I'm aware, opens it up way too wide

    $states = array('QLD', 'NSW', 'NT', 'VIC', 'WA', 'SA', 'TAS');
    // print_r($states);
    $state_selection = 'NSW';


    function get_regions($inp_state) {

        $client = new GuzzleHttp\Client([
            'headers' => ['User-Agent'=>'MyReader']
        ]);

      // I wanted to keep reusing the same function for all the get requests but the changing structure of the xml files made it more trouble than it's worth.

            $API = '123456789101112'; // I know best practice would be to hide this API but I decided it was low priority as I intend on having this project as private.
            $response = $client->request('GET', "https://atlas.atdw-online.com.au/api/atlas/regions?key={$API}&st={$inp_state}");
            $output = array();
            if ($response -> getStatusCode() == 200) {
                $body = $response->getBody();
                $xml = new SimpleXMLElement($body);

                foreach($xml->Region as $Region) {

                    array_push($output, $Region->Name . "\n");
                }
            }
            // print_r($output);
            return $output;
    }
$regions = get_regions($state_selection);

$JSON = json_encode($states);

echo $JSON;
// echo json_encode($regions);

    // function get_areas($inp_area) {
    //
    //     $client = new GuzzleHttp\Client([
    //         'headers' => ['User-Agent'=>'MyReader']
    //     ]);
    //
    //         $API = '123456789101112';
    //         $response = $client->request('GET', "https://atlas.atdw-online.com.au/api/atlas/products?key={$API}&ar={$inp_area}");
    //         $output = array();
    //         if ($response -> getStatusCode() == 200) {
    //             $body = $response->getBody();
    //             $xml = new SimpleXMLElement($body);
    //
    //             foreach($xml->products->product_record as $product_record) {
    //                 array_push($output, $product_record->product_name . "\n");
    //             }
    //         }
    //         // print_r($output);
    //         return $output;
    // }
    //
    //
    // print_r(get_areas('Darwin Area'));
