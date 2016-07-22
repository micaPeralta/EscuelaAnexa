	
@if(session('success'))
	<div class="alert alert-success">
	<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert">&times</button>
	 	<strong>Exito!</strong>{{ session('success') }}	
	</div>
	
@endif


@if(Session::has('error-auth'))
<div class="alert alert-success">
	<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert">&times</button>
	 	<strong>Exito!</strong>{{Session::get('error-auth')}}	
</div>
@endif