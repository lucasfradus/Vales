<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Sector_req_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get sector_req by id_sector_req
     */
    function get_sector_req($id_sector_req)
    {
        return $this->db->get_where('sector_req',array('id_sector_req'=>$id_sector_req))->row_array();
    }
        
    /*
     * Get all sector_req
     */
    function get_all_sector_req()
    {
        $this->db->order_by('id_sector_req', 'desc');
        return $this->db->get('sector_req')->result_array();
    }
        
    /*
     * function to add new sector_req
     */
    function add_sector_req($params)
    {
        $this->db->insert('sector_req',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update sector_req
     */
    function update_sector_req($id_sector_req,$params)
    {
        $this->db->where('id_sector_req',$id_sector_req);
        return $this->db->update('sector_req',$params);
    }
    
    /*
     * function to delete sector_req
     */
    function delete_sector_req($id_sector_req)
    {
        return $this->db->delete('sector_req',array('id_sector_req'=>$id_sector_req));
    }
}
