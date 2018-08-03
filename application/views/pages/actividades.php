<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-list"></i> Listado de Actividades
        </h3>
       
        <div class="pull-right" style="margin-bottom:10px;"><a href="<?=site_url('main/insertActividad')?>" class="btn btn-default"><i class="fa fa-plus"></i> Nueva</a></div>
        <div class="clearfix"></div>  

        <div class="col-xs-12">
        <div class="panel panel-success">
            <div class="panel-body">
            <div class="table-responsive">
                    <table class="table datatables table-striped table-bordered table-hover" id="mainT">
                        <thead>
                            <tr>
                                <td colspan=3></td>
                                <th colspan=5 class="text-center">Precios</th>
                            </tr>
                            <tr>
                                <th>Grupo</th> 
                                <th>Item</th>    
                                <th>Descripción.</th>    
                                <th>Unidad</th>    
                                <th>Material</th>    
                                <th>Mano de Obra</th>    
                                <th>Herra. Equipo</th>    
                                <th>Total (Bs.)</th>       
                                <th></th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($acts as $item):?>
                                <tr id="tr<?=$item['id']?>">
                                    <td><b><?=$item['grupo']?></b></td>
                                    <td><?=$item['codigo']?></td>
                                    <td><?=$item['actividad']?></td>
                                    <td><?=$item['um']?></td>
                                    <td><?=$item['pu']?></td>
                                    <td><?=$item['obra']?></td>
                                    <td><?=$item['tool']?></td>
                                    <td><?=$item['total']?></td>
                                    <td class="text-center">
                                        <a title="Detalles" href="<?=site_url('main/detalles/'.$item['id'])?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                        <a title="Editar" href="<?=site_url('main/editarActividad/'.$item['id'])?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                        <a title="Eliminar" data-msg="la actividad <?=$item['actividad']?>" href="<?=site_url('main/deleteActividad/'.$item['id'])?>" class="delete btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        <!-- <a title="Eliminar" href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> -->
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    </div>