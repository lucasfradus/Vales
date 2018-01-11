<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Role extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->model('Role_model');

        $this->data = $this->generales->imports_generales();

        //Perfiles habilitados para ver esta pagina
        $group = array($this->config->item('Administrator'));

          if(!$this->ion_auth->in_group($group)){
            $this->session->set_flashdata('error', 'No Tiene permisos para realizar esta acción');
                    redirect('/');
          }


    }

    /*
     * Listing of roles
     */
    function index()
    {
            if($this->ion_auth->RolCheck($this->config->item('AdministrarRoles'))){
            $this->data['roles'] = $this->Role_model->get_all_roles();
                $this->data['_view'] = 'role/index';
                $this->load->view('layouts/main',$this->data);
    }
}

    /*
     * Adding a new role
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'nombre_rol' => $this->input->post('nombre_rol'),
				'descripcion_rol' => $this->input->post('descripcion_rol'),
            );

            $role_id = $this->Role_model->add_role($params);
            redirect('role/index');
        }
        else
        {
            $this->data['_view'] = 'role/add';
            $this->load->view('layouts/main',$this->data);
        }
    }

    /*
     * Editing a role
     */
    function edit($id_rol)
    {
        // check if the role exists before trying to edit it
        $this->data['role'] = $this->Role_model->get_role($id_rol);

        if(isset($this->data['role']['id_rol']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'nombre_rol' => $this->input->post('nombre_rol'),
					'descripcion_rol' => $this->input->post('descripcion_rol'),
                );

                $this->Role_model->update_role($id_rol,$params);
                redirect('role/index');
            }
            else
            {
                $this->data['_view'] = 'role/edit';
                $this->load->view('layouts/main',$this->data);
            }
        }
        else
            show_error('The role you are trying to edit does not exist.');
    }

    /*
     * Deleting role
     */
    function remove($id_rol)
    {
        $role = $this->Role_model->get_role($id_rol);

        // check if the role exists before trying to delete it
        if(isset($role['id_rol']))
        {
            $this->Role_model->delete_role($id_rol);
            redirect('role/index');
        }
        else
            show_error('The role you are trying to delete does not exist.');
    }

}
