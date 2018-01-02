<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Roles_group_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get roles_group by 
     */
    function get_roles_group($id)
    {
        return $this->db->get_where('roles_group',array('id_rol_'=>$id))->row_array();
    }
        
    /*
     * Get all roles_group
     */
    function get_all_roles_group()
    {
         $this->db->join('users', 'user_id=id');
         $this->db->join('roles', 'role_id=id_rol');
        $this->db->order_by('id_rol_', 'desc');
        return $this->db->get('roles_groups')->result_array();
    }
        
    /*
     * function to add new roles_group
     */
    function add_roles_group($params)
    {
        $this->db->insert('roles_groups',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update roles_group
     */
    function update_roles_group($id,$params)
    {
        $this->db->where('id_rol_',$id);
        return $this->db->update('roles_groups',$params);
    }
    
    /*
     * function to delete roles_group
     */
    function delete_roles_group($id)
    {
        return $this->db->delete('roles_groups',array('id_rol_'=>$id));
    }
}
