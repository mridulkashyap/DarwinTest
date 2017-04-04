<?php

class Employee_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function get_attendance()
    {
        $total_attendance = $this->db->get('attendance');
        return $total_attendance->result_array();     
    }
    
    public function post_attendance(){
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'org_id' => $this->input->post('org_id'),
            'timestamp' => $this->input->post('timestamp'),
            'status' => $this->input->post('status')
        );
        $query = $this->db->insert('attendance', $data);
        $attendance_id = $this->db->insert_id();
        if($query){
            return $data;
        }
        else{
            return [
                    'status' => FALSE,
                    'message' => 'Attendance could not be saved'
            ];
        }
    }
}