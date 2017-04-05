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

    public function getOrgIdFromApiKey($key)
    {
        $query1 = $this->db->get_where('keys', array('key' => $key));
        $row1 = $query1->row();
        //var_dump($key, $row1);
        if(isset($row1)){
            $query2 = $this->db->get_where('organisations', array('api_key_id' => $row1->id));
            $row2 = $query2->row();
            if(isset($row2)){
                return $row2->Id;
            }
        }
        // $query = $this->db->query("CALL usp_get_OrgIdFromApiKey('$key')");
        // $row = $query->row();
        // if(isset($row)){
        //     return $row->id;
        // }
    }
    
    public function post_attendance($org_id){
        $data = array(
            'emp_id' => $this->input->post('emp_id'),
            'org_id' => $org_id,
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