 @if($errors->any())
 	@foreach ($errors->all() as $error)
 		<div class="alert alert-danger">{{ $error }}</div>
 	@endforeach
 @endif
 @if(session('message'))
 	<div class="alert alert-success">{{ session('message') }}</div>
 @endif
 @if(session('message_error'))
 	<div class="alert alert-danger">{{ session('message_error') }}</div>
 @endif