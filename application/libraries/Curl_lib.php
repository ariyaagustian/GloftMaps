<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__ . '/curl/curl.php';
class Curl_lib extends Curl {
  public function __construct()
  {
    parent::__construct();
  }
  
}
