<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Descripción de la Actividad
        </h3>

    <div class="col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-body">
                    <div class="col-md-6">
                        <b>Código: </b><?=$act->codigo?> <br>
                        <b><?=$act->actividad?></b> 
                    </div>
                    <div class="col-md-6" style="text-align:right">
                        <b>Costo (Bs.): </b><?=$total?> <br>
                        <b>Unidad: </b><?=$act->um?> <br>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form class="" action="<?=site_url('main/addDescrAjax')?>" id="addDescr" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <input type="hidden" value="<?=$act->id?>" name="idAct" id="idAct">
                        <div class="form-group">
                            <label>Renglón</label>
                            <select class="form-control" name="reng" id="reng">
                                <?php foreach ($renglones as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['renglon']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="constr">Descripción</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <div class="errors alert alert-danger" id="_name"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">UM</label>
                            <select class="form-control" name="um" id="um">
                                <?php foreach ($um as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['unidad']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="constr">Rendimiento</label>
                            <input type="number" class="form-control" name="rend" id="rend" step="0.01">
                            <div class="errors alert alert-danger" id="_rend"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">Precio Unitario</label>
                            <input type="number" class="form-control" name="pu" id="pu" step="0.01">
                            <div class="errors alert alert-danger" id="_pu"><span></span></div>
                        </div>

                        <div class="form-group">
                            <label for="constr">Total</label>
                            <input type="number" class="form-control" name="total" id="total" step="0.01">
                            <div class="errors alert alert-danger" id="_total"><span></span></div>
                        </div>

                    </div>


                    <div class="form-actions" >
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Insertar</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
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