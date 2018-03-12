<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Vales_consumo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }




    /*
     * Get vales_consumo by id_vale
     */
    function get_vales_consumo($id_vale)
    {
        $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
        $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
        $this->db->join('users','id = id_requeridor' );
        $this->db->join('sector_req','id_sector_req = id_sector' );

        return $this->db->get_where('vales_consumo',array('id_vale'=>$id_vale))->row_array();
    }


/*
* Uso: Dashboard
*
SELECT
 COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Priority1,
    COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Priority2,
`id_aprobacion`, `nombre_estado_aprobacion`, `id_vale`, `username`, `nombre_sector`, `fecha_creado`
FROM `vales_consumo`
JOIN `estado_aprobacion` ON `id_estado_aprobacion_fk` = `id_aprobacion`
JOIN `estado_entrega` ON `id_estado_entrega` = `id_estado`
JOIN `users` ON `id` = `id_requeridor`
JOIN `articulos_x_vale` ON `id_vale` = `id_vale_articulos`
JOIN `sector_req` ON `id_sector_req` = `id_sector`
GROUP BY `id_vale_articulos` ORDER BY `id_vale` DESC


*/
       function get_latest_vales_consumo($user =  null)
    {


      $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
      $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
      $this->db->select('COUNT(estado_entrega_item) AS total_items');
      $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_requeridor');
        $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
        $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
        $this->db->join('users','id = id_requeridor' );
        $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
        $this->db->join('sector_req','id_sector_req = id_sector' );
        $this->db->order_by('id_vale', 'desc');
        $this->db->group_by('id_vale');
        if(isset($user)){
            $this->db->where('id_requeridor =', $user);
        }
        return $this->db->get('vales_consumo', 5)->result_array();
    }

          function get_latest_vales_consumo_by_sector($sectores)
    {


      $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
      $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
      $this->db->select('COUNT(estado_entrega_item) AS total_items');
      $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_requeridor');
        $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
        $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
        $this->db->join('users','id = id_requeridor' );
        $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
        $this->db->join('sector_req','id_sector_req = id_sector' );
        $this->db->order_by('id_vale', 'desc');
        $this->db->group_by('id_vale');
        if(isset($sectores)){
          foreach ($sectores as $s) {
            $this->db->or_where('id_sector',$s->id_sector_jerarquia);
          }
        }
        return $this->db->get('vales_consumo', 5)->result_array();
    }
      /*
      * Traigo los vales de consumo correspondientes al usuario que esta logueado
      * Uso: Index Vales_consumo
      * Condiciones: el usuario debe tener perfil de requeridor unicamente.  Para el resto de los perfiles, busco por sector.
      */

      function get_my_vales_consumo($user_id)
      {
            $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
            $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
            $this->db->select('COUNT(estado_entrega_item) AS total_items');
            $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_requeridor');
            $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
            $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
            $this->db->join('users','id = id_requeridor' );
            $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
            $this->db->join('sector_req','id_sector_req = id_sector' );
            $this->db->order_by('id_vale', 'desc');
            $this->db->group_by('id_vale');
            $this->db->where('id_requeridor', $user_id);

              return $this->db->get('vales_consumo')->result_array();

      }

    /*
     * Devuelve todos los vales de consumo creados.
     * puede recibir dos parametros
     * status = traerá todos los vales que posean el status enviado
     * Uso: Dashboard
     *
     */
    function get_all_vales_consumo($status = null)
    {
       $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
      $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
      $this->db->select('COUNT(estado_entrega_item) AS total_items');
      $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_requeridor');
        $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
        $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
        $this->db->join('users','id = id_requeridor' );
        $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
        $this->db->join('sector_req','id_sector_req = id_sector' );

        if(isset($status)){
            $this->db->where('id_estado =', $status);
        }



        $this->db->order_by('id_vale', 'desc');
        $this->db->group_by('id_vale');
        return $this->db->get('vales_consumo')->result_array();
    }

      function get_all_vales_consumo_estado_by_estado($where){
        $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
        $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
        $this->db->select('COUNT(estado_entrega_item) AS total_items');
        $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_estado, id_requeridor');
        $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
        $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
        $this->db->join('users','id = id_requeridor' );
        $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
        $this->db->join('sector_req','id_sector_req = id_sector' );
        $this->db->where($where);
        $this->db->order_by('id_vale', 'desc');
        $this->db->group_by('id_vale');

        return $this->db->get('vales_consumo')->result_array();
      }



  function get_all_vales_consumo_estado($status, $armado = null){
      $this->db->select('COUNT(CASE WHEN estado_entrega_item=1 THEN 1 END) AS Cargado,');
      $this->db->select('COUNT(CASE WHEN estado_entrega_item=0 THEN 1 END) AS Pendiente');
      $this->db->select('COUNT(estado_entrega_item) AS total_items');
      $this->db->select('id_aprobacion, nombre_estado_aprobacion, id_vale, username, nombre_sector, fecha_creado, nombre_estado, id_requeridor');
      $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_aprobacion' );
      $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
      $this->db->join('users','id = id_requeridor' );
      $this->db->join('articulos_x_vale','id_vale_articulos = id_vale' );
      $this->db->join('sector_req','id_sector_req = id_sector' );
      $this->db->where('id_aprobacion ', $status);
        if(isset($armado)){
          $this->db->or_where($armado);
        }
        $this->db->order_by('id_vale', 'desc');
        $this->db->group_by('id_vale');
        return $this->db->get('vales_consumo')->result_array();
    }

    /*
     * Cuenta los vales segun los parametros que recibo
     */
    function get_all_vales_count($id_aprobacion, $id_estado = null, $sectores = null)
    {
        $this->db->where('id_aprobacion', $id_aprobacion);

        if(isset($sectores)){
           $where = '';
           $total = count($sectores);
           $i=1;
              foreach ($sectores as $s){
                $where .= "id_sector='$s->id_sector_jerarquia'";
                    if($i<$total){
                      $where .= " OR ";
                    }
                 $i++;
              }
             $this->db->where($where);
        }

        if(isset($id_estado)){
            $this->db->where('id_estado',$id_estado);
        }

        $this->db->from('vales_consumo');
        return $this->db->count_all_results();
    }

    /*
     * Cuenta los vales segun los parametros que recibo
     */
    function get_all_vales_count_array($array)
    {
        if(isset($array['id_aprobacion'])){
            $this->db->where('id_aprobacion', $array['id_aprobacion']);
        }

        if(isset($array['sectores'])){
           $where = '';
           $total = count($array['sectores']);
           $i=1;
              foreach ($array['sectores'] as $s){
                $where .= "id_sector='$s->id_sector_jerarquia'";
                    if($i<$total){
                      $where .= " OR ";
                    }
                 $i++;
              }
             $this->db->where($where);
        }

        if(isset($array['id_estado'])){
            $this->db->where('id_estado',$array['id_estado']);
        }

        $this->db->from('vales_consumo');
        return $this->db->count_all_results();
    }



    /*
     * function to add new vales_consumo
     */
    function add_vales_consumo($params)
    {
        $this->db->insert('vales_consumo',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update vales_consumo
     */
    function update_vales_consumo($id_vale,$params)
    {
        $this->db->where('id_vale',$id_vale);
        return $this->db->update('vales_consumo',$params);
    }

    /*
     * function to delete vales_consumo
     */
    function delete_vales_consumo($id_vale)
    {
        return $this->db->delete('vales_consumo',array('id_vale'=>$id_vale));
    }

}
