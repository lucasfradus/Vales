<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Fk_categoria_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get fk_categoria by id_fk_categoria
     */
    function get_fk_categoria($id_fk_categoria)
    {
        return $this->db->get_where('fk_categorias',array('id_fk_categoria'=>$id_fk_categoria))->row_array();
    }

    /*
     * Get fk_un_med by id_un_medida
     */
    function get_fk_cat_by_name($array)
    {
        return $this->db->get_where('fk_categorias',$array)->row_array()['id_fk_categoria'];
    }
    /*
     * Get all fk_categorias
     */
    function get_all_fk_categorias_all()
    {
        $this->db->order_by('id_fk_categoria', 'asc');
        return $this->db->get('fk_categorias')->result_array();
    }

    /*
     * Get all fk_categorias
     */
    function get_all_fk_categorias($tipo)
    {
        $this->db->where('status', $this->config->item('Activo'));
        $this->db->order_by('id_fk_categoria', 'asc');
        return $this->db->get('fk_categorias')->result_array();
    }
    /*
     * Get all fk_categorias
     */
    function get_all_fk_categorias_codigo($category)
    {
        $this->db->where('status', $this->config->item('Activo'));
        $this->db->where('codigo_categoria', $category);
        $this->db->order_by('id_fk_categoria', 'asc');
        return $this->db->get('fk_categorias')->result_array();
    }

    /*
     * function to add new fk_categoria
     */
    function add_fk_categoria($params)
    {
        $this->db->insert('fk_categorias',$params);
        return $this->db->insert_id();
    }

    /*
     * function to update fk_categoria
     */
    function update_fk_categoria($id_fk_categoria,$params)
    {
        $this->db->where('id_fk_categoria',$id_fk_categoria);
        return $this->db->update('fk_categorias',$params);
    }

    /*
     * function to delete fk_categoria
     */
    function delete_fk_categoria($id_fk_categoria)
    {
        return $this->db->delete('fk_categorias',array('id_fk_categoria'=>$id_fk_categoria));
    }
}
