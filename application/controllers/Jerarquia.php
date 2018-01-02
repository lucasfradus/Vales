<?php

class Jerarquia extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Jerarquia_model');
        $this->load->model('Vales_consumo_model');
        $this->load->model('Articulo_model');
        $this->load->model('Sector_req_model');
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('ion_auth');
        $this->load->helper('date');
        $this->load->library('form_validation');



        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('error','Debe estar logueado para realizar esta acción.');
        redirect('auth/login');
        }

        $this->user = $this->ion_auth->user()->row();
        $sectores = $this->Jerarquia_model->get_sector_user($this->user->id);
        $this->data['sesion'] = $this->user;
        $this->data['aprobaciones_barra'] =  $this->Vales_consumo_model->get_all_vales_count($this->config->item('Pendiente'),null,$sectores);
        $this->data['estado_barra'] =  $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('EnProcesoDeArmado'), $this->Jerarquia_model->get_sector_user($this->user->id));

    }

    /*
     * Listing of jerarquias
     */
    function index()
    {



          $this->data['all_sector_req'] = $this->Sector_req_model->get_all_sector_req();
          $this->data['all_users'] = $this->User_model->get_all_users();
          $this->data['_view'] = 'jerarquia/index';
          $this->load->view('layouts/main',$this->data);

      }

      function get_jerarquia(){
        $params['user'] = $this->input->post('id_user_padre');
        $params['sector'] =$this->input->post('id_sector_jerarquia');

        $this->db->select('id_jerarquia, id_sector_jerarquia, first_name, last_name, nombre_sector, users_groups.group_id, groups.description');


        $result = $this->Jerarquia_model->get_all_jerarquias($params);
        if($result){
          foreach ($result as $key) {
            $html = '<tr id="'.$key['id_jerarquia'].'">';
              $html .= '<th>'.$key['id_sector_req'].'</th>';
              $html .= '<th>'.$key['user_padre'].'</th>';
              $html .= '<th>'.$key['first_name'].', '.$key['last_name'].'</th>';
              $html .= '<th>'.$key['description'].'</th>';
              $html .= '<th>'.$key['nombre_sector'].'</th>';
              $html .= '<th>';
              $html .= '<button onClick="borrar_jerarquia('.$key['id_jerarquia'].')" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</button>';
              $html .= '</tr>';
            echo $html;
          }
        }else{
          echo false;
        }
      }


  function get_select(){

      $query = 'select * from sector_req where not exists (select 1 from jerarquias where jerarquias.id_sector_jerarquia = sector_req.id_sector_req and jerarquias.id_user_padre = '.$this->input->post('id_user_padre').')';
      $result = $this->Jerarquia_model->query($query);
          foreach ($result as $sector) {
            echo '<option value="'.$sector->id_sector_req.'">'.$sector->nombre_sector.'</option>';
      }
  }




    /*
     * Adding a new jerarquia
     */
    function add()
    {
  $this->form_validation->set_rules('id_user_padre','Id User Padre','required');
  $this->form_validation->set_rules('id_sector_jerarquia[]','Id Sector Jerarquia','required');

    if($this->form_validation->run())
      {
        $padre = $this->input->post('id_user_padre');
        $sectores_recibidos = $this->input->post('id_sector_jerarquia[]');
        foreach ($sectores_recibidos as $key) {
            $params = array(
              'id_user_padre' => $padre,
              'id_user_hijo' => $padre,
              'id_sector_jerarquia' => $key,
            );
          $jerarquia_id = $this->Jerarquia_model->add_jerarquia($params);
          }
        // $this->session->set_flashdata('Exito!','Los Permisos del usuario se han modificado correctamente.');
         redirect('jerarquia/index');
      }
      else
      {

        $this->data['all_users'] = $this->User_model->get_all_users();
        $this->data['all_sector_req'] = $this->Sector_req_model->get_all_sector_req();
        $this->data['_view'] = 'jerarquia/add';
        $this->load->view('layouts/main',$this->data);
      }
    }

    /*
     * Editing a jerarquia
     */
    function edit($id_jerarquia)
    {
        // check if the jerarquia exists before trying to edit it
        $data['jerarquia'] = $this->Jerarquia_model->get_jerarquia($id_jerarquia);

        if(isset($data['jerarquia']['id_jerarquia']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'id_user_padre' => $this->input->post('id_user_padre'),
					'id_user_hijo' => $this->input->post('id_user_hijo'),
					'id_sector_jerarquia' => $this->input->post('id_sector_jerarquia'),
                );

                $this->Jerarquia_model->update_jerarquia($id_jerarquia,$params);
                redirect('jerarquia/index');
            }
            else
            {
				$this->load->model('User_model');
				$this->data['all_users'] = $this->User_model->get_all_users();

				$this->load->model('Sector_req_model');
				$this->data['all_sector_req'] = $this->Sector_req_model->get_all_sector_req();

                $this->data['_view'] = 'jerarquia/edit';
                $this->load->view('layouts/main',$this->data);
            }
        }
        else
            show_error('The jerarquia you are trying to edit does not exist.');
    }

    /*
     * Deleting jerarquia
     */
    function remove($id_jerarquia)
    {
        $jerarquia = $this->Jerarquia_model->get_jerarquia($id_jerarquia);
        // check if the jerarquia exists before trying to delete it
        if(isset($jerarquia['id_jerarquia']))
        {
            $this->Jerarquia_model->delete_jerarquia($id_jerarquia);
            echo $id_jerarquia;
        }
        else
          echo 'false';
    }

}
