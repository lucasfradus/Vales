<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Articulo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get articulo by id_articulo
     */
    function get_articulo($id_articulo)
    {
        $this->db->select('id_articulo,num_articulo,descripcion1,descripcion2,tipo_linea,tipo_almacenamiento,articulos.status, pto_venta, texto_busqueda');
        $this->db->select('f1.nombre_categoria AS FK_Familia');
        $this->db->join('fk_categorias f1', 'f1.id_fk_categoria = articulos.fk_codigo_familia','left');

        $this->db->select('f2.nombre_categoria AS FK_Cod1');
        $this->db->join('fk_categorias f2', 'f2.id_fk_categoria = articulos.fk_codigo_cat1','left');

        $this->db->select('f3.nombre_categoria AS FK_Cod2');
        $this->db->join('fk_categorias f3', 'f3.id_fk_categoria = articulos.fk_codigo_cat2','left');

        $this->db->select('f4.nombre_categoria AS FK_Cod3');
        $this->db->join('fk_categorias f4', 'f4.id_fk_categoria = articulos.fk_codigo_cat3','left');

        $this->db->select('nom_cat_lm AS FK_Cat_LM');
        $this->db->join('fk_categorias_lm', 'fk_categorias_lm.id_cat_lm = articulos.fk_codigo_lm');

       $this->db->select('u1.un_medida AS UN_Medida_1');
       $this->db->select('u2.un_medida AS UN_Medida_2');
       $this->db->join('fk_un_med u1', 'u1.id_un_medida = articulos.id_un_med1');
       $this->db->join('fk_un_med u2', 'u2.id_un_medida = articulos.id_un_med2');
        return $this->db->get_where('articulos',array('id_articulo'=>$id_articulo))->row_array();
    }

    function get_articulo_by_number($id_articulo)
    {
        return $this->db->get_where('articulos',array('num_articulo'=>$id_articulo))->row_array();
    }


    function get_un_medida($id_articulo)
    {
        $array = array(
            'id_articulo'=>$id_articulo,
        );
            $this->db->select('un_medida');
            $this->db->join('fk_un_med', 'id_un_medida = articulos.id_un_med1');
            $this->db->where($array);
         return $this->db->get('articulos')->result();

        //return  $this->db->last_query();
    }



 function delete_tmp($params){
         $this->db->delete('articulos_x_vale',$params);
         return $this->db->last_query();
    }



    /*
     * Get articulo x vale by id_articulo
     */
    function get_articulo_por_vale($vales_consumo_id, $status = null)
    {
        if(isset($status)){
            $this->db->where('estado_entrega_item', $status);

        }
       $this->db->join('articulos', 'id_articulo_por_vale = articulos.id_articulo');
        $this->db->where('id_vale_articulos', $vales_consumo_id);

        return $this->db->get('articulos_x_vale')->result();
    }

      function dynamic_update($name,$value,$pk){
          $params = array(
              $name => $value
          );
          $this->db->where('id_articulo',$pk);
          if($this->db->update('articulos',$params)){
            return  $response = array(
                  'success' => true,
              );

          }else{
             return $response = array(
                  'success' => false,
                  'msg' => 'Ocurrió un error al modificar el campo.'
              );
          }

      }





       /*
     * function to add new articulo x vale
     */
    function add_articulo_por_vale($params)
    {
        $this->db->select('cantidad');
        $this->db->where('id_vale_articulos', $params['id_vale_articulos']);
        $this->db->where('id_articulo_por_vale', $params['id_articulo_por_vale']);

        $result = $this->db->get('articulos_x_vale')->result();

            if($result){
                //si entro acá quiere decir que ya se ha cargado ese articulo en este vale, en lugar de cargarlo nuevamente, lo actualizo

                foreach($result as $r){
                $cantidad = $r->cantidad;
            }
                $this->db->where('id_vale_articulos', $params['id_vale_articulos']);
                 $this->db->where('id_articulo_por_vale', $params['id_articulo_por_vale']);

                 $params['cantidad'] += $cantidad;
                return $this->db->update('articulos_x_vale',$params);


            }else{
                //si entro aca, el articulo aun no existe en este vale, por lo tanto lo cargo
                return  $this->db->insert('articulos_x_vale',$params);
            }

    }


    public function get_autocomplete($search_data, $number, $category,$type)
    {
    //Si el vale es de PAÑOL, muestro los items con pto_venta 99, si es de mprima, 98.
        if(strcmp($type, $this->config->item('Tipo_Pañol')) === 0){
            $this->db->where('pto_venta', $this->config->item('Tipo_Pañol_codigo'));
                }else{
                $this->db->where('pto_venta', $this->config->item('Tipo_mprimas_codigo'));
        }

        if(isset($category)){
            $this->db->like('num_articulo', $category, 'after');
        }

        if(isset($number)){
        $this->db->like('num_articulo', $number, 'after');
        $this->db->where('status', $this->config->item('Activo'));
        $this->db->group_start();
            $this->db->like('descripcion1', $search_data);
            $this->db->or_like('descripcion2',  $search_data);
        $this->db->group_end();

        }else{
            $this->db->or_like('num_articulo', $search_data);
            $this->db->or_like('descripcion1', $search_data);
            $this->db->or_like('descripcion2', $search_data);
        }

        $this->db->where('status', $this->config->item('Activo'));
        return $this->db->get('articulos')->result_array();
    }

    public function get_autocomplete_articles($search_data)
    {
        $this->db->or_like('num_articulo', $search_data);
        $this->db->or_like('descripcion1', $search_data);
        $this->db->or_like('descripcion2', $search_data);
        $this->db->where('status', $this->config->item('Activo'));
        return $this->db->get('articulos')->result_array();
    }

    public function get_autocomplete_test( $number, $search_data, $category)
    {

        // $query = 'SELECT num_articulo, descripcion1, descripcion2 FROM articulos WHERE num_articulo LIKE '.$number.%' AND (descripcion1 LIKE '%'.$search_data.'%' OR descripcion2 LIKE '%'.$search_data.'%')';
        $this->db->like('num_articulo', $number, 'after');
        $this->db->where('status', $this->config->item('Activo'));
        $this->db->where('(descripcion1 LIKE "%'.$search_data.'%" OR descripcion2 LIKE "%'.$search_data.'%")');

        return $this->db->get('articulos')->result_array();

    }



