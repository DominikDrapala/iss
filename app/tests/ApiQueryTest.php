<?php

namespace tests;

use core\ApiQuery;

class ApiQueryTest {

    public function testCanGetDataFromApi() {

        $query = new ApiQuery('https://api.wheretheiss.at/v1/satellites');

        $query->sendRequest();
        $json = $query->getJson();

        return assert('$json[0]->name', 'iss');

    }
}