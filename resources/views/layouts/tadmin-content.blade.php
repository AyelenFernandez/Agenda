@section('content')
<section class="content">
	@include('adminlte-templates::common.errors')
	<div class="box box-primary">
		<div class="headerBox">
			@yield('header')
		</div>
		<div class="box-body">
			@yield('body')
		</div>
	</div>
</section>
@endsection