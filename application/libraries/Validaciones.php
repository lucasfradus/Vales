<?php

/*
* Esta Clase guarda todas las validaciones
* Ej:
* $this->form_validation->set_rules($this->validaciones->Productos());
*/

class Validaciones{

	public function Productos(){
		$reglas = array(
		    array( 'field' => 'id_proveedor_producto', 'label' => 'Id Proveedor Producto', 'rules' => 'required' ),
		    array( 'field' => 'nombre_producto', 'label' => 'Nombre Producto', 'rules' => 'required' ),
		    array( 'field' => 'precio_compra_producto', 'label' => 'Precio Compra Producto', 'rules' => 'greater_than[0]' ),
		    array( 'field' => 'precio_venta_producto', 'label' => 'Precio Venta Producto', 'rules' => 'greater_than[0]' ),
		    array( 'field' => 'stock_producto', 'label' => 'Stock Producto', 'rules' => 'greater_than[0]|integer' ),
		    array( 'field' => 'stock_minimo_producto', 'label' => 'Stock Minimo Producto', 'rules' => 'greater_than[0]|integer' )
		);
		return $reglas;
	}

	public function Personas(){
		$reglas = array(
		    array( 'field' => 'dni_persona', 'label' => 'DNI', 'rules' => 'required|numeric|exact_length[8]|callback_dni_check'),
		    array( 'field' => 'nombre_persona', 'label' => 'Nombre', 'rules' => 'required' ),
		    array( 'field' => 'apellido_persona', 'label' => 'Apellido', 'rules' => 'required' ),
		    array( 'field' => 'tel_persona', 'label' => 'Telefono', 'rules' => 'required|numeric' ),
		    array( 'field' => 'cp_persona', 'label' => 'Código Postal', 'rules' => 'numeric' ),
		    array( 'field' => 'fecha_nac_persona', 'label' => 'Fecha de Nacimiento', 'rules' => 'callback_date_check'),
		    array( 'field' => 'mail_persona', 'label' => 'Mail', 'rules' => 'valid_email|callback_mail_check|required')
		);
		return $reglas;
	}
	public function PersonasEdit(){
		$reglas = array(
		    array( 'field' => 'dni_persona', 'label' => 'DNI', 'rules' => 'required|numeric|exact_length[8]'),
		    array( 'field' => 'nombre_persona', 'label' => 'Nombre', 'rules' => 'required' ),
		    array( 'field' => 'apellido_persona', 'label' => 'Apellido', 'rules' => 'required' ),
		    array( 'field' => 'tel_persona', 'label' => 'Telefono', 'rules' => 'required|numeric' ),
		    array( 'field' => 'cp_persona', 'label' => 'Código Postal', 'rules' => 'numeric' ),
		    array( 'field' => 'fecha_nac_persona', 'label' => 'Fecha de Nacimiento', 'rules' => 'callback_date_check'),
		    array( 'field' => 'mail_persona', 'label' => 'Mail', 'rules' => 'valid_email|required')
		);
		return $reglas;
	}






}
