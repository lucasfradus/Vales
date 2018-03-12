<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Vales_consumo extends CI_Controller{

    var $sesion;
    var $user;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Vales_consumo_model');
        $this->load->model('Articulo_model');
        $this->load->model('Evolucion_vale_model');
        $this->load->model('Estado_entrega_model');
        $this->load->model('Ion_auth_model');
        $this->load->library('pagination');
        $this->load->library('ion_auth');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->model('Jerarquia_model');
        $this->load->model('Notificaciones_user_model');
        $this->load->library('email');


        $this->user = $this->ion_auth->user()->row();
        $this->data = $this->generales->imports_generales();


    }
/*
    function sendMail($datos){
      $this->load->library('email');
      $this->email->from('lucas.fradusco@gmail.com.ar', 'Sistema de Vales');
      $this->email->to($datos['user']->email);
      $this->email->subject(($datos['subject']);
      $this->email->message('test');

      if($this->email->send()){
        echo "todo ok";
      }else{
        echo "no todo ok!";
      }
    }

*/



    /*
     * Listado de Vales, segun el perfil que tenga el usuario, voy a traer los vales:
     *  Requeridor : solo traigo sus Vales.
     *  Aprobador : traigo los vales solo de su sector.
     *  Pañolero o Admin: traigo todos los vales.
     */
    function index()
    {

         if($this->ion_auth->in_group($this->config->item('Requeridor')) && $this->ion_auth->RolCheck($this->config->item('VerVales'))){
                $this->data['vales_consumo'] = $this->Vales_consumo_model->get_my_vales_consumo($this->user->id);
            }else if($this->ion_auth->in_group($this->config->item('Administrator')) || $this->ion_auth->in_group($this->config->item('Pañolero'))){
              $this->data['vales_consumo'] = $this->Vales_consumo_model->get_all_vales_consumo();
            }else if($this->ion_auth->in_group($this->config->item('Aprobador'))){

            }else{
            $this->session->set_flashdata('error', 'No Tiene permisos para realizar esta acción');
                    redirect('/');
            }
            $this->data['_view'] = 'vales_consumo/index';
            $this->load->view('layouts/main',$this->data);
    }




