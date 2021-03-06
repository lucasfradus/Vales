<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Evolucion_vale_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get evolucion_vale by 
     */
    function get_evolucion_vale($id)
    {
         $this->db->join('estado_entrega','id_estado_entrega = id_estado' );
         $this->db->join('users','id = id_responsable' );
        return $this->db->get_where('evolucion_vale',array('id_vale_evolucion'=>$id))->result();
    }


  function get_aprobacion_vale($id)
    {
         $this->db->join('estado_aprobacion','id_estado_aprobacion_fk = id_estado_aprobacion' );
         $this->db->join('users','id = id_responsable_aprobacion' );
        return $this->db->get_where('evolucion_aprobacion',array('id_vale_aprobacion'=>$id))->result();
    }




        
    /*
     * Get all evolucion_vale
     */
    function get_all_evolucion_vale()
    {
        $this->db->order_by('', 'desc');
        return $this->db->get('evolucion_vale')->result_array();
    }
        
    /*
     * function to add new evolucion_vale
     */
    function add_evolucion_vale($params)
    {
        return $this->db->insert('evolucion_vale',$params);
    }
     /*
     * function to add new evolucion_aprobacion
     */
    function add_aprobacion_vale($params)
    {
        return $this->db->insert('evolucion_aprobacion',$params);
    }
    
    /*
     * function to update evolucion_vale
     */
    function update_evolucion_vale($id,$params)
    {
        $this->db->where('',$id);
        return $this->db->update('evolucion_vale',$params);
    }
    
    /*
     * function to delete evolucion_vale
     */
    function delete_evolucion_vale($id)
    {
        return $this->db->delete('evolucion_vale',array(''=>$id));
    }
}
