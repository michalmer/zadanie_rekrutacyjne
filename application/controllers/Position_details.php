<?php

class Position_details extends CI_Controller
{
    function index()
    {
        $this->load->model('Position_model');
        $data['PositionArray'] = $this->Position_model->return_positionlist();
        $this->load->view('position_view',$data);
    }
    function create()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Position name','required');
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('create_position');
        }
        else
        {
            $this->load->model('Position_model');
            $this->Position_model->create();
            redirect('Position_details');

        }
    }
    function edit($ID)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Position name','required');
        $this->load->model('Position_model');
        $data['Position'] = $this->Position_model->get_position($ID);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('edit_position', $data);
        } 
        else 
        {
            $this->Position_model->edit_position($ID);
            redirect('Position_details');
        }
    }
    function delete($ID)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Position_model');
        $data['Position'] = $this->Position_model->get_position($ID);
        $this->Position_model->delete_position($ID);
        redirect('Position_details');

    }

}



?>