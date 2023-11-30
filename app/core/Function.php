<?php

function url($endpoint = '') {
    return BASEURL. $endpoint;
}

function redirect($url) {
    header("location: $url");
}