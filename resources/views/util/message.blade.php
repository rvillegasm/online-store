@if ($message = Session::get('Not Found'))
<div class="alert alert-warning alert-block my-1">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('error'))
<div class="alert alert-warning alert-block my-1">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('success'))
<div class="alert alert-info alert-block my-1">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
