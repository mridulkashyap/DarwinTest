<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Employee extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // // Configure limits on our controller methods
        // // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function attendance_get()
    {
        // Check if the employee data store contains attendance (in case the database result returns NULL)
        $this->load->model('employee_model');
        $attendance = $this->employee_model->get_attendance();
        if ($attendance)
        {
            // Set the response and exit
            $this->response($attendance, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No attendance found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function attendance_post()
    {
        $this->load->model('employee_model');
        $new_attendance = $this->employee_model->post_attendance();
        $this->set_response($new_attendance, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

}
