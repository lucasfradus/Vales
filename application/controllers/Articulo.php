<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Articulo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Articulo_model');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->model('Fk_un_med_model');

        $this->data = $this->generales->imports_generales();

        //aca valido que solo ciertos perfiles de usuarios puedan utilizar los metodos de estre controlador
        $group = array($this->config->item('Administrator'));
                if(!$this->ion_auth->in_group($group)){
                  $this->session->set_flashdata('error','No tiene permiso para realizar esta acción.');
                         redirect('/');

                }
    }

    function bulk_add(){
        $this->data['_view'] = 'articulo/bulk_add';
        $this->load->view('layouts/main',$this->data);
    }


    function import(){
      $this->load->library('CSVReader');
      $csvData = $this->csvreader->parse_file(site_url('art2.csv'));
 $i = 0;
      foreach ($csvData as $row) {
          $i++;
          $id_un_med_1 = $this->Fk_un_med_model->get_fk_un_med_by_name($row['id_un_med_1']);
          $id_un_med_2 = $this->Fk_un_med_model->get_fk_un_med_by_name($row['id_un_med_2']);
          // echo $id_un_med_1."<br>";
          // echo $id_un_med_2."<br>";
          // var_dump($this->Articulo_model->get_articulo_by_number($row['num_articulo']));
          // echo "<br>";
          // if ($id_un_med_1){
          //     echo "existe la unidad de medida 1 <br>";
          // }else{
          //     echo "no existe la un de meiduida 1 <br>";
          // }
          // if ($id_un_med_2){
          //     echo "existe la unidad de medida 2 <br>";
          // }else{
          //     echo "no existe la un de meiduida 2<br>";
          // }
          // if($this->Articulo_model->get_articulo_by_number($row['num_articulo'])){
          //     echo "ya existe el articulo". $row['num_articulo']. "<br>";
          // }else{
          //     echo "No existe el articulo". $row['num_articulo']. "<br>";
          // }
          // echo "-----------------------<br>";

            //Antes de hacer la carga tengo que chequear que no exista ese numero de articulo y que esten bien las unidades de medida. si no, no lo cargo
          if ($id_un_med_1 && $id_un_med_2 && !$this->Articulo_model->get_articulo_by_number($row['num_articulo'])){
              $params = array(
                  'id_un_med1' =>  $id_un_med_1,
                  'id_un_med2' =>  $id_un_med_2,
                  'num_articulo' => $row['num_articulo'],
                  'codigo_jde' => $row['codigo_jde'],
                  'descripcion1' => $row['descripcion1'],
                  'descripcion2' => $row['descripcion2'],
                  'status' => 1,
              );
              $articulo_id = $this->Articulo_model->add_articulo($params);
               echo "<br>articulo agregado correctamente  id: ". $articulo_id;
          }
          else
          {
             echo "<br>ha ocurrido un error al intentar cargar el articulo ".$row['num_articulo'].". Esto se puede deber a que ya este cargado o que su unidad de medida no se encuentre cargada.";
         }

     }
     echo "total de items agregados: ".$i;

    }

    /*
     * Listing of articulos
     */
    function index()
    {
        if($this->ion_auth->RolCheck($this->config->item('VerArticulos'))){
//paginacion
       $params['limit'] = 10;
       $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
       $config = $this->config->item('pagination');
       $config['per_page'] = 10;
       $config['base_url'] = site_url('articulo/index?');
       $config['total_rows'] = $this->Articulo_model->get_all_articulos_count();
       $this->pagination->initialize($config);
       $this->data["links"] = $this->pagination->create_links();
       $this->data['articulos'] = $this->Articulo_model->get_all_articulos($params);

        $this->data['_view'] = 'articulo/index';
        $this->load->view('layouts/main',$this->data);

        }
    }

    /*
     * Esta funcion la llamo con un select2 para traer los articulos y asi no tener que cargar todos cada vez que quiero crear un vale nuevo
     */

    function autocompete(){
     echo json_encode($this->Articulo_model->get_autocomplete($this->input->get('search')));
 }


    /*
     * Adding a new articulo
     */

    function add(){

    if($this->ion_auth->RolCheck($this->config->item('AltaArticulos'))){

        $this->form_validation->set_rules('num_articulo','Numero de Articulo','required|integer|is_unique[articulos.num_articulo]');
        $this->form_validation->set_rules('descripcion1','Descripcion1','required');
        $this->form_validation->set_rules('id_un_med1','Id Un Med1','required|integer');

        if($this->form_validation->run())
        {
            $params = array(
                'id_un_med1' => $this->input->post('id_un_med1'),
                'id_un_med2' => $this->input->post('id_un_med2'),
                'num_articulo' => $this->input->post('num_articulo'),
                'descripcion1' => $this->input->post('descripcion1'),
                'descripcion2' => $this->input->post('descripcion2'),
                'status' => $this->input->post('status'),
            );

            $articulo_id = $this->Articulo_model->add_articulo($params);
            $this->session->set_flashdata('success','Articulo Creado Correctamente ID:'.$articulo_id);
            redirect('articulo/index');
        }
        else
        {
            $this->load->model('Fk_un_med_model');
            $this->data['all_fk_un_med'] = $this->Fk_un_med_model->get_all_fk_un_med();

            $this->data['_view'] = 'articulo/add';
            $this->load->view('layouts/main',$this->data);
        }
    }
}
     /*
     * Ver el detalle de un articulo
     */

    function view($id_articulo){
        if($this->ion_auth->RolCheck($this->config->item('VerArticulos'))){
            $this->data['articulo'] = $this->Articulo_model->get_articulo($id_articulo);
              if(isset($this->data['articulo']['id_articulo'])){

                $this->data['_view'] = 'articulo/view';
                $this->load->view('layouts/main',$this->data);

              }else{
                show_error('El articulo que esta intentado ver no existe.');
              }
        }
    }


    /*
     * Editing a articulo
     */
     function edit($id_articulo){
        if($this->ion_auth->RolCheck($this->config->item('EditarArticulos'))){
        // check if the articulo exists before trying to edit it
        $this->data['articulo'] = $this->Articulo_model->get_articulo($id_articulo);

        if(isset($this->data['articulo']['id_articulo']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('num_articulo','Num Articulo','required');
            $this->form_validation->set_rules('descripcion1','Descripcion1','required');
            $this->form_validation->set_rules('id_un_med1','Id Un Med1','required|integer');

            if($this->form_validation->run())
            {
                $params = array(
                    'id_un_med1' => $this->input->post('id_un_med1'),
                    'id_un_med2' => $this->input->post('id_un_med2'),
                    'num_articulo' => $this->input->post('num_articulo'),
                    'descripcion1' => $this->input->post('descripcion1'),
                    'descripcion2' => $this->input->post('descripcion2'),
                    'status' => $this->input->post('status'),
                );

                $this->Articulo_model->update_articulo($id_articulo,$params);
                $this->session->set_flashdata('success','Se ha editado correctamente el articulo'.$articulo_id);
                redirect('articulo/index');
            }
            else{

                $this->load->model('Fk_un_med_model');
                $this->data['all_fk_un_med'] = $this->Fk_un_med_model->get_all_fk_un_med();

                $this->data['_view'] = 'articulo/edit';
                $this->load->view('layouts/main',$this->data);

            }
        }
        else
            show_error('El articulo que esta intentado editar no existe.');
    }
}

    /*
     * Deleting articulo
     */
    function remove($id_articulo)
    {
        $articulo = $this->Articulo_model->get_articulo($id_articulo);
        // check if the articulo exists before trying to delete it
        if(isset($articulo['id_articulo']))
        {
          if($articulo['status']==$this->config->item('Activo')){
            $this->Articulo_model->update_articulo($id_articulo,array('status' => $this->config->item('Inactivo')));
            $this->session->set_flashdata('success','Se ha deshabilito correctamente el articulo '.$id_articulo);
          }else{
            $this->Articulo_model->update_articulo($id_articulo,array('status' => $this->config->item('Activo')));
            $this->session->set_flashdata('success','Se ha habilito correctamente el articulo '.$id_articulo);
          }
            redirect('articulo/index');
        }
        else
            show_error('El articulo que esta intentado eliminar no existe.');
    }

}
