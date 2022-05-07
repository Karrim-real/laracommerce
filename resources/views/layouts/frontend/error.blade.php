@if (count($errors))
<div class="col-md-6">
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li style="list-style: none">{{ $error }}</li>
    @endforeach
    </ul>
    </div>-
</div>
@endif

