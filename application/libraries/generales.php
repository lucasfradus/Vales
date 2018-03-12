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


            $aprobaciones_barra = array(
                'id_aprobacion' => $this->CI->config->item('Pendiente'),
                'sectores' => $this->data['sectores'],
            );
            $estado_barra = array(
                'id_aprobacion' => $this->CI->config->item('Aprobado'),
                'sectores' => $this->data['sectores'],
                'id_estado' => $this->CI->config->item('EnProcesoDeArmado'),
            );

            $this->data['aprobaciones_barra']       = $this->CI->Vales_consumo_model->get_all_vales_count_array($aprobaciones_barra);
            $this->data['estado_barra']             = $this->CI->Vales_consumo_model->get_all_vales_count_array($estado_barra);


        //$this->data['aprobaciones_barra'] =  $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Pendiente'),null,$this->data['sectores']);

        //$this->data['estado_barra'] = $this->CI->Vales_consumo_model->get_all_vales_count($this->CI->config->item('Aprobado'),$this->CI->config->item('EnProcesoDeArmado'), $this->data['sectores']);



      return $this->data;
    }


    public function Notify_owner($datos_vale, $id_vale, $sector){
        $data['datos_vale'] = $datos_vale;
        $data['id_vale'] = $id_vale;
        $data['sector'] = $sector;
        $data['user'] = $this->CI->ion_auth->user()->row();
        $message = $this->CI->load->view('email/new', $data, TRUE);
        log_message('error', 'llegue a la funcion notifica');
        $this->CI->email->from('lucas.fradusco@gmail.com.ar', 'Sistema de Vales');
        $this->CI->email->to($data['user']->email);
        $this->CI->email->set_mailtype("html");
        $this->CI->email->subject('Nuevo Vale de Consumo #'. $id_vale);
        $this->CI->email->message($message);

        if($this->CI->email->send()){
          log_message('error', 'se mando mail');
        }else{
         log_message('error', 'no se mando mail');
        }

    }

    public function Notify_responsible($user, $datos_vale, $id_vale){

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
