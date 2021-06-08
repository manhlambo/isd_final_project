@if(Session::has('create'))
<div class="alert alert-success alert-dismissible fade show">
  {{Session::get('create')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif(Session::has('update'))
<div class="alert alert-success alert-dismissible fade show">
  {{Session::get('update')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif(Session::has('destroy'))
<div class="alert alert-danger alert-dismissible fade show">
  {{Session::get('destroy')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif(Session::has('no-email'))
<div class="alert alert-danger alert-dismissible fade show">
    {{Session::get('no-email')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@elseif(Session::has('email-success'))
<div class="alert alert-success alert-dismissible fade show">
    {{Session::get('email-success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif 