public function get_autocomplete_uno($search_data)
{
    $this->db->like('descripcion1', $search_data);
    $this->db->or_like('descripcion2', $search_data);
    $this->db->or_like('num_articulo', $search_data);
    return $this->db->get('articulos', 1)->result();
}


      /*
     * Get all articulos count
     */
    function get_all_articulos_count()
    {
        $this->db->from('articulos');
        return $this->db->count_all_results();
    }

    /*
     * Get all articulos
     */
       function get_all_articulos($params = array())
    {
        $this->db->select('id_articulo,num_articulo,descripcion1,descripcion2,tipo_linea,tipo_almacenamiento,articulos.status, pto_venta, texto_busqueda,nom_cat_lm');

       $this->db->select('f1.nombre_categoria AS FK_Familia');
       $this->db->join('fk_categorias f1', 'f1.id_fk_categoria = articulos.fk_codigo_familia','left');

       $this->db->select('f2.nombre_categoria AS FK_Cod1');
       $this->db->join('fk_categorias f2', 'f2.id_fk_categoria = articulos.fk_codigo_cat1','left');

       $this->db->select('f3.nombre_categoria AS FK_Cod2');
       $this->db->join('fk_categorias f3', 'f3.id_fk_categoria = articulos.fk_codigo_cat2','left');

       $this->db->select('f4.nombre_categoria AS FK_Cod3');
       $this->db->join('fk_categorias f4', 'f4.id_fk_categoria = articulos.fk_codigo_cat3','left');

       $this->db->select('u1.un_medida AS UN_Medida_1');
       $this->db->join('fk_un_med u1', 'u1.id_un_medida = articulos.id_un_med1');

       $this->db->select('u2.un_medida AS UN_Medida_2');
       $this->db->join('fk_un_med u2', 'u2.id_un_medida = articulos.id_un_med2');

       $this->db->join('fk_categorias_lm', 'id_cat_lm = fk_codigo_lm');


        $this->db->order_by('id_articulo', 'asc');
        if(isset($params['limit']) && !empty($params['limit']))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        if(isset($params['status']) && !empty($params['status']))
        {
            $this->db->where('status', $params['status']);
        }

        return $this->db->get('articulos')->result_array();
    }

    /*
     * Parametros que recibo
     $params = array(
               'id_un_med1' => $this->input->post('id_un_med1'),
               'id_un_med2' => $this->input->post('id_un_med2'),
               'num_articulo' => $this->input->post('num_articulo'),
               'descripcion1' => $this->input->post('descripcion1'),
               'descripcion2' => $this->input->post('descripcion2'),
               'status' => $this->input->post('status'),
           );

     */
    function add_articulo($params)
    {
        $this->db->insert('articulos',$params);
        return $this->db->insert_id();
    }


    /*
     * function to update articulo
     */
    function update_articulo($id_articulo,$params)
    {
        $this->db->where('id_articulo',$id_articulo);
        return $this->db->update('articulos',$params);
    }


    /*
     * function to update articulo x vale
     */
    function update_articulo_por_vale($params,$status)
    {
        $where = array(
           'id_vale_articulos'              => $params['id_vale'],
           'id_articulo_por_vale' => $params['id_articulo_por_vale'],
        );
        $update = array(
            'cantidad_entregada' => $params['cantidad_entregado'],
            'estado_entrega_item' => $status,
        );

        $this->db->where($where);
        return $this->db->update('articulos_x_vale',$update);
    }


    /*
     * function to add new articulo x vale
     */
    function add_articulo_por_vale_entregado($params)
    {
        $this->db->insert('articulos_x_vale_entregado',$params);
        return $this->db->insert_id();

    }









    /*
     * function to delete articulo
     */
    function delete_articulo($id_articulo)
    {
        return $this->db->delete('articulos',array('id_articulo'=>$id_articulo));
    }
}
