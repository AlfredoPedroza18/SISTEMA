<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        
                <form class="form-horizontal" action="{{ url('new-foreign-user') }}" method="POST" id="frm-add-anexo" enctype="multipart/form-data">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Alta Investgador <i class="fa fa-2x fa-user text-warning"></i></h4>
            </div>
            <div class="modal-body">
                    {{ csrf_field() }}
                    
                    <input type="hidden" class="form-control" name="cn" placeholder="nickname" required="required" value="{{ Auth::user()->idcn }}">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Nickname</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" name="nick_name" placeholder="nickname" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Usuario</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" name="username" placeholder="" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Password</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="password" class="form-control" id="exampleInputAmount" name="password" placeholder="" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Nombre</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" name="name" placeholder="" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Ap. Paterno</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" name="apellido_paterno" placeholder="" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Ap. Materno</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input type="text" class="form-control" id="exampleInputAmount" name="apellido_materno" placeholder="" required="required">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Móvil</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input  type="text" 
                                    class="form-control telefono" 
                                    id="exampleInputAmount" 
                                    name="telefono_movil" 
                                    placeholder="" 
                                    required="required"
                                    maxlength="10">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Oficina</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input  type="text" 
                                    class="form-control telefono" 
                                    id="exampleInputAmount" 
                                    name="telefono_oficina" 
                                    placeholder="" 
                                    required="required"
                                    maxlength="10">                            
                        </div>                        
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Email</label>
                        <div class="input-group col-sm-7">
                            <div class="input-group-addon"><i class="fa fa-reorder"></i></div>
                            <input  type="text" 
                                    class="form-control" 
                                    id="exampleInputAmount" 
                                    name="email" 
                                    placeholder="" 
                                    required="required" 
                        </div>                        
                    </div>

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="btn-save-investigador">Guardar</button>
            </div>
        </div><!-- /.modal-content -->


        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->