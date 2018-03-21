<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <style>
      th {

          border: 1px solid black;
          height: 40px;
          border-collapse: collapse;
          vertical-align: bottom;
          padding: 15px;
          text-align: left;

      }
      tr:hover {background-color: #f5f5f5;}
</style>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
    <?php
    if($id_estado->id_estado_entrega == $this->config->item('EnProcesoDeArmado')){

          $inicio = '[Sistema de Vales #'.$id_vale.'] Su vale se encuentra en proceso de armado';
          $cuerpo = 'Su vale se encuentra en proceso de armado. Una vez que se encuentre listo para retirar le llegará una notificación indicando esto.';

      }elseif($id_estado->id_estado_entrega == $this->config->item('ListoParaRetirar')){
          $inicio = '[Sistema de Vales #'.$id_vale.'] Su vale ya esta listo para ser retirado';
          $cuerpo = 'Su vale de consumo puede ser pasado a retirar por Pañol. <br> <strong>Detalle de Articulos a Entregar</strong>';
          $cuerpo .= '<table>
              <thead>
                <tr>
                  <th>Código Articulo</th>
                  <th>Descripción 1</th>
                  <th>Cantidad Solicitada</th>
                  <th>Cantidad a Entregar</th>
                </tr>
              </thead>
              <tbody>
                ';
                foreach($items as $item){
                $cuerpo .= '
                    <tr>
                       <th>'. $item->id_articulo_por_vale.'</th>
                       <th>'. $item->descripcion1.'</th>
                       <th>'. $item->cantidad.'</th>
                       <th>'. $item->cantidad_entregada.'</th>
                    <tr>';
                   }
                   $cuerpo .= '</tbody>
                                </table>';
      }elseif($id_estado->id_estado_entrega == $this->config->item('Retirado')){

          $inicio = '[Sistema de Vales #'.$id_vale.'] Su vale ha sido retirado';
          $cuerpo = 'Por Cualquier inconveniente comuniquese con pañol';

      }elseif($id_estado->id_estado_entrega == $this->config->item('RechazoPorFaltaDeStock')){

          $inicio = '[Sistema de Vales #'.$id_vale.'] Su vale ha sido Rechazado por falta de stock';
        $cuerpo = 'Por Cualquier inconveniente comuniquese con pañol';
      }

?>

		<h3><?= $inicio ?></h3>
    <p><strong>Comentarios añadidos:</strong> <?= $observacion?></p>
    <p><strong>Responsable:</strong><?= $responsable->first_name.', '.$responsable->last_name ?></p>
    <p><strong>Fecha de Creación:</strong> <?= date('d/m/Y H:i:s', $info_vale['fecha_creado'])?></p>
  <p><?= $cuerpo ?></p>

</body>
</html>
