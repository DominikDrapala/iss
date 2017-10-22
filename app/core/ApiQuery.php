<?php

namespace core;

class ApiQuery {

    private $url = false;
    private $response = false;

    public function __construct($url)
    {

        $this->url = $url;
    }

    /**
     * Sends request to defined API url.
     *
     * @return bool
     */
    public function sendRequest() {
        $response = file_get_contents($this->url);

        if ($response) {

            $this->response = $response;
            return true;
        } else {

            return false;
        }
    }

    /**
     * Returns API response encoded into JSON format.
     *
     * @return bool|object
     */
    public function getJson() {

        $output = false;

        if ($this->response) {

            $json = json_decode($this->response);

            if (is_object($json) || is_array($json)) {

                $output = $json;
            }
        }

        return $output;
    }

}