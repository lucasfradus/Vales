<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Sector_req extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sector_req_model');
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->model('Vales_consumo_model');

        $this->user = $this->ion_auth->user()->row();
        $this->data = $this->generales->imports_generales();

        //Perfiles habilitados para ver esta pagina
        $group = array($this->config->item('Administrator'));

          if(!$this->ion_auth->in_group($group) || !$this->ion_auth->RolCheck($this->config->item('AdministrarSectores'))){
            $this->session->set_flashdata('error', 'No Tiene permisos para realizar esta acción. Para Administrar los sectores se debe comunicar con el administrador del sistema.');
                    redirect('/');
          }




    }

    /*
     * Listing of sector_req
     */
    function index()
    {
        $this->data['sector_req'] = $this->Sector_req_model->get_all_sector_req();

        $this->data['_view'] = 'sector_req/index';
        $this->load->view('layouts/main',$this->data);
    }

    /*
     * Adding a new sector_req
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'nombre_sector' => $this->input->post('nombre_sector'),
                'FASE' => $this->input->post('fase'),
            );

            $sector_req_id = $this->Sector_req_model->add_sector_req($params);
            redirect('sector_req/index');
        }
        else
        {
            $this->data['_view'] = 'sector_req/add';
            $this->load->view('layouts/main',$this->data);
        }
    }

    /*
     * Editing a sector_req
     */
    function edit($id_sector_req)
    {
        // check if the sector_req exists before trying to edit it
        $this->data['sector_req'] = $this->Sector_req_model->get_sector_req($id_sector_req);

        if(isset($this->data['sector_req']['id_sector_req']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'nombre_sector' => $this->input->post('nombre_sector'),
                    'FASE' => $this->input->post('fase'),
                );

                $this->Sector_req_model->update_sector_req($id_sector_req,$params);
                redirect('sector_req/index');
            }
            else
            {
                $this->data['_view'] = 'sector_req/edit';
                $this->load->view('layouts/main',$this->data);
            }
        }
        else
            show_error('The sector_req you are trying to edit does not exist.');
    }

    /*
     * Deleting sector_req
     */
    function remove($id_sector_req)
    {
        $sector_req = $this->Sector_req_model->get_sector_req($id_sector_req);

        // check if the sector_req exists before trying to delete it
        if(isset($sector_req['id_sector_req']))
        {
            $this->Sector_req_model->delete_sector_req($id_sector_req);
            redirect('sector_req/index');
        }
        else
            show_error('The sector_req you are trying to delete does not exist.');
    }

}
