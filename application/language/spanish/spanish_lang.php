<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name: spanish_lang
*
* Author: Lucas Fradusco
* 		  lucas.fradusco@gmail.com
*
*
* Created:  23.02.2017
*
* Description:  Hoja de lenguajes en Español Latino Americano
*
*/

// Login Errors
$lang['error_no_login']         = 'Necesitas estar logueado para ver esta pagina.';
$lang['error_no_permission']    = 'No tienes permiso para realizar esta acción.';

//validaciones
$lang['val_dni_check']          = 'El DNI %s ya se encuentra ingresado en el sistema.';
$lang['val_mail_check']         = 'El e-mail %s ya se encuentra ingresado en el sistema.';
$lang['val_date_check']         = 'La fecha %s es posterior a la fecha de hoy. Por favor introducir una fecha valida.';

//clientes
$lang['cli_new']                = 'El Cliente se ha cargado correctamente.';
$lang['cli_edit']               = 'Cliente Modificado Correctamente! Los cambios de Imagenes pueden demorar unos minutos';
$lang['cli_delete_success']     = 'Se Deshabilito Correctamente al cliente %s';
$lang['cli_delete_error']       = 'No se pudo eliminar al cliente %s, por favor intente nuevamente más tarde.';
$lang['cli_enable_success']     = 'Se habilito Correctamente al cliente %s.';
$lang['cli_enable_error']       = 'No se pudo habilitar al cliente %s, por favor intente nuevamente más tarde.';

$lang['cli_personal_data']      = 'Datos personales';
$lang['cli_mandatory_fields']   = 'Los campos con * son de caracter obligatorio.';
$lang['cli_once_saved']         = 'Una vez guardado este campo no se puede modificar.';
$lang['cli_change_due_date']    = 'Para modificar la Fecha de Vencimiento,  hay que modificar los datos del usuario';
$lang['cli_name']               = 'Nombre';
$lang['cli_name_ex']            = 'Por Ej: Juan Martin';
$lang['cli_last_name']          = 'Apellido';
$lang['cli_last_name_ex']       = 'Por Ej: Godines';
$lang['cli_dni']                = 'DNI';
$lang['cli_dni_ex']             = 'Por Ej: 26246478';
$lang['cli_dob']                = 'Fecha de Nacimiento';
$lang['cli_tel']                = 'Telefono';
$lang['cli_tel_ex']             = 'Por Ej: 11 215667805';
$lang['cli_email']              = 'Email';
$lang['cli_email_ex']           = 'Por Ej: jmgodines@gmail.com';
$lang['cli_address']            = 'Dirección';
$lang['cli_address_ex']         = 'Por Ej: Av. de las industrias 1222';
$lang['cli_sex']                = 'Sexo';
$lang['cli_img']                = 'Imagen';
$lang['cli_emergency_title']    = 'Información de Emergencia';
$lang['cli_emergency_name']     = 'Nombre y Apellido';
$lang['cli_emergency_name_ex']  = 'Por Ej: Carlos Roldan';
$lang['cli_emergency_tel']      = 'Telefono';
$lang['cli_emergency_tel_ex']   = 'Por Ej: 11 215667805"';
$lang['cli_emergency_rel']      = 'Parentezco';
$lang['cli_emergency_rel_ex']   = 'Por Ej: Padre';
$lang['cli_emergency_osoc']     = 'Obra Social';
$lang['cli_emergency_osoc_ex']  = 'Por Ej: OSDE';
$lang['cli_emergency_comments'] = 'Comentarios';
$lang['cli_emergency_small']    = 'Este Campo es para incluir informacion médica del Cliente.';
$lang['cli_admin_tittle']       = 'Información Administrativa';
$lang['cli_admin_start_date']   = 'Fecha de Inicio';
$lang['cli_admin_due_pay_date'] = 'Fecha de Vencimiento';
$lang['cli_admin_due_date']     = 'Esta Fecha se tomará como fecha de Vencimiento.';
$lang['cli_admin_plan']         = 'Plan';
$lang['cli_admin_status']       = 'Estado';
$lang['cli_admin_save_btn']     = 'Guardar!';
$lang['cli_mail_mandatory']     = 'El campo Mail es obligatorio';
$lang['cli_mail_exists']        = 'El %s ya se encuentra cargado en el sistema.';

//ingresos
$lang['ing_success']             = 'Se realizo el ingreso manual de %s.';
$lang['ing_error']               = 'No se pudo  realizo el ingreso manual de %s.';


