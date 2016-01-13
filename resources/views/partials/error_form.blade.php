@if($errors->has($name))
<div class="col-sm-7 col-md-offset-3 col-xs-12 col-xs-offset-3">
	@include('partials.notification', ['type' => 'danger', 'message' => $errors->first($name)])
</div>
@endif