<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->model('Vales_consumo_model');
        $this->load->model('Jerarquia_model');


        if (!$this->ion_auth->logged_in()){
          $this->session->set_flashdata('error','Debe estar logueado para realizar esta acción.');
        redirect('auth/login');
        }

          $this->user = $this->ion_auth->user()->row();
          $this->data = $this->generales->imports_generales();

    }


//Acá cargo diferentes datos en el dashboard segun el grupo al que pertenece el usuario
    function index()
    {
//Perfil de REQUERIDOR
        if ($this->ion_auth->in_group($this->config->item('Requeridor'))){
            
            $this->data['vales'] = $this->Vales_consumo_model->get_latest_vales_consumo($this->user->id);

//Perfil de APROBADOR
        } else if($this->ion_auth->in_group($this->config->item('Aprobador'))){

            $pendientes = array(
                'id_aprobacion' => $this->config->item('Pendiente'),
                'sectores' => $this->data['sectores'],
            );
            $aprobados = array(
                'id_aprobacion' => $this->config->item('Aprobado'),
                'sectores' => $this->data['sectores'],
            );
            $rechazados = array(
                'id_aprobacion' => $this->config->item('Rechazado'),
                'sectores' => $this->data['sectores'],
            );
            $EnProcesoDeArmado = array(
                'id_aprobacion' => $this->config->item('Aprobado'),
                'sectores' => $this->data['sectores'],
                'id_estado' => $this->config->item('EnProcesoDeArmado'),
            );
            $ListoParaRetirar = array(
                'id_aprobacion' => $this->config->item('Aprobado'),
                'sectores' => $this->data['sectores'],
                'id_estado' => $this->config->item('ListoParaRetirar'),
            );
            $Retirado = array(
                'id_aprobacion' => $this->config->item('Aprobado'),
                'sectores' => $this->data['sectores'],
                'id_estado' => $this->config->item('Retirado'),
            );



            $this->data['pendientes']        = $this->Vales_consumo_model->get_all_vales_count_array($pendientes);
            $this->data['aprobados']         = $this->Vales_consumo_model->get_all_vales_count_array($aprobados);
            $this->data['rechazados']        = $this->Vales_consumo_model->get_all_vales_count_array($rechazados);
            $this->data['EnProcesoDeArmado'] = $this->Vales_consumo_model->get_all_vales_count_array($EnProcesoDeArmado);
            $this->data['ListoParaRetirar']  = $this->Vales_consumo_model->get_all_vales_count_array($ListoParaRetirar);
            $this->data['Retirado']          = $this->Vales_consumo_model->get_all_vales_count_array($Retirado);
            $this->data['vales']             = $this->Vales_consumo_model->get_latest_vales_consumo_by_sector($this->data['sectores']);

            //$this->data['pendientes'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Pendiente'),null,$this->data['sectores']);
            //$this->data['aprobados'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),null,$this->data['sectores']);
            //$this->data['rechazados'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Rechazado'),null,$this->data['sectores']);
        //    $this->data['EnProcesoDeArmado'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('EnProcesoDeArmado'),$this->data['sectores']);
            //$this->data['ListoParaRetirar'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('ListoParaRetirar'),$this->data['sectores']);
            //$this->data['Retirado'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('Retirado'),$this->data['sectores']);





        }

           $this->data['_view'] = 'dashboard';
           $this->load->view('layouts/main',$this->data);

/*

                    $this->data['vales'] = $this->Vales_consumo_model->get_latest_vales_consumo($this->user->id);


                }elseif($this->ion_auth->in_group($this->config->item('Aprobador'))){




                }else{

                    $this->data['pendientes'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Pendiente'));
                    $this->data['aprobados'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'));
                    $this->data['rechazados'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Rechazado'));
                    $this->data['EnProcesoDeArmado'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('EnProcesoDeArmado'));

                    $this->data['ListoParaRetirar'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('ListoParaRetirar'));

                    $this->data['Retirado'] = $this->Vales_consumo_model->get_all_vales_count($this->config->item('Aprobado'),$this->config->item('Retirado'));
                    $this->data['vales'] = $this->Vales_consumo_model->get_latest_vales_consumo();




                }



            $this->data['_view'] = 'dashboard';
            $this->load->view('layouts/main',$this->data);*/

        }




}
