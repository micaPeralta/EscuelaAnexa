@if(count($errors)>0)
	<div class="alert alert-danger">
		<i class="fa fa-info"></i>
		<button type="button" class="close" data-dismiss="alert">&times</button>
	     Por favor corrige los siguientes errores:
		 <ul>
		 @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach	
		 </ul>
	</div>
@endif


@if(Session::has('error-auth'))
<div class="alert alert-danger">
		<i class="fa fa-info"></i>
		<button type="button" class="close" data-dismiss="alert">&times</button>
	     {{Session::get('error-auth')}}
	</div>
@endif