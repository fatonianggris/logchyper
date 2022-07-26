<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Log extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('Logmodel');
        //$this->db->cache_on();
    }

    public function getlog_get() {

        $data = $this->Logmodel->get_all_log();

        if ($data) {            
            // Set the response and exit
            $this->output
                    ->set_status_header(REST_Controller::HTTP_OK)
                    ->set_header('Cache-Control: no-store, no-cache, must-revalidate')
                    ->set_header('Cache-Control: post-check=0, pre-check=0')
                    ->set_header('Pragma: no-cache')
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        } else {
            // Set the response and exit
            $this->set_response([
                'status' => FALSE,
                'message' => 'Server Error'
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }

}
