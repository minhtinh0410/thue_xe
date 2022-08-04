@if(session('thong-bao'))
<div class="alert alert-{{ session('type') }} alert-dismissible">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong style="font-size: 1rem">{{ session('thong-bao') }}</strong>
</div>
@endif