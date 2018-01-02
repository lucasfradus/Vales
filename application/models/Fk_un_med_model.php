<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Fk_un_med_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get fk_un_med by id_un_medida
     */
    function get_fk_un_med($id_un_medida)
    {
        return $this->db->get_where('fk_un_med',array('id_un_medida'=>$id_un_medida))->row_array();
    }
        
    /*
     * Get all fk_un_med
     */
    function get_all_fk_un_med()
    {
        $this->db->order_by('id_un_medida', 'desc');
        return $this->db->get('fk_un_med')->result_array();
    }
        
    /*
     * function to add new fk_un_med
     */
    function add_fk_un_med($params)
    {
        $this->db->insert('fk_un_med',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update fk_un_med
     */
    function update_fk_un_med($id_un_medida,$params)
    {
        $this->db->where('id_un_medida',$id_un_medida);
        return $this->db->update('fk_un_med',$params);
    }
    
    /*
     * function to delete fk_un_med
     */
    function delete_fk_un_med($id_un_medida)
    {
        return $this->db->delete('fk_un_med',array('id_un_medida'=>$id_un_medida));
    }
}