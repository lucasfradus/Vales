<?php


class Generales{

    var $CI;

      public function __construct($params = array())
      {
        $this->CI =& get_instance();
        $this->CI->load->library('ion_auth');
        $this->CI->load->library('session');
        $this->CI->load->model('Jerarquia_model');
        $this->CI->load->model('Vales_consumo_model');
        $this->CI->load->model('Ion_auth_model');
        $this->CI->load->helper('url');
        $this->CI->load->library('email');
        $this->CI->load->library('mailer');

      }
    /*
    *
    *
    * Funcion imports_generales
    * Autor: Lucas Fradusco
    * Fecha: 11/01/2017
    *
    *
    * Descripcion: Esta libreria carga variables que se usan en la vista principal.
    *
    * + Valida que el usuario este logueado, si no lo redirige al login
    * + Genera la variable SESION que contiene la informacion del usuario logueado en formato de ObjStd::
    * + Genera la variable PERFIL que contiene el tipo de perfil que posee el usuario.
    * + Carga los numeros que aparecen en la barra lateral segun el tipo de usuario.
    *
    +
    */
      public function imports_generales($string = null){

        if (!$this->CI->ion_auth->logged_in()){
          $this->CI->session->set_flashdata('error','Debe estar logueado para realizar esta acción.');
        redirect('auth/login');
        }

        $this->user = $this->CI->ion_auth->user()->row();
        $this->data['sectores'] = $this->CI->Jerarquia_model->get_sector_user($this->user->id);
        $this->data['sesion'] = $this->user;
        $this->data['perfil'] = $this->CI->Ion_auth_model->get_users_groups()->row();


            // $aprobaciones_barra = array(
            //     'id_aprobacion' => $this->CI->config->item('Pendiente'),
            //     'sectores' => $this->data['sectores'],
            // );
            // $estado_barra = array(
            //     'id_aprobacion' => $this->CI->config->item('Aprobado'),
            //     'sectores' => $this->data['sectores'],
            //     'id_estado' => $this->CI->config->item('EnProcesoDeArmado'),
            // );
            //
            // $this->data['aprobaciones_barra']       = $this->CI->Vales_consumo_model->get_all_vales_count_array($aprobaciones_barra);
            // $this->data['estado_barra']             = $this->CI->Vales_consumo_model->get_all_vales_count_array($estado_barra);


        //$this->data['aprobaciones_barra'] =  $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Pendiente'),null,$this->data['sectores']);

        //$this->data['estado_barra'] = $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Aprobado'),$this->CI->config->item('EnProcesoDeArmado'), $this->data['sectores']);



      return $this->data;
    }


    public function Notify_owner($total_items, $vales_consumo_id, $sector){
       $data['datos_vale'] = $total_items;
       $data['id_vale'] = $vales_consumo_id;
       $data['sector'] = $sector;
       $data['user'] = $this->CI->ion_auth->user()->row();

       $body = $this->CI->load->view('email/new', $data, TRUE);
       $dbdata = array(
           '_recipients' => $data['user']->email,
           '_body' => $body,
           '_headers' => '[Sistema de Vales #'.$vales_consumo_id.']Nuevo Vale de Consumo #'. $vales_consumo_id,
       );
       $this->CI->mailer->new_mail_queue($dbdata);
    }

    public function Notify_owner_aproval($requeridor, $vale)
    {
        if($vale['id_estado_aprobacion'] == $this->CI->config->item('Aprobado')){
            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale ha sido Aprobado';
        }else{
            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale ha sido Rechazado';
        }
        $body = $this->CI->load->view('email/update_aproval', $vale, TRUE);
        $dbdata = array(
            '_recipients' => $requeridor['email'],
            '_body' => $body,
            '_headers' => $header,
        );
         $this->CI->mailer->new_mail_queue($dbdata);
    }
/*
'id_vale'             => $this->input->post('id_vale'),
'id_estado'           => $this->Estado_entrega_model->get_estado_entrega($this->input->post('status')),
'responsable'         => $this->user,
'observacion'         => $this->input->post('comments'),

*/
    public function Notify_owner_ready($requeridor, $vale)
    {
        if($vale['id_estado']->id_estado_entrega == $this->CI->config->item('EnProcesoDeArmado')){

            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale se encuentra en proceso de armado';

        }elseif($vale['id_estado']->id_estado_entrega == $this->CI->config->item('ListoParaRetirar')){

            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale ya esta listo para ser retirado';

        }elseif($vale['id_estado']->id_estado_entrega == $this->CI->config->item('Retirado')){

            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale ha sido retirado';

        }elseif($vale['id_estado']->id_estado_entrega == $this->CI->config->item('RechazoPorFaltaDeStock')){

            $header = '[Sistema de Vales #'.$vale['id_vale'].'] Su vale ha sido Rechazado por falta de stock';
        }
        $body = $this->CI->load->view('email/update_status', $vale, TRUE);
        $dbdata = array(
            '_recipients' => $requeridor['email'],
            '_body' => $body,
            '_headers' => $header,
        );
         $this->CI->mailer->new_mail_queue($dbdata);
    }




    public function Notify_responsible($total_items, $vales_consumo_id, $sector, $responsable, $requeridor){
        $data['datos_vale'] = $total_items;
        $data['id_vale'] = $vales_consumo_id;
        $data['sector'] = $sector;
        $data['user'] = $requeridor;
        $body = $this->CI->load->view('email/new_aprove', $data, TRUE);
        $dbdata = array(
            '_recipients' => $responsable->email,
            '_body' => $body,
            '_headers' => '[Sistema de Vales #'.$vales_consumo_id.'] Nuevo Vale para Aprobar. #'. $vales_consumo_id,
        );
        $this->CI->mailer->new_mail_queue($dbdata);
    }






}


 ?>
