<div class="col-md-12">

        <h3 class="page-header">
            <i class="fa fa-edit"></i> Usuarios
            <!-- <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Nuevo</button> -->
        </h3>

    <div class="col-md-6">
        <div class="panel panel-primary" id="modInsert">
            <div class="panel-body">
                <form class="" action="<?=site_url('admin/addUser')?>" id="addUser" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        
                        <div class="form-group">
                            <label for="constr">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <div class="errors alert alert-danger" id="_name"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Usuario</label>
                            <input type="text" class="form-control" name="user" id="user">
                            <div class="errors alert alert-danger" id="_user"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Contraseña</label>
                            <input type="password" class="form-control" name="pass" id="pass">
                            <div class="errors alert alert-danger" id="_pass"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Repetir</label>
                            <input type="password" class="form-control" name="pass2" id="pass2">
                            <div class="errors alert alert-danger" id="_pass2"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <?php foreach ($rol as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['rol']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                    <div class="form-actions" >
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Insertar</button>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>

        <div class="panel panel-success" style="display:none" id="edit">
            <div class="panel-body">
                <form class="" action="<?=site_url('admin/editUser')?>" id="editUser" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-body">
                        <input type="hidden" class="form-control" name="idedit" id="idedit">
                        <div class="form-group">
                            <label for="constr">Nombre</label>
                            <input type="text" class="form-control" name="nameE" id="nameEdit">
                            <div class="errors alert alert-danger" id="_nameE"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Usuario</label>
                            <input type="text" class="form-control" name="userE" id="userEdit">
                            <div class="errors alert alert-danger" id="_userE"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Contraseña</label>
                            <input type="password" class="form-control" name="passE" id="passEdit">
                            <div class="errors alert alert-danger" id="_passE"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Repetir</label>
                            <input type="password" class="form-control" name="pass2E" id="pass2Edit">
                            <div class="errors alert alert-danger" id="_pass2E"><span></span></div>
                        </div>
                        <div class="form-group">
                            <label for="constr">Rol</label>
                            <select class="form-control" name="rol" id="rolE">
                                <?php foreach ($rol as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['rol']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                    <div class="form-actions" >
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Actualizar</button>
                        <button id="cancel" type="button" class="btn btn-danger pull-left"><i class="fa fa-ban"></i> Cancelar</button>
                    </div>
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
                            <th>Nombre</th>    
                            <th>Usuario</th>    
                            <th>Rol</th>    
                            <th style="text-align:right">Acciones</th>    
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $item):?>
                            <tr id="tr<?=$item['id']?>">
                                <td id="tdn<?=$item['id']?>"><?=$item['nombre']?></td>
                                <td id="tdu<?=$item['id']?>"><?=$item['username']?></td>
                                <td id="tdr<?=$item['id']?>"><?=$item['rol']?></td>
                                <td style="text-align:right">
                                        <a title="Editar" data-id="<?=$item['id']?>" data-rol="<?=$item['id_rol']?>" data-name="<?=$item['nombre']?>" data-user="<?=$item['username']?>" href="#" class="editar btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                        <a title="Eliminar" href="<?=site_url("admin/delUser/".$item['id'])?>" data-msg="el usuario <?=$item['username']?>" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i></a>
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

</div>