@extends('layouts.master')
@section('section')

<div id="content" class="content">

	<ol class="breadcrumb ">
		<li><a href="javascript:;">Administrador</a></li>	
		<li><a href="{{ url('modulo/administrador/cuentas') }}">Cuentas</a></li>
		<li><a href="{{ route('sig-erp-crm::modulo.administrador.usuarios.index') }}">Usuarios</a></li>
		<li><a href="#">Show</a></li>
	</ol>

	<div class="row">
		<div class="col-md-12 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="ui-widget-1">
		        <div class="panel-heading">
		            <div class="panel-heading-btn">
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		            </div>
		            <h4 class="panel-title text-center">Perfil de Usuario</h4>
		        </div>
		        <div class="panel-body">
		            <div class="row">
		            	<!-- begin page-header -->
						<h1 class="page-header">Profile Page <small>header small text goes here...</small></h1>
						<!-- end page-header -->

						<div class="profile-container">
			                <!-- begin profile-section -->
			                <div class="profile-section">
			                    <!-- begin profile-left -->
			                    <div class="profile-left">
			                        <!-- begin profile-image -->
			                        <div class="profile-image">
			                            <img src="assets/img/profile-cover.jpg" />
			                            <i class="fa fa-user hide"></i>
			                        </div>
			                        <!-- end profile-image -->
			                        <div class="m-b-10">
			                            <a href="#" class="btn btn-warning btn-block btn-sm">Change Picture</a>
			                        </div>
			                        <!-- begin profile-highlight -->
			                        <div class="profile-highlight">
			                            <h4><i class="fa fa-cog"></i> Only My Contacts</h4>
			                            <div class="checkbox m-b-5 m-t-0">
			                                <label><input type="checkbox" /> Show my timezone</label>
			                            </div>
			                            <div class="checkbox m-b-0">
			                                <label><input type="checkbox" /> Show i have 14 contacts</label>
			                            </div>
			                        </div>
			                        <!-- end profile-highlight -->
			                    </div>
			                    <!-- end profile-left -->
			                    <!-- begin profile-right -->
			                    <div class="profile-right">
			                        <!-- begin profile-info -->
			                        <div class="profile-info">
			                            <!-- begin table -->
			                            <div class="table-responsive">
			                                <table class="table table-profile">
			                                    <thead>
			                                        <tr>
			                                            <th></th>
			                                            <th>
			                                                <h4>Micheal	Meyer <small>Lorraine Stokes</small></h4>
			                                            </th>
			                                        </tr>
			                                    </thead>
			                                    <tbody>
			                                        <tr class="highlight">
			                                            <td class="field">Mood</td>
			                                            <td><a href="#">Add Mood Message</a></td>
			                                        </tr>
			                                        <tr class="divider">
			                                            <td colspan="2"></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Mobile</td>
			                                            <td><i class="fa fa-mobile fa-lg m-r-5"></i> +1-(847)- 367-8924 <a href="#" class="m-l-5">Edit</a></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Home</td>
			                                            <td><a href="#">Add Number</a></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Office</td>
			                                            <td><a href="#">Add Number</a></td>
			                                        </tr>
			                                        <tr class="divider">
			                                            <td colspan="2"></td>
			                                        </tr>
			                                        <tr class="highlight">
			                                            <td class="field">About Me</td>
			                                            <td><a href="#">Add Description</a></td>
			                                        </tr>
			                                        <tr class="divider">
			                                            <td colspan="2"></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Country/Region</td>
			                                            <td>
			                                                <select class="form-control input-inline input-xs" name="region">
			                                                    <option value="US" selected>United State</option>
			                                                    <option value="AF">Afghanistan</option>
			                                                    <option value="AL">Albania</option>
			                                                    <option value="DZ">Algeria</option>
			                                                    <option value="AS">American Samoa</option>
			                                                    <option value="AD">Andorra</option>
			                                                    <option value="AO">Angola</option>
			                                                    <option value="AI">Anguilla</option>
			                                                    <option value="AQ">Antarctica</option>
			                                                    <option value="AG">Antigua and Barbuda</option>
			                                                </select>
			                                            </td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">City</td>
			                                            <td>Los Angeles</td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">State</td>
			                                            <td><a href="#">Add State</a></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Website</td>
			                                            <td><a href="#">Add Webpage</a></td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Gender</td>
			                                            <td>
			                                                <select class="form-control input-inline input-xs" name="gender">
			                                                    <option value="male">Male</option>
			                                                    <option value="female">Female</option>
			                                                </select>
			                                            </td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Birthdate</td>
			                                            <td>
			                                                <select class="form-control input-inline input-xs" name="day">
			                                                    <option value="04" selected>04</option>
			                                                </select>
			                                                -
			                                                <select class="form-control input-inline input-xs" name="month">
			                                                    <option value="11" selected>11</option>
			                                                </select>
			                                                -
			                                                <select class="form-control input-inline input-xs" name="year">
			                                                    <option value="1989" selected>1989</option>
			                                                </select>
			                                            </td>
			                                        </tr>
			                                        <tr>
			                                            <td class="field">Language</td>
			                                            <td>
			                                                <select class="form-control input-inline input-xs" name="language">
			                                                    <option value="" selected>English</option>
			                                                </select>
			                                            </td>
			                                        </tr>
			                                    </tbody>
			                                </table>
			                            </div>
			                            <!-- end table -->
			                        </div>
			                        <!-- end profile-info -->
			                    </div>
			                    <!-- end profile-right -->
			                </div>
			                <!-- end profile-section -->
			                <!-- begin profile-section -->
			                <div class="profile-section">
			                    <!-- begin row -->
			                    <div class="row">
			                        <!-- begin col-4 -->
			                        <div class="col-md-4">
			                            <h4 class="title">Message <small>56 messages</small></h4>
			                            <!-- begin scrollbar -->
			                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
			                                <!-- begin chats -->
			                                <ul class="chats">
			                                    <li class="left">
			                                        <span class="date-time">yesterday 11:23pm</span>
			                                        <a href="javascript:;" class="name">Sowse Bawdy</a>
			                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user-12.jpg"></a>
			                                        <div class="message">
			                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
			                                        </div>
			                                    </li>
			                                    <li class="right">
			                                        <span class="date-time">08:12am</span>
			                                        <a href="#" class="name"><span class="label label-primary">ADMIN</span> Me</a>
			                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user-13.jpg"></a>
			                                        <div class="message">
			                                            Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
			                                        </div>
			                                    </li>
			                                    <li class="left">
			                                        <span class="date-time">09:20am</span>
			                                        <a href="#" class="name">Neck Jolly</a>
			                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user-10.jpg"></a>
			                                        <div class="message">
			                                            Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
			                                        </div>
			                                    </li>
			                                    <li class="left">
			                                        <span class="date-time">11:15am</span>
			                                        <a href="#" class="name">Shag Strap</a>
			                                        <a href="javascript:;" class="image"><img alt="" src="assets/img/user-14.jpg"></a>
			                                        <div class="message">
			                                            Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
			                                        </div>
			                                    </li>
			                                </ul>
			                                <!-- end chats -->
			                            </div>
			                            <!-- end scrollbar -->
			                        </div>
			                        <!-- end col-4 -->
			                        <!-- begin col-4 -->
			                        <div class="col-md-4">
			                            <h4 class="title">Sales <small>3 sales</small></h4>
			                            <!-- begin scrollbar -->
			                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
			                                <!-- begin table -->
			                                <table class="table table-condensed">
												<thead>
													<tr>
														<th></th>
														<th>Product</th>
														<th>Amount</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<tr>
													    <td class="col-md-1 p-r-5">
															<a href="javascript:;" class="pull-left">
																<img src="assets/img/product/product-1.png" width="40px" alt="">
															</a>
														</td>
														<td>
															<h5 class="m-t-0 m-b-5">iPad Air 3</h5>
														</td>
														<td>$349.00</td>
														<td>13/02/2013</td>
													</tr>
													<tr>
													    <td class="col-md-1 p-r-5">
															<a href="javascript:;" class="pull-left">
																<img src="assets/img/product/product-2.png" width="40px" alt="">
															</a>
														</td>
														<td>
															<h5 class="m-t-0 m-b-5">Iphone6</h5>
														</td>
														<td>$399.00</td>
														<td>13/02/2013</td>
													</tr>
													<tr>
													    <td class="col-md-1 p-r-5">
															<a href="javascript:;" class="pull-left">
																<img src="assets/img/product/product-3.png" width="40px" alt="">
															</a>
														</td>
														<td>
															<h5 class="m-t-0 m-b-5">Macbook Pro</h5>
														</td>
														<td>$499.00</td>
														<td>13/02/2013</td>
													</tr>
													<tr>
													    <td class="col-md-1 p-r-5">
															<a href="javascript:;">
																<img src="assets/img/product/product-4.png" width="40px" alt="">
															</a>
														</td>
														<td>
															<h5 class="m-t-0 m-b-5">Samsung Galaxy s4</h5>
														</td>
														<td>$230.00</td>
														<td>13/02/2013</td>
													</tr>
													<tr>
													    <td class="col-md-1 p-r-5">
															<a href="javascript:;" class="pull-left">
																<img src="assets/img/product/product-5.png" width="40px" alt="">
															</a>
														</td>
														<td>
															<h5 class="m-t-0 m-b-5">Samsung Note 4</h5>
														</td>
														<td>$500.00</td>
														<td>13/02/2013</td>
													</tr>
												</tbody>
											</table>
			                                <!-- end table -->
										</div>
			                            <!-- end scrollbar -->
			                        </div>
			                        <!-- end col-4 -->
			                        <!-- begin col-4 -->
			                        <div class="col-md-4">
			                            <h4 class="title">Task <small>24 pending</small></h4>
			                            <!-- begin scrollbar -->
			                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
			                                <!-- begin todolist -->
			                                <ul class="todolist">
			                                    <li class="active">
			                                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Donec vehicula pretium nisl, id lacinia nisl tincidunt id.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Duis a ullamcorper massa.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Phasellus bibendum, odio nec vestibulum ullamcorper.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Duis pharetra mi sit amet dictum congue.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Duis pharetra mi sit amet dictum congue.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Phasellus bibendum, odio nec vestibulum ullamcorper.</div>
			                                        </a>
			                                    </li>
			                                    <li>
			                                        <a href="javascript:;" class="todolist-container active" data-click="todolist">
			                                            <div class="todolist-input"><i class="fa fa-square-o"></i></div>
			                                            <div class="todolist-title">Donec vehicula pretium nisl, id lacinia nisl tincidunt id.</div>
			                                        </a>
			                                    </li>
			                                </ul>
			                                <!-- end todolist -->
			                            </div>
			                            <!-- end scrollbar -->
			                        </div>
			                        <!-- end col-4 -->
			                    </div>
			                    <!-- end row -->
			                </div>
			                <!-- end profile-section -->
			            </div>
		            </div>

		            


		        </div>
		    </div>
		</div>
	</div>

