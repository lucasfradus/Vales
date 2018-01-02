<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Role_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get role by id_rol
     */
    function get_role($id_rol)
    {
        return $this->db->get_where('roles',array('id_rol'=>$id_rol))->row_array();
    }
        
    /*
     * Get all roles
     */
    function get_all_roles()
    {
        $this->db->order_by('id_rol', 'desc');
        return $this->db->get('roles')->result_array();
    }
        
    /*
     * function to add new role
     */
    function add_role($params)
    {
        $this->db->insert('roles',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update role
     */
    function update_role($id_rol,$params)
    {
        $this->db->where('id_rol',$id_rol);
        return $this->db->update('roles',$params);
    }
    
    /*
     * function to delete role
     */
    function delete_role($id_rol)
    {
        return $this->db->delete('roles',array('id_rol'=>$id_rol));
    }
}
