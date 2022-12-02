@extends("CRUD")
@section("Todo")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('Todo.update' ,$Todo->id ) }}" method="POST">
@csrf
@method('PUT')
      <div class="form-group">
    <label for="title">title</label>
    <input type="text" name="title" class="form-control" value="{{$Todo->title}}" id="title" placeholder="Enter a title">
  </div>
  <div class="form-group">
    <label for="body">body</label>
    <input type="text" name="body" class="form-control" value="{{$Todo->body}}" id="body" placeholder="Enter a body">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>