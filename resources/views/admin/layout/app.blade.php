<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.includes.header')
</head>
<body>
<div>
    @include('admin.includes.headernav')
	@include('admin.includes.sidenav')
	@section('main-content')
		@show
	@include('admin.includes.footer')
</div>
</body>
</html>