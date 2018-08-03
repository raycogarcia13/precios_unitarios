<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Descripción de la Actividad
            <div class="pull-right"><a href="<?=site_url('main/pdf/'.$act->id)?>" target="_blank" class="btn btn-info" title="Imprimir" id="btn-print"><i class="fa fa-print"></i></a></div>
        </h3>

    <div class="col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-body">
                    <div class="col-md-12 text-center"><b><?=$act->actividad?></b></div>
                    <div class="col-md-6">
                        <b>Código: </b><?=$act->codigo?> <br>
                        <b>Actividad Gruesa: </b><?=$act->grupo?>
                    </div>
                    <div class="col-md-6" style="text-align:right">
                        <b>Costo (Bs.): </b><?=$total?> <br>
                        <b>Unidad: </b><?=$act->um?> <br>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-success">
            <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Descripción</th>    
                            <th>Unid.</th>    
                            <th>Rend.</th>    
                            <th>P.U</th>    
                            <th>Total</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total=0;?>
                        <?php if(count($mat)):?>
                        <?php $total=0;?>
                        <tr>
                            <td colspan=5><b><?=$mat[0]['renglon']?></b></td>
                        </tr>
                        <?php endif;?>
                       <?php $total=0; foreach($mat as $item):?>
                       <?php $total+=$item['total'];?>
                        <tr>
                            <td><?=$item['descripcion']?></td>
                            <td><?=$item['um']?></td>
                            <td><?=$item['rendimiento']?></td>
                            <td><?=$item['precio_unitario']?></td>
                            <td><?=$item['total']?></td>
                        </tr>
                       <?php endforeach?>
                       <?php if(count($mat)):?>
                            <tr style="background-color:#ccc">
                                <td colspan=5 style="text-align:center"><b>Sub total <?=$mat[0]['renglon']?> (Bs): <?=$total?></b></td>
                            </tr>
                       <?php endif?>

                       <?php if(count($obra)):?>
                        <tr>
                        <td colspan=5><b><?=$obra[0]['renglon']?></b></td>
                        <?php $total=0;?>
                        </tr>
                        <?php endif;?>
                       <?php $total=0; foreach($obra as $item):?>
                        <tr>
                        <?php $total+=$item['total'];?>
                            <td><?=$item['descripcion']?></td>
                            <td><?=$item['um']?></td>
                            <td><?=$item['rendimiento']?></td>
                            <td><?=$item['precio_unitario']?></td>
                            <td><?=$item['total']?></td>
                        </tr>
                       <?php endforeach?>

                       <?php if(count($obra)):?>
                            <tr style="background-color:#ccc">
                                <td colspan=5 style="text-align:center"><b>Sub total <?=$obra[0]['renglon']?> (Bs): <?=$total;?></b></td>
                            </tr>
                       <?php endif?>

                       <?php if(count($tools)):?>
                        <tr>
                        <?php $total=0;?>
                        <td colspan=5><b><?=$tools[0]['renglon']?></b></td>
                        </tr>
                        <?php endif;?>
                       <?php $total=0; foreach($tools as $item):?>
                        <tr>
                        <?php $total+=$item['total'];?>
                            <td><?=$item['descripcion']?></td>
                            <td><?=$item['um']?></td>
                            <td><?=$item['rendimiento']?></td>
                            <td><?=$item['precio_unitario']?></td>
                            <td><?=$item['total']?></td>
                        </tr>
                       <?php endforeach?>
                       <?php if(count($tools)):?>
                            <tr style="background-color:#ccc">
                                <td colspan=5 style="text-align:center"><b>Sub total <?=$tools[0]['renglon']?> (Bs): <?=$total;?></b></td>
                            </tr>
                       <?php endif?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

</div>

</div>