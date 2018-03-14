<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <style>
      th, tr {
          border: 1px solid black;
          border-collapse: collapse;
      }
</style>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
		<h3>Su Vale ha sido <?= $id_estado_aprobacion== $this->config->item('Aprobado') ? 'Aprobado' : 'Rechazado' ?></h3>
    <p>Comentarios: <?= $comentarios_aprobacion?></p><br>
    <p>Responsable:<?= $responsable->first_name.', '.$responsable->last_name ?></p><br>

  </body><br>
  <?php if($id_estado_aprobacion== $this->config->item('Aprobado')){
    ?>
    <p>Una vez que este listo para ser retirado recibirá una notificación indicando esto.
    </p>
    <?php
  } ?>


</html>
