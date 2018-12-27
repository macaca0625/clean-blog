
@foreach($errors->all() as $error)
    <!-- put this in form block -->
    <div class="form-group">
        <div class="form-controll alert alert-danger">{{ $error }}</div>
    </div>
@endforeach
