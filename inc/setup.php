<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once(__DIR__.'/functions.php');
include_once(__DIR__.'/database.php');





include_once(__DIR__.'/HTMX.php');
HTMX::get_api_routes();

include_once(__DIR__.'/Router.php');
Router::get_pages();