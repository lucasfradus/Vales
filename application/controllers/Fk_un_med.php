<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Fk_un_med extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fk_un_med_model');
    } 

    /*
     * Listing of fk_un_med
     */
    function index()
    {
        $data['fk_un_med'] = $this->Fk_un_med_model->get_all_fk_un_med();
        
        $data['_view'] = 'fk_un_med/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new fk_un_med
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'un_medida' => $this->input->post('un_medida'),
            );
            
            $fk_un_med_id = $this->Fk_un_med_model->add_fk_un_med($params);
            redirect('fk_un_med/index');
        }
        else
        {            
            $data['_view'] = 'fk_un_med/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a fk_un_med
     */
    function edit($id_un_medida)
    {   
        // check if the fk_un_med exists before trying to edit it
        $data['fk_un_med'] = $this->Fk_un_med_model->get_fk_un_med($id_un_medida);
        
        if(isset($data['fk_un_med']['id_un_medida']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'un_medida' => $this->input->post('un_medida'),
                );

                $this->Fk_un_med_model->update_fk_un_med($id_un_medida,$params);            
                redirect('fk_un_med/index');
            }
            else
            {
                $data['_view'] = 'fk_un_med/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The fk_un_med you are trying to edit does not exist.');
    } 

    /*
     * Deleting fk_un_med
     */
    function remove($id_un_medida)
    {
        $fk_un_med = $this->Fk_un_med_model->get_fk_un_med($id_un_medida);

        // check if the fk_un_med exists before trying to delete it
        if(isset($fk_un_med['id_un_medida']))
        {
            $this->Fk_un_med_model->delete_fk_un_med($id_un_medida);
            redirect('fk_un_med/index');
        }
        else
            show_error('The fk_un_med you are trying to delete does not exist.');
    }
    
}