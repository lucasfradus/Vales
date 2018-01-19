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
        $this->data['aprobaciones_barra'] =  $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Pendiente'),null,$this->data['sectores']);

        $this->data['estado_barra'] = $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Aprobado'),$this->CI->config->item('EnProcesoDeArmado'), $this->data['sectores']);



      return $this->data;
    }


    public function Send_mails($args){

        $this->CI->load->view($args['view'], $args);

      /*
      $message = $this->load->view($this->config->item('templates').$this->config->item('email_activate', 'ion_auth'), $data, true);

      $this->email->clear();
      $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
      $this->email->to($email);
      $this->email->subject($this->config->item('site_title', 'ion_auth') . ' - ' . $this->lang->line('email_activation_subject'));
      $this->email->message($message);

*/

    }




}


 ?>
