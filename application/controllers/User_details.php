<?php

class User_details extends CI_Controller
{
    function index()
    {
        $this->load->model('user_model');
        $data['userArray'] = $this->user_model->return_users();
        $this->load->model('Position_model');
        $data['positionsMap'] = $this->Position_model->return_position();
        foreach($data['userArray'] as &$user)
        {
            if($user['supervisor_id'] != NULL)
            {
                $supervisor = $this->user_model->get_user($user['supervisor_id']);
                $user['supervisor_name'] = $supervisor['FIRST_NAME'] . ' ' . $supervisor['LAST_NAME'];
            }
            else {
                $user['supervisor_name'] = 'Brak przelozonego';
    
            }
        
        } 



        $this->load->view('user_view',$data);
    }
    function email_check($email, $ID)
    {
        $this->load->model('user_model');
        $user = $this->user_model->get_emails($email,$ID);

        if($user)
        {
            $this->form_validation->set_message('email_check', 'Email is not unique');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    function supervisor_check($supervisor_id, $user_id = null)
    {
        $this->load->model('user_model');

        if (is_null($supervisor_id) || $supervisor_id == '') {
            return TRUE;
        }

        $supervisor = $this->user_model->get_user($supervisor_id);
        if ($supervisor && $supervisor['supervisor_id'] !== null) {
            $this->form_validation->set_message('supervisor_check', 'Przełożony nie może mieć przypisanego szefa.');
            return FALSE;
        }
        $current_user = $this->user_model->get_user($user_id);
        $data['userArray'] = $this->user_model->return_users();
        foreach($data['userArray'] as $user)
        {
            if($user['supervisor_id'] === $user_id)
            {
                $this->form_validation->set_message('supervisor_check', 'Chcesz przypisac przelozonego dla osoby ktora jest szefem.');
                return FALSE;
            }
        }

        if ($supervisor_id == $user_id) {
            $this->form_validation->set_message('supervisor_check', 'Nie możesz przypisać sobie samego siebie jako przełożonego(genious).');
            return FALSE;
        }

        return TRUE;
    }
    function create()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->form_validation->set_rules('LAST_NAME', 'Last Name', 'required');
        $this->form_validation->set_rules('FIRST_NAME', 'First Name', 'required');
        $this->form_validation->set_rules('PHONE_NUMBER', 'Phone Number', 'required|integer');
        $this->form_validation->set_rules('EMAIL', 'e-mail', 'is_unique[Employees.EMAIL]|required|valid_email');
        $this->form_validation->set_rules('supervisor_id', 'Supervisor', 'callback_supervisor_check');
        $users = $this->user_model->return_users();
        $supervisors = [];
        foreach($users as $user)
        {
            $supervisors[$user['ID']] = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'];
        }
        $data['supervisors'] = $supervisors;

        $this->load->model('Position_model');
        $data['PositionArray'] = $this->Position_model->return_position();
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('create',$data);
        }
        else
        {
            $this->user_model->create_user();
            redirect('user_details');

        }
    }
    function edit($ID)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('LAST_NAME', 'Last Name', 'required');
        $this->form_validation->set_rules('FIRST_NAME', 'First Name', 'required');
        $this->form_validation->set_rules('PHONE_NUMBER', 'Phone Number', 'required|integer');
        $this->form_validation->set_rules('EMAIL', 'Email', 'required|valid_email|callback_email_check[' . $ID . ']');
        $this->form_validation->set_rules('supervisor_id', 'Supervisor', 'callback_supervisor_check[' . $ID . ']');
        $this->load->model('user_model');
        $data['user'] = $this->user_model->get_user($ID);
        $users = $this->user_model->return_users();
        $supervisors = [];
        foreach($users as $user)
        {
            $supervisors[$user['ID']] = $user['FIRST_NAME'] . ' ' . $user['LAST_NAME'];
        }
        $data['supervisors'] = $supervisors;
        $this->load->model('Position_model');
        $data['PositionArray'] = $this->Position_model->return_position();
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('edit', $data);
        } 
        else 
        {
            $this->user_model->edit_user($ID);
            redirect('user_details');
        }
    }
    function delete($ID)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_model');
        $data['user'] = $this->user_model->get_user($ID);
        $this->user_model->delete_user($ID);
        redirect('user_details');
    }
    function hierarchy()
    {
        $this->load->database();
        $this->load->model('user_model');
        $EmployeesList = $this->user_model->get_employees_hierarchy();
        $hierarchy = [];
        foreach ($EmployeesList as $employee) {
            $hierarchy[$employee['supervisor_id']][] = $employee;
        }
    
        $data['hierarchy'] = $hierarchy;
        $this->load->view('hierarchy_view',$data);
    }


}

?>
