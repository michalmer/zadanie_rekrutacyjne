<?php

class User_model extends CI_Model
{
function return_users()
{
    $this->load->database();
    $query = $this->db->get('Employees');
    return $query->result_array();
}

function get_emails($email, $ID)
{
    $this->db->where('EMAIL',$email);
    $this->db->where('ID !=', $ID);
    $query = $this->db->get('Employees');
    return $query->row_array();
}

function create_user()
{
    $supervisor_id = $this->input->post('supervisor_id');
    if ($supervisor_id === '') {
        $supervisor_id = NULL;
    }

    $data = array(
        'FIRST_NAME' => $this->input->post('FIRST_NAME'),
        'LAST_NAME' => $this->input->post('LAST_NAME'),
        'PHONE_NUMBER' => $this->input->post('PHONE_NUMBER'),
        'EMAIL' => $this->input->post('EMAIL'),
        'POSITION_ID' => $this->input->post('POSITION_ID'),
        'supervisor_id' => $supervisor_id
    );

    return $this->db->insert('Employees',$data);
}

function edit_user($ID)
{
    $supervisor_id = $this->input->post('supervisor_id');
    if ($supervisor_id === '') {
        $supervisor_id = NULL;
    }
    $this->load->model('user_model');
    $data = array(
        'FIRST_NAME' => $this->input->post('FIRST_NAME'),
        'LAST_NAME' => $this->input->post('LAST_NAME'),
        'PHONE_NUMBER' => $this->input->post('PHONE_NUMBER'),
        'EMAIL' => $this->input->post('EMAIL'),
        'POSITION_ID' => $this->input->post('POSITION_ID'),
        'supervisor_id' => $supervisor_id
    );
    $this->db->where('ID', $ID);
    return $this->db->update('Employees', $data);

}
function get_user($ID)
{
    $this->db->where('ID', $ID);
    $query = $this->db->get('Employees');
    return $query->row_array();


}

function delete_user($ID)
{

    $this->load->model('user_model');
    $this->db->where('ID', $ID);
    return $this->db->delete('Employees');

}
function assign_supervisor($ID,$supervisor_id)
{
    $this->load->database();
    $data = array(
        'supervisor_id' => $supervisor_id
    );
    $this->db->where('id',$ID);
    return $this->db->update('Employees',$data);
}
function get_employees_hierarchy() {
    $this->load->database();
    $query = $this->db->query("
        SELECT e1.ID, e1.FIRST_NAME, e1.LAST_NAME, e1.supervisor_id
        FROM Employees e1
        ORDER BY e1.supervisor_id ASC, e1.ID ASC
    ");
    return $query->result_array();
}


}


?>