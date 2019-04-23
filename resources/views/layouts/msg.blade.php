@if ($errors->any())
 @foreach ($errors->all() as $error)
       
  <div class="alert alert-danger">
      <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none';">×</button>
      <span><b> Errors - </b>{{ $error }}</span>
  </div>
 @endforeach

@endif
{{----------------}}
@if(session('flash_message'))
<div class="alert alert-icon alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" area-label="Close">
<span aria-hidden="true">&times;</span>   
</button> 
<i class="mdi mdi-check-all"></i> 
<strong>Oh snap!</strong> {{ session('flash_message')}}
</div>
@endif
{{----------------}}
@if(session('errorMsg'))
  <div class="alert alert-danger">
      <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none';">×</button>
      <span><b> Error - </b>{{ session('errorMsg') }}</span>
  </div>
@endif