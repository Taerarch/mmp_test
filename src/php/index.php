<?php
    require "vendor/autoload.php";

    header("Access-Control-Allow-Origin: *"); //Not ideal I'm aware, opens it up way too wide

    // $states = array('QLD', 'NSW', 'NT', 'VIC', 'WA', 'SA', 'TAS'); //Used for test code


    function get_data($input, $accomm) {

      $client = new GuzzleHttp\Client([
          'headers' => ['User-Agent'=>'MyReader']
      ]);
      $API = '123456789101112'; // I know best practice would be to hide this API but I decided it was low priority as I intend on having this project as private.
      $lowInp = strtolower($input);

      $response = $client->request('GET', "https://atlas.atdw-online.com.au/api/atlas/{$lowInp}s?key={$API}{$accomm}");
      $output = array();

      // https://atlas.atdw-online.com.au/api/atlas/{$lowInp}s?key=123456789101112&cats=ACCOMM


      if ($input === 'Product') { //The locations needed to be seperate as they had different structure
        $input = 'product_record';
        if ($response -> getStatusCode() == 200) {
          $body = $response->getBody();

          $xml = new SimpleXMLElement($body);
          foreach($xml->products->$input as $Target) {
              array_push($output, $Target);
          }
        };
        return $output;

      } else {
        if ($response -> getStatusCode() == 200) {
          $body = $response->getBody();

          $xml = new SimpleXMLElement($body);
          foreach($xml->$input as $Target) {
              array_push($output, $Target);
          }
        };
        return $output;
      }


    }

    $states = get_data('State', '');
    $regions = get_data('Region', '');
    $areas = get_data('Area', '');
    $accomm = get_data('Product', '&cats=ACCOMM');

    $export = array();

    $export['st'] = $states;
    $export['reg'] = $regions;
    $export['ar'] = $areas;
    $export['accomm'] = $accomm;

    // array_push($export, $states);



    echo json_encode($export);