//botones
$lang['btn_pagos']               = 'Pagos';
$lang['btn_ingresos']            = 'Registro de Ingresos';
$lang['btn_modificar']           = 'Modificar';
$lang['btn_elminar']             = 'Eliminar';
$lang['btn_back']                = 'Volver Atrás';
$lang['btn_add_stock']           = 'Modificar stock';
$lang['btn_nuevo_producto']      = 'Nuevo Producto';

//Pagos
$lang['pay_success']             = 'Pago realizado Correctamente! ID: %s';
$lang['pay_error']               = 'Hubo un problema al procesar el pago, intente nuevamente';
$lang['pay_delete_success']      = 'Operacion Eliminada Correctamente. ID: %s';
$lang['pay_delete_not_found']    = 'No se pudo encontrar el ID: %s. Por favor verificar el ID ingresado e intentar nuevamente.';
$lang['pay_delete_invalid']      = 'El ID %s corresponde a una operacion realizada por otro cliente. Por favor verificar el ID ingresado e intentar nuevamente.';
$lang['pay_history']             = 'Historial de Pagos';
$lang['pay_opid']                = '# de Operacion';
$lang['pay_date']                = 'Fecha de Pago';
$lang['pay_due_date']            = 'Vencimineto';
$lang['pay_nex_due_date']        = 'Proximo Vencimiento';
$lang['pay_plan']                = 'Plan';
$lang['pay_unique_payments']     = 'Aranceles Unicos';
$lang['pay_cost']                = 'Costo';
$lang['pay_discount']            = 'Descuento(%)';
$lang['pay_obs']                 = 'Observaciones';
$lang['pay_no_pays_yet']         = '<br> Todavía no hay pagos registrados';
$lang['pay_inform_new']          = 'Informar un nuevo pago';
$lang['pay_client_data']         = 'Datos del Cliente';
$lang['pay_concept']             = 'Concepto';
$lang['pay_discount_recharge']   = 'Descuento/Recargos';
$lang['pay_no_discount']         = 'Sin Descuento';
$lang['pay_recharge']            = 'Recargos';
$lang['pay_cancel_a_payment']    = 'Anular un Pago';
$lang['pay_insert_id']           = 'Ingrese el Id de la operacion que desea anular:';
$lang['pay_small_cancel_payment']= 'Al Eliminar una operacion no se modifica la fecha de vencimiento.';



//titulos
$lang['title_edit']              = 'Modificar Cliente';
$lang['title_inform_pay']        = 'Informar un Pago';
$lang['title_new_user']          = 'Alta de Clientes';
$lang['title_products']          = 'Productos';
$lang['title_products_add']      = 'Alta de Productos';
$lang['title_planes_add']        = 'Alta de Planes';
$lang['title_planes']            = 'Planes';
$lang['title_new_user']          = 'Alta de Clientes';
$lang['title_new_emplyee']       = 'Alta de Empleados';
$lang['title_new_suplayer']      = 'Alta de Proveedores';

//productos



$lang['product_id']              = 'ID';
$lang['product_name']            = 'Nombre';
$lang['product_description']     = 'Descripcion';
$lang['product_price_sale']      = 'Precio de Venta';
$lang['product_price_bought']    = 'Precio de Compra';
$lang['product_stock']           = 'Stock';
$lang['product_edit']            = 'Modificar';
$lang['product_edit_prod']       = 'Modificar Producto';
$lang['product_delete']          = 'Eliminar';
$lang['product_placeholder_name']= 'Por Ej: Powerade 500ml';
$lang['product_placeholder_desc']= 'Por Ej: Bebida';
$lang['product_inicial_stock']   = 'Stock Inicial';
$lang['product_add_success']     = 'Producto Cargado correctamente';
$lang['product_edit_success']    = 'Producto Editado correctamente';
$lang['product_delete_success']  = 'Producto Eliminado correctamente';
$lang['product_not_found']       = 'El id ingresado no pertenece a ningun producto';
$lang['product_no_stock']        = 'El producto seleccionado no tiene stock disponible';
$lang['product_sell_ok' ]        = 'Venta Correcta';
$lang['product_sell_not_ok' ]    = 'La venta no se pudo relalizar. Intente nuevamente';


//planes
$lang['plan_name']               = 'Nombre';
$lang['plan_is_plan']            = 'Es Plan?';
$lang['plan_cost']               = 'Costo';
$lang['plan_select']             = 'Seleccionar';
$lang['plan_yes']                = 'Si';
$lang['plan_no']                 = 'No';
$lang['plan_form_check']         = 'debe ser mayo a 0 y menor a 7';
$lang['plan_ingresos']           = 'Ingresos';
$lang['plan_ingresos_limit']     = 'Cantidad Maxima de ingresos Semanales, entre 1 y 7.';