function testing(){
    $result = $this->input->post('search_data');
    echo print_r($result);
}


    function preparar($id_vale =  null){
      $group = array($this->config->item('Aprobador'), $this->config->item('Pañolero'));
            if($this->ion_auth->in_group($group) && $this->ion_auth->RolCheck($this->config->item('PrepararVale'))){
                if(!isset($id_vale)){
                    $id_vale = $this->input->post('id_vale');
                }

                 $this->data['vale'] = $this->Vales_consumo_model->get_vales_consumo($id_vale);

                  if(isset($this->data['vale']['id_vale']))
                    {

                        $this->form_validation->set_rules('cantidad','Cantidad','required');

                            if($this->form_validation->run()){
                                $update_articulo_por_vale = array(
                                             'id_vale'       => $id_vale,
                                             'id_articulo_por_vale'   => $this->input->post('articulo'),
                                             'cantidad_entregado'      => $this->input->post('cantidad'),
                                );

                            if($this->Articulo_model->update_articulo_por_vale($update_articulo_por_vale,$this->config->item('Cargado'))){
                                $this->session->set_flashdata('success','Item Agregado Flama');
                                redirect('vales_consumo/preparar/'.$id_vale);
                            }


                            }
                            $this->data['estado']         = $this->Estado_entrega_model->get_all_estado_entrega();
                            $this->data['aprobacion']     = $this->Evolucion_vale_model->get_aprobacion_vale($id_vale);
                            $this->data['evolucion']      = $this->Evolucion_vale_model->get_evolucion_vale($id_vale);
                            $this->data['items']          = $this->Articulo_model->get_articulo_por_vale($id_vale,$this->config->item('Pendiente'));
                            $this->data['items_cargados'] = $this->Articulo_model->get_articulo_por_vale($id_vale,$this->config->item('Cargado'));
                            $this->data['_view'] = 'vales_consumo/preparacion';
                            $this->load->view('layouts/main',$this->data);




                    }else{
                        $this->session->set_flashdata('error','El vale que esta intentando Preparar no existe. ');
                         redirect('vales_consumo/index');
                    }



            }else{
              $this->session->set_flashdata('error','No tiene permiso para realizar esta acción.');
               redirect('vales_consumo/index');
            }
    }


    /*
    *   Funcion que llamo con AJAX para actualizar el estado de un vale
    *
    */

    function update_item_vale(){
        $update_articulo_por_vale = array(
                                     'id_vale'                 => $this->input->post('id_vale'),
                                     'id_articulo_por_vale'    => $this->input->post('id_articulo'),
                                     'cantidad_entregado'      => $this->input->post('cantidad'),
                                );
                           $descripcion = $this->Articulo_model->get_articulo($this->input->post('id_articulo'));
                            if($this->Articulo_model->update_articulo_por_vale($update_articulo_por_vale,$this->config->item('Cargado'))){
                                $html = '<tr id=fila'.$this->input->post('num_articulo').'>';
                                        $html .= '<th>'.$this->input->post('num_articulo').'</th>';
                                         $html .= '<th>'.$descripcion['descripcion1'].'</th>';
                                         $html .= '<th>'.$this->input->post('cant_max').'</th>';
                                         $html .= '<th>'.$this->input->post('cantidad').'</th>';
                                          $html .= '<th>
                                            <button onclick="borrar_item_preparacion('.$this->input->post('id_vale').','.$this->input->post('id_articulo').','.$this->input->post('cant_max').')" class="btn btn-xs btn-danger">
                                                         <i class="glyphicon glyphicon-remove"></i>
                                                     </button>
                                          </th>';
                                      $html .= '</tr>';
                                            echo  $html;
                     }else{
                            echo  false;
                     }
                 }



     function remove_item_vale(){
                  $update_articulo_por_vale = array(
                                     'id_vale'                 => $this->input->post('id_vale'),
                                     'id_articulo_por_vale'    => $this->input->post('id_articulo'),
                                     'cantidad_entregado'      => 0,
                                );
                        $descripcion = $this->Articulo_model->get_articulo($this->input->post('id_articulo'));
                            if($this->Articulo_model->update_articulo_por_vale($update_articulo_por_vale,$this->config->item('Pendiente'))){

                                                    $html = '<tr id=fila'.$descripcion['num_articulo'].'>';
                                                    $html .= '<th>'.$descripcion['num_articulo'].'</th>';
                                                    $html .= '<th>'.$descripcion['descripcion1'].'</th>';
                                                    $html .= '<th>'.$this->input->post('cantidad').'</th>';
                                                    $html .= '<th>
                                                            <div class="col-xs-5"><input type="numeber" id="item'.$this->input->post('id_articulo').'" min=0 max='.$this->input->post('cantidad') .' class="form-control">
                                                            </div>
                                                            </th>';

                                                        $html .= '<th>
                                                                    <button onclick="agregar('.$this->input->post('id_articulo').','.$this->input->post('id_vale').','. $this->input->post('cantidad').','.$descripcion['num_articulo'].')" class="btn btn-xs btn-success">
                                                                     <i class="fa fa-check"></i>
                                                            </button>
                                                            </th>';

                                                    $html .= '</tr>';

                                                             echo  $html;
                             }else{
                                    echo  false;
                             }
                 }







    function armado()
    {
      $group = array($this->config->item('Administrator'), $this->config->item('Pañolero'));
            if($this->ion_auth->in_group($group)){
                $this->data['estado'] = $this->Estado_entrega_model->get_all_estado_entrega();

                //hago el Where aca, es muy villero, pero active record tiene algunas limitaciones en cuanto a querys tan especificas
                $where = 'id_aprobacion = '.$this->config->item('Aprobado').' and id_estado ='.$this->config->item('PendienteDeAprobacion').' OR id_estado ='.$this->config->item('EnProcesoDeArmado').' OR id_estado ='.$this->config->item('ListoParaRetirar');
                $this->data['vales_consumo'] = $this->Vales_consumo_model->get_all_vales_consumo_estado_by_estado($where);
                $this->data['_view'] = 'vales_consumo/armado';
                $this->load->view('layouts/main',$this->data);
            }else{
              $this->session->set_flashdata('error','No tiene permiso para realizar esta acción.');
               redirect('vales_consumo/index');
            }
    }
    function UpdateStatusArmado(){
        $user = $this->ion_auth->user()->row();
            if ($this->uri->segment(3) && $this->uri->segment(4)){
                $id_vale                =       $this->uri->segment(3);
                $id_estado_entrega      =       $this->uri->segment(4);

                    if(
                        $id_estado_entrega==$this->config->item('Deshabilitado')    ||
                        $id_estado_entrega==$this->config->item('EnProcesoDeCarga') ||
                        $id_estado_entrega==$this->config->item('PendienteDeAprobacion')
                    ){

                    $this->session->set_flashdata('error','No se puede actualizar un Vale a ese estado.');
                         redirect('vales_consumo/armado');

                }

                $evolucion_vale = array(
                    'id_vale_evolucion'   => $id_vale,
                    'id_estado'           => $id_estado_entrega,
                    'fecha'               => time(),
                    'id_responsable'      => $user->id,
                    );
                $actualizacion_vale = array(
                    'id_estado'     => $id_estado_entrega,
                );


            if($this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale) && $this->Vales_consumo_model->update_vales_consumo($id_vale,$actualizacion_vale)){


                    $this->session->set_flashdata('success','Vale Actualizado correctamente');
                     redirect('vales_consumo/armado');
                }

            }else{
                 $this->session->set_flashdata('error','Ocurrió un error al actualizar el Vale');
                         redirect('vales_consumo/armado');
            }

    }


    function aprobaciones()
    {

        $group = array($this->config->item('Administrator'), $this->config->item('Pañolero'),$this->config->item('Aprobador'));
            if($this->ion_auth->in_group($group)){
                if($this->ion_auth->RolCheck($this->config->item('AprobarVales'))){

                    $this->data['estado'] = $this->Estado_entrega_model->get_all_estado_aprobacion();
                    $this->data['vales_consumo'] = $this->Vales_consumo_model->get_all_vales_consumo_estado($this->config->item('Pendiente'));
                    $this->data['_view'] = 'vales_consumo/aprobaciones';
                    $this->load->view('layouts/main',$this->data);


                }
            }else{
              $this->session->set_flashdata('error','No tiene permiso para realizar esta acción.');
               redirect('vales_consumo/index');
            }
    }

    function UpdateStatusAprobacion(){
        $user = $this->ion_auth->user()->row();
         $this->form_validation->set_rules('id_vale','Id del Vale','required');
         $this->form_validation->set_rules('estado','Estado','required');

        if($this->form_validation->run()){

                $id_vale                =       $this->input->post('id_vale');
                $id_estado_aprobacion   =       $this->input->post('estado');

                    if($id_estado_aprobacion==$this->config->item('Pendiente')){
                    $this->session->set_flashdata('error','No se puede actualizar un Vale a estado Pendiente.');
                         redirect('vales_consumo/aprobaciones');

                }elseif($id_estado_aprobacion==$this->config->item('Aprobado')){

                    $aprobacion = $this->config->item('Aprobado');
                    $estado =  $this->config->item('EnProcesoDeArmado');

                    }else{

                            $aprobacion = $this->config->item('Rechazado');
                            $estado =   $this->config->item('Deshabilitado');

                    }

                $evolucion_vale = array(
                    'id_vale_evolucion'   => $id_vale,
                    'id_estado'           => $estado,
                    'fecha'               => time(),
                    'id_responsable'      => $user->id,
                    );
                $aprobacion_vale = array(
                    'id_vale_aprobacion'             => $id_vale,
                    'id_estado_aprobacion'           => $aprobacion,
                    'fecha_aprobacion'               => time(),
                    'id_responsable_aprobacion'      => $user->id,
                    'comentarios_aprobacion'         => $this->input->post('comment'),
                    );
                $actualizacion_vale = array(
                    'id_estado'     => $estado,
                    'id_aprobacion' => $aprobacion,
                );


            if($this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale) && $this->Vales_consumo_model->update_vales_consumo($id_vale,$actualizacion_vale) && $this->Evolucion_vale_model->add_aprobacion_vale($aprobacion_vale)){
                    $this->session->set_flashdata('success','Vale Actualizado correctamente');
                     redirect('vales_consumo/aprobaciones');
                }

            }else{
                 $this->session->set_flashdata('error','Ocurrió un error al actualizar el Vale');
                         redirect('vales_consumo/aprobaciones');
            }

    }



    /*
     * Veo un vale de consumo
     *  Recibo el ID del vale y cargo todos los atributos
     */

    function view($id_vale =  null){
            if($this->ion_auth->RolCheck($this->config->item('VerVale'))){

                $this->data['vale'] = $this->Vales_consumo_model->get_vales_consumo($id_vale);

                    if(isset($this->data['vale']['id_vale']))
                    {
                        $this->data['aprobacion']     = $this->Evolucion_vale_model->get_aprobacion_vale($id_vale);
                        $this->data['evolucion']      = $this->Evolucion_vale_model->get_evolucion_vale($id_vale);
                        $this->data['items']          = $this->Articulo_model->get_articulo_por_vale($id_vale);
                        $this->data['_view']          = 'vales_consumo/view';
                        $this->load->view('layouts/main',$this->data);

                    }else{
                        $this->session->set_flashdata('error','El vale que esta intentando visualizar no existe. ');
                         redirect('vales_consumo/index');
                    }
            }
    }

    function add(){
        $this->data['all_productos'] = $this->Articulo_model->get_all_articulos($params = array('status' => $this->config->item('Activo')));
        $this->data['all_sector_req'] = $this->Jerarquia_model->get_sector_user($this->user->id);
        $this->data['_view'] = 'vales_consumo/new';
        $this->load->view('layouts/main',$this->data);
    }


    function new_create(){
        $datos_user = $this->input->post('datos_user');
        $total_items = $this->input->post('total_items');
        $sector = $this->input->post('sector');

    $params = array(
     'id_requeridor'                 => $this->user->id,
     'id_sector'                     => $datos_user['id_sector'],
     'fecha_creado'                  => time(),
     'id_estado'                     => $this->config->item('PendienteDeAprobacion'),
     'id_aprobacion'                 => $this->config->item('Pendiente'),
    );

     $vales_consumo_id = $this->Vales_consumo_model->add_vales_consumo($params);

if($vales_consumo_id){
     $evolucion_vale = array(
         'id_vale_evolucion'          => $vales_consumo_id,
         'id_estado'                  => $this->config->item('PendienteDeAprobacion'),
         'fecha'                      => time(),
         'id_responsable'             => $this->user->id,
     );
     $aprobacion_vale = array(
             'id_vale_aprobacion'             => $vales_consumo_id,
             'id_estado_aprobacion'           => $this->config->item('Pendiente'),
             'fecha_aprobacion'               => time(),
             'id_responsable_aprobacion'      => $this->user->id,
     );
    $this->Evolucion_vale_model->add_aprobacion_vale($aprobacion_vale);
      $this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale);
      foreach ($total_items as $items ) {
          $articulos_por_vale = array(
                  'id_vale_articulos'          => $vales_consumo_id,
                  'id_articulo_por_vale'       => $items['id_item'],
                  'cantidad'                   => $items['cantidad'],
                  'estado_entrega_item'        => $this->config->item('Pendiente'),
          );
          $this->Articulo_model->add_articulo_por_vale($articulos_por_vale);

      }
      //sleep(1);
      /*
      * Aca reviso si el usuario quiere ser notificado o no, y le envio un mail.
      */
      if($this->Notificaciones_user_model->get_notifications_settings($this->user->id, $this->config->item('Nuevo_Vale'))){
          $this->generales->Notify_owner($total_items, $vales_consumo_id, $sector);
      }

      if(empty($this->generales->Notify_responsible($total_items, $vales_consumo_id, $sector))){
          $this->session->set_flashdata('warning','Vale Creado correctamente! ID del Vale: '.$vales_consumo_id.'. El sector '.$sector.' no tiene usuarios cargados para habilitar el vale.');
      }else{
          $this->session->set_flashdata('success','Vale Creado correctamente! ID del Vale: '.$vales_consumo_id);
      }

      echo $vales_consumo_id;
    }else{
         $this->session->set_flashdata('danger','Ha ocurrido un error. Intente nuevamente.');
        echo false;

    }
}
function test(){
    $result = $this->Notificaciones_user_model->get_notifications_settings($this->user->id, $this->config->item('Nuevo_Vale'));
    print_r($result);
}

    /*
     * Adding a new vales_consumo
     */
    // function add(){
    //     if($this->ion_auth->RolCheck($this->config->item('NuevoVale'))){
    //
    //     $this->form_validation->set_rules('cantidad','Cantidad','required');
    //
    //     if($this->form_validation->run()){
    //         if($this->input->post('corrida')==1){
    //
    //              $params = array(
    //             'id_requeridor'                 => $this->user->id,
    //             'id_sector'                     => $this->input->post('id_sector'),
    //             'fecha_creado'                  => time(),
    //             'id_estado'                     => $this->config->item('EnProcesoDeCarga'),
    //         );
    //
    //             $vales_consumo_id = $this->Vales_consumo_model->add_vales_consumo($params);
    //
    //
    //
    //             $evolucion_vale = array(
    //                 'id_vale_evolucion'          => $vales_consumo_id,
    //                 'id_estado'                  => $this->config->item('EnProcesoDeCarga'),
    //                 'fecha'                      => time(),
    //                 'id_responsable'             => $this->user->id,
    //         );
    //              $this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale);
    //
    //
    //         }else{
    //             $vales_consumo_id = $this->input->post('vales_consumo_id');
    //             }
    //
    //         $articulos_por_vale = array(
    //                 'id_vale_articulos'          => $vales_consumo_id,
    //                 'id_articulo_por_vale'       => $this->input->post('articulo'),
    //                 'cantidad'                   => $this->input->post('cantidad'),
    //                 'estado_entrega_item'        => $this->config->item('Pendiente'),
    //         );
    //          //una vez que ya generé el vale deshabilito algunos campos para que no hagan lio
    //         $this->data['disabled'] = 'disabled';
    //
    //         $this->Articulo_model->add_articulo_por_vale($articulos_por_vale);
    //
    //             $this->data['items'] = $this->Articulo_model->get_articulo_por_vale($vales_consumo_id);
    //             $this->data['vales_consumo_id'] = $vales_consumo_id;
    //
    //     }
    //
    //             $this->data['all_productos'] = $this->Articulo_model->get_all_articulos($params = array('status' => $this->config->item('Activo')));
    //             $this->data['all_sector_req'] = $this->Jerarquia_model->get_sector_user($this->user->id);
    //             $this->data['_view'] = 'vales_consumo/add';
    //             $this->load->view('layouts/main',$this->data);
    //
    //     }
    // }

      /*
        *   Cargo el vale que genero el usuario
        *
        *
        */

    function create($id_vale){
         $user = $this->ion_auth->user()->row();
            $evolucion_vale = array(
                    'id_vale_evolucion'   => $id_vale,
                    'id_estado'           => $this->config->item('PendienteDeAprobacion'),
                    'fecha'               => time(),
                    'id_responsable'      => $user->id,
            );
            $aprobacion_vale = array(
                    'id_vale_aprobacion'             => $id_vale,
                    'id_estado_aprobacion'           => $this->config->item('Pendiente'),
                    'fecha_aprobacion'               => time(),
                    'id_responsable_aprobacion'      => $user->id,
            );

            $params = array(
                    'id_estado'     => $this->config->item('PendienteDeAprobacion'),
                    'id_aprobacion' => $this->config->item('Pendiente'),
                );
    if($this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale) && $this->Vales_consumo_model->update_vales_consumo($id_vale,$params) && $this->Evolucion_vale_model->add_aprobacion_vale($aprobacion_vale)){


      /*
      Argumentos que envio al mail

      */
                  $mail['id_vale'] = $id_vale;
                  $mail['fecha'] = time();
                  $mail['id_responsable'] = $user->id;
                  $mail['user'] = $user;
                  $mail['view'] = $this->config->item('templates').$this->config->item('Nuevo_Vale');
                  $this->generales->Send_mails($mail);



                  /*  $this->session->set_flashdata('success','Vale Creado correctamente! ID del Vale: '.$id_vale);
                     redirect('vales_consumo/index');
*/


                }else{
                   $this->session->set_flashdata('error','Ocurrió un error al crear el vale, intente nuevamente.');
                   redirect('vales_consumo/index');
                }

    }
    /*
    * Funcion que llamo desde AJAX para actualizar el estado de preparacion de un vale
    * La llamo desde preparacion.php
    */
    function update_status(){
      $evolucion_vale = array(
              'id_vale_evolucion'       => $this->input->post('id_vale'),
              'id_estado'               => $this->input->post('status'),
              'fecha'                   => time(),
              'id_responsable'          => $this->user->id,
              'observacion'             => $this->input->post('comments')
      );
      $params = array(
          'id_estado' => $this->input->post('status'),
      );

      if($this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale) && $this->Vales_consumo_model->update_vales_consumo($this->input->post('id_vale'),$params)){
            echo $this->Estado_entrega_model->get_estado_entrega($this->input->post('status'))->nombre_estado;
      }else{
        echo false;
      }

    }




        /*
        *   Elimino los vales que no se terminaron de cargar
        *
        */
      function delete_tmp($id_vale){
        $user = $this->ion_auth->user()->row();
            $evolucion_vale = array(
                    'id_vale_evolucion'       => $id_vale,
                    'id_estado'     => $this->config->item('Deshabilitado'),
                    'fecha'         => time(),
                    'id_responsable'=> $user->id,
            );
                $params = array(
                    'id_estado' => $this->config->item('Deshabilitado'),
                );
                if($this->Evolucion_vale_model->add_evolucion_vale($evolucion_vale) && $this->Vales_consumo_model->update_vales_consumo($id_vale,$params)){
                     redirect('vales_consumo/index');
                }

    }



    /*
    *   Funcion que llamo con AJAX para eliminar items de un vale pre cargado
    *
    */
    function delete_item(){
         $tmp = array(
                'id_vale_articulos'     => $this->input->post('id_vale'),
                'id_articulo_por_vale'  => $this->input->post('id_articulo')
            );

          if ($this->Articulo_model->delete_tmp($tmp)){
                  echo   true;
        }else{
                echo  false;
            }


    }

    /*
    *   Funcion que llamo con AJAX para traer la unidad de medida de un articulo
    */
    function get_un_med(){
     $result = $this->Articulo_model->get_un_medida($this->input->post('search_data'));
        if (!empty($result)){
            foreach ($result as $row){
                    echo   $row->un_medida;
             }
        }
         else{
                echo  "No se encontro UN";
            }
    }
}
