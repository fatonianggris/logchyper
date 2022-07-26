<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class NuSoap_libs {

    function __construct() {
        require_once(dirname(__FILE__) . '/NuSOAP/lib/nusoap.php');
    }

}

?>