</div>

@endsection

@section('js-base')
@include('librerias.base.base-begin')
@include('librerias.base.base-begin-page')

{!! Html::script('assets/plugins/DataTables/media/js/jquery.dataTables.js')!!}
	{!! Html::script('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('assets/plugins/DataTables/extensions/Buttons/js/colvis.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') !!}
	{!! Html::script('assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js') !!}


<script type="text/javascript">

	$(document).ready(function(){
    	iniciarTabla();

    });
	var iniciarTabla = function(){
            var data_table =$("#data-table").DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'excel', 'pdf','print'

                                ],
                                responsive: true,
                                autoFill: true,
                                "scrollY": "350px",
                                "paging": false,
                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                               /* "footerCallback": function ( row, data, start, end, display ) {
                                        var api = this.api(), data;
                             
                                        // Remove the formatting to get integer data for summation
                                        var intVal = function ( i ) {
                                            return typeof i === 'string' ?
                                                i.replace(/[\$,]/g, '')*1 :
                                                typeof i === 'number' ?
                                                    i : 0;
                                        };
                             
                                        // Total over all pages
                                        total = api
                                            .column( 2 )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Total over this page
                                        pageTotal = api
                                            .column( 2, { page: 'current'} )
                                            .data()
                                            .reduce( function (a, b) {
                                                return intVal(a) + intVal(b);
                                            }, 0 );
                             
                                        // Update footer
                                       $( api.column( 2 ).footer() ).html('TOTAL VISTA $ '+number_format(pageTotal,2));
                                        $('#total-cotizaciones-reportes').html('$ '+number_format(total,2));
                                    
                                }*/
                           
                            } );
                
        }
</script>

@endsection