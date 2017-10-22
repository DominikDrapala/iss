<?php

namespace models;

class IssLocation extends Location
{

    private $apiUrl = 'https://api.wheretheiss.at/v1/satellites/25544';
    private $country = false;
    private $area = false;
    private $msg = false;

    public function __construct()
    {

        $issQuery = new \core\ApiQuery($this->apiUrl);
        $issQuery->sendRequest();
        $iss = $issQuery->getJson();

        $this->lat = (string)$iss->latitude;
        $this->lng = (string)$iss->longitude;

        $api_key = 'AIzaSyCpEXVuGJ7CchsKIRIRD0iDmY1opukTZAw';
        $geocoding_api_url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $this->lat . ',' . $this->lng . '&key=' . $api_key;

        $geocodingQuery = new \core\ApiQuery($geocoding_api_url);
        $geocodingQuery->sendRequest();
        $json = $geocodingQuery->getJson();

        $this->parseResults($json->results);
        $this->prepareMsg();

    }

    private function parseResults($results)
    {

        if (!empty($results)) {

            $ac = $results[0]->address_components;

            foreach ($ac as $component) {

                foreach ($component->types as $type) {

                    if ($type === 'country') {

                        $this->country = $component->long_name;
                    } else if ($type === 'administrative_area_level_1') {

                        $this->area = $component->long_name;
                    }
                }
            }
        }
    }

    private function prepareMsg()
    {

        $msg = 'Geolocation data for the current ISS location are not available. This means the ISS is currently over the middle of nowhere :)';

        if ($this->country) {

            $msg = 'Currently ISS is over ';

            if ($this->area) {
                $msg .= $this->area . ', ';
            }

            $msg .= $this->country . '.';
        }

        $this->msg = $msg;
    }

    public function getMsg()
    {

        return $this->msg;
    }
}