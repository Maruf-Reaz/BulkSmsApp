<?php
// Simple page redirect
function redirect($location) {
    header('location: ' . URLROOT . '/' . $location);
}

// Return Json result
function jsonResult($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Use this constant for validating post request. ex- if(POST){ //do something }
define('POST', $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);