<?php

class Position_model extends CI_Model
{
    function return_position()
    {
        $this->load->database();
        $query = $this->db->get('Position');
        $check_list =[];
        foreach($query->result() as $row)
        {
            $check_list[$row->ID] = $row->name;
        }
        return $check_list;
    }

    function return_positionlist()
    {
        $this->load->database();
        $query = $this->db->get('Position');
        return $query->result_array();
    }
    function create()
    {

        $data = array(
            'name' => $this->input->post('name')
         );
         return $this->db->insert('Position',$data);
    }
    function get_position($ID)
    {
        $this->db->where('ID', $ID);
        $query = $this->db->get('Position');
        return $query->row_array();
    }
    function edit_position($ID)
    {

        $this->load->model('position_model');
        $data = array(
            'name' => $this->input->post('name'),
        );
        $this->db->where('ID', $ID);
        return $this->db->update('Position', $data);

    }
    function delete_position($ID)
{

    $this->load->model('position_model');
    $this->db->where('ID', $ID);
    return $this->db->delete('Position');

}
}


?>
