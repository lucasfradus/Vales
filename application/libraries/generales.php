<?php


class Generales{

    var $CI;

      public function __construct($params = array())
      {
        $this->CI =& get_instance();
        $this->CI->load->library('ion_auth');
        $this->CI->load->model('Jerarquia_model');
        $this->CI->load->model('Vales_consumo_model');
        $this->CI->load->model('Ion_auth_model');
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



      public function imports_generales(){

        if (!$this->CI->ion_auth->logged_in()){
          $this->session->set_flashdata('error','Debe estar logueado para realizar esta acción.');
        redirect('auth/login');
        }

        $this->user = $this->CI->ion_auth->user()->row();
        $sectores = $this->CI->Jerarquia_model->get_sector_user($this->user->id);

        $this->data['sesion'] = $this->user;
        $this->data['perfil'] = $this->CI->Ion_auth_model->get_users_groups()->row();
        $this->data['aprobaciones_barra'] =  $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Pendiente'),null,$sectores);

        $this->data['estado_barra'] = $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Aprobado'),$this->CI->config->item('EnProcesoDeArmado'), $this->CI->Jerarquia_model->get_sector_user($this->user->id));



      return $this->data;
    }
}


 ?>
