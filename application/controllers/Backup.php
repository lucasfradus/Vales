<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');

class Backup extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('file');
        $this->load->dbutil();
        $this->load->helper('download');
        $this->data = $this->generales->imports_generales();


        //Solo los administradores pueden hacer backups
        if(!$this->ion_auth->in_group($this->config->item('Administrator'))){
          $this->session->set_flashdata('error','No tiene permiso para realizar esta acción1.11111');
                 redirect('/');

        }

    }

public function index(){
    $this->data['_view'] = 'backup/index';
    $this->load->view('layouts/main',$this->data);
}



public function full_backup(){

    $prefs = array(
            'format'      => 'zip',
            'filename'    => 'my_db_backup.sql'
          );

    $backup = $this->dbutil->backup($prefs);

    $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
    $save = 'Backups/'.$db_name;


    write_file($save, $backup);



    force_download($db_name, $backup);
}

}
