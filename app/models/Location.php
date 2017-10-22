<?php

namespace models;

class Location {

    protected $lat = false;
    protected $lng = false;

    public function getLat() {
        return $this->lat;
    }

    public function getLng() {
        return $this->lng;
    }

}