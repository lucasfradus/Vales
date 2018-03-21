<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Custom Configs File
|--------------------------------------------------------------------------
| Hoja de configuraciones generales del sistema
| Autor: Lucas Fradusco
| Fecha: 04/2017
|
*/


$config['email'] = 'lucas.fradusco@gmail.com';

/*
|--------------------------------------------------------------------------
| Custom Config: Jerarquia Default
|--------------------------------------------------------------------------
| Aca defino la jerarquia que se le asigna x default a los usuarios cuando son cargados.
| si no tiene ninguna jerarquia asociada, va a tener errores cuando inicia sesion.
| tambien defino cual será la jerarquia de prueba
|
*/
$config['JerarquiaDefault']		    		= 28;
$config['JerarquiaPrueba']		    		= 27;


/*
|--------------------------------------------------------------------------
| Custom Config: ROLES
|--------------------------------------------------------------------------
| Acá defino el id que va a tener cada rol, segun los id, valido
| los permisos y veo que hacer con el usuario
| Estos son los roles que van a figurar en la tabla roles_group junto con el id de usuario
|
*/

$config['VerArticulos']		    		     = 1;
$config['AdministrarRoles']				     = 1;
$config['EditarArticulos']				     = 1;
$config['AltaArticulos']				       = 1;
$config['AdministrarUsuarios']		     = 1;
$config['VerArticulos']					       = 1;
$config['VerVales']						         = 1;
$config['NuevoVale']					         = 1;
$config['VerVale']						         = 1;
$config['AprobarVales']					       = 1;
$config['ArmadoDeVales']			   	     = 1;
$config['VerDashboard']				  	     = 1;
$config['PrepararVale']				  	     = 1;
$config['AdministrarSectores']		     = 1;
$config['AdministrarRolesPorUsuario']  = 1;
$config['AdministrarJerarquias']       = 1;


/*
|--------------------------------------------------------------------------
| Custom Config: Perrmisos x Grupo
|--------------------------------------------------------------------------
| Acá defino la constante que uso en la base de datos para tratar los grupos de usuarios
|
*/

$config['Administrator']						= 1;
$config['Requeridor']		    				= 2;
$config['Aprobador']		    				= 3;
$config['Pañolero']		    					= 4;





/*
|--------------------------------------------------------------------------
| Custom Config: Aprobaciones
|--------------------------------------------------------------------------
| Acá defino el id que va a tener cada Aprobacion. Si lo cambiamos en la DB, hay que modificarlo acá para no
| tener que buscar en el codigo todas las intancias
|
*/

$config['Pendiente']		    = 1;
$config['Aprobado']					= 2;
$config['Rechazado']				= 3;

/*
|--------------------------------------------------------------------------
| Custom Config: Estados de Preparacion
|--------------------------------------------------------------------------
| Acá defino el id que va a tener cada estado de aprobacion. Si lo cambiamos en la DB, hay que modificarlo acá para no
| tener que buscar en el codigo todas las intancias
|
*/

$config['Deshabilitado']		    	 = 9;
$config['EnProcesoDeCarga']				 = 1;
$config['PendienteDeAprobacion']	 = 2;
$config['EnProcesoDeArmado']		   = 3;
$config['ListoParaRetirar']				 = 4;
$config['Retirado']						     = 5;
$config['RechazoPorFaltaDeStock']  = 6;

/*
|--------------------------------------------------------------------------
| Custom Config: Articulos/Sectores Activos o dados de baja
|--------------------------------------------------------------------------
| Acá defino la constante que uso en la base de datos para marrcar los articulos o Sectores activos o inactivos.
|
*/

$config['Inactivo']					= 0;
$config['Activo']		    		= 1;

/*
|--------------------------------------------------------------------------
| Custom Config: articulos x vale
|--------------------------------------------------------------------------
| Acá defino la constante que uso en la base de datos para marrcar los articulos que voy cargando en los vale
|
*/

$config['Cargado']						  = 0;
$config['Pendiente']		    		= 1;



//donde guardo los templates para enviar mails
$config['templates'] = 'email/';

/*
|--------------------------------------------------------------------------
| Custom Config: mails templates
|--------------------------------------------------------------------------
| Acá defino la constante que uso para definir la plantilla que elijo en determinados eventos.
|
*/
$config['Nuevo_Vale']			 = 'new.tpl.php';


/*
|--------------------------------------------------------------------------
| Custom Config: Notificaciones x mail
|--------------------------------------------------------------------------
| Acá defino a quien se le mandan los mails.
|
*/

$config['Mail_Aprobacion']			 = array($config['Aprobador'], $config['Pañolero']);

//$config['Mail_Aprobacion']			 = 99;

/*
|--------------------------------------------------------------------------
| Custom Config: Eventos Notificables
|--------------------------------------------------------------------------
| Acá defino sobre que eventos se van a construir las notificaciones via mail
|
*/
$config['Nuevo_Vale']			                   = 'vale_nuevo';
$config['Aprobacion_Vale']			             = 'vale_aprobado';
$config['Listo_Para_Retirar_Vale']			     = 'vale_listo';
$config['Retirado_Vale']          			     = 'vale_retirado';


/*
|--------------------------------------------------------------------------
| Custom Config: Aglunas Rutas
|--------------------------------------------------------------------------
| Acá defino algunas rutas estaticas que voy a pasar como parametro de tipo NEXT a algunas funciones.
|
|
*/

$config['Ruta_notificaciones']          			     = 'notificaciones_user/index';

?>
