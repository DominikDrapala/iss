<?php

namespace controllers;

class Main
{

    public function index() {

        $model = new \models\IssLocation();
        include_once BASEPATH . '/app/views/index.php';

    }
}