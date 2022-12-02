@extends("CRUD")
@section("Todo")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('Todo.store') }}" method="POST">
    @csrf
@Method("POST")
  <div class="form-group">
    <label for="title">title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Enter a title">
  </div>
  <div class="form-group">
    <label for="body">body</label>
    <input type="text" name="body" class="form-control" id="body" placeholder="Enter a body">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>