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
		<h3>Vale de consumo creado satisfactoriamente.</h3>
		<p>Se ha creado correctamente el vale de consumo numero #<?= $id_vale ?>. El mismo debe ser aprobado por el responsable del sector para que pueda ser preparado.</p><br>
    <p>Requeridor: <?= $user->last_name.', '.$user->first_name?></p><br>
    <p>Sector Aprobador:<?= $sector?></p><br>
      <table>
          <tread>
            <tr>
              <th>Código Articulo</th>
              <th>Descripción 1</th>
              <th>Cantidad Solicitada</th>
            </tr>
          </tread>
          <tbody>
            <?php foreach($datos_vale as $item){ ?>
                <tr>
                   <th><?= $item['id_item']?></th>
                   <th><?= $item['descripcion']?></th>
                   <th><?= $item['cantidad']?></th>
                <tr>
              <?php } ?>
          </tbody>
      </table>
  </body><br>
  Puede realizar un seguimiento del mismo <a href="http://localhost/Vales/vales_consumo/view/<?=$id_vale?>"> ACA </a>
</html>
