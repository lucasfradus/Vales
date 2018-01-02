<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Vales Pendientes de Aprobación</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Vale</th>
						<th>Requeridor</th>
						<th>Sector Aprobador</th>
                        <th>Fecha Creación</th>
                        <th>Estado Aprobacion</th>
						<th>Acciones</th>
                    </tr>
                    <?php

                    foreach($vales_consumo as $v){ ?>
                    <tr>
						<td><?= $v['id_vale']; ?></td>
						<td><?= $v['username']; ?></td>
						<td><?= $v['nombre_sector']; ?></td>
                        <td><?= date('m/d/Y H:i:s', $v['fecha_creado']); ?></td>
                        <td><?= $v['nombre_estado_aprobacion']; ?></td>
						<td>
                            <div class="btn-group">
                                <a href="<?php echo site_url('vales_consumo/view/'.$v['id_vale']); ?>" class="btn btn-xs btn-info" data-toggle="tooltip" title="Ver">
                                <i class="glyphicon glyphicon-search"></i>
                                </a>
                        <button type="button" class="btn btn btn-default btn-xs" data-toggle="modal" data-target="#message<?php echo $v['id_vale'];?>">Modificar Estado</button>
                    </tr>
                        <div id="message<?= $v['id_vale'];?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                            <!-- Modal content-->
                            <?php echo form_open('vales_consumo/UpdateStatusAprobacion'); ?>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Cambiar estado de Vale #<?= $v['id_vale']?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-6">
                                        <label for="id_requeridor" class="control-label">Solicitante</label>
                                            <div class="form-group">
                                                <input type="text" name="id_requeridor" value="<?= $v['username'] ?>" class="form-control" id="id_un_med1" disabled />
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                        <label for="id_requeridor" class="control-label">Fecha de Creacion</label>
                                            <div class="form-group">
                                                <input type="text" name="id_requeridor" value="<?= date('m/d/Y H:i:s', $v['fecha_creado']); ?>" class="form-control" disabled />
                                            </div>
                                        </div>
                                        <p>Una vez que el vale se encuentre aprobado, este pasará a preparacion.</p>
                                    <label for="id_sector" class="control-label"><span class="text-danger">*</span>Estado</label>
                                        <div class="form-group">
                                                    <select name="estado" class="form-control">

                                                        <?php
                                                        foreach($estado as $e)
                                                        {
                                                            if($v['id_aprobacion']==$e['id_estado_aprobacion_fk']){
                                                                $disabled='disabled';
                                                            }
                                                            else{
                                                                $disabled='';
                                                            }
                                                            echo '<option value="'.$e['id_estado_aprobacion_fk'].'"'.$disabled.'>'.$e['nombre_estado_aprobacion'].'</option>';
                                                        }
                                                        ?>
                                                    </select>

                                            <label for="id_sector" class="control-label"><span class="text-danger">*</span>Comentarios</label>
                                            <textarea class="form-control" rows="5" name="comment"></textarea>
                                            <?= form_hidden('id_vale', $v['id_vale']);   ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" >Guardar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?= form_close(); ?>
                    <?php } ?>
                </table>

            </div>
        </div>
    </div>
</div>
