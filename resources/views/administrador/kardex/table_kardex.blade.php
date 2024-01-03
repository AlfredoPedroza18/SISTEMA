<div class="col-md-12 col-sm-12 col-xs-12">
		            		<table id="data-table-kardex" class="display table table-striped table-bordered table-responsive">
			            		<thead>
			            			<tr>
			            				<th>Usuario</th>
				            			<th>Modulo</th>
				            			<th>Submodulo</th>
				            			<th>Acción</th>				            			
				            			<th>Descripción</th>
				            			<th>Fecha Acción</th>
				            		</tr>
			            		</thead>
			            		<tfoot>
				            			<tr>
				            				<td>Usuario</td>
					            			<td>Modulo</td>
					            			<td>Submodulo</td>
					            			<td>Acción</td>				            	
					            			<td>Descripción</td>
					            			<td>Fecha Acción</td>
				            			</tr>
			            		</tfoot>
			            		<tbody>
			            			@foreach($lista_kardex as $kardex)
				            			<tr>
				            				<td>{{ $kardex->nombre_usuario   }}</td>
				            				<td>{{ $kardex->nombre_modulo    }}</td>
				            				<td>{{ $kardex->nombre_submodulo }}</td>			            			
				            				<td>{{ $kardex->nombre_accion	 }}</td>				            				
				            				<td>{{ $kardex->descripcion }}</td>				            				
				            				<td>{{ $kardex->fecha }}</td>	
				            				



				            				{{-- 	
				            				<td class="text-center">
				            					<a href="javascript:;" 
					            					class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo"
					            					data-toggle="popover"
					            					data-placement="left" 
					            					data-html="true"			            					
					            					title="Permisos asignados" 
					            					data-content="
					            					<ul>
					            					@if(isset($usuario->roles[0]))
						            					@forelse ($usuario->roles[0]->permissions as $permiso)
						            						<li><h6>{{$permiso->name}}</h6></li>
						            					@empty
						            						<li>Sin permisos asignados</li>
						            					@endforelse
						            				@else
						            					<li>Sin permisos asignados</li>
						            				@endif
					            					</ul>">
				            						<i class="fa fa-eye"></i>
				            					</a>
				            					
				            					
				            					 
				            					<a href="javascript:;" class="btn btn-info btn-icon btn-circle btn-sm btn-editar-registro-responsivo" data-toggle="tooltip" data-placement="bottom" title="Ver Usuario"><i class="fa fa-eye"></i></a>&nbsp&nbsp
				            					
				            				</td> --}}
				            			</tr>
				            		@endforeach
			            		</tbody>
			            		
		            		</table>
		            	</div>