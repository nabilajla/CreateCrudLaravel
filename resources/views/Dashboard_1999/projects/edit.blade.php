@extends("CRUD")
@section("projects")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('projects.update' ,$projects->id ) }}" method="POST">
@csrf
@method('PUT')
      <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" name="Title" class="form-control" value="{{$projects->Title}}" id="Title" placeholder="Enter a Title">
  </div>
  <div class="form-group">
    <label for="Details">Details</label>
    <input type="text" name="Details" class="form-control" value="{{$projects->Details}}" id="Details" placeholder="Enter a Details">
  </div>
  <div class="form-group">
    <label for="created_at">created_at</label>
    <input type="text" name="created_at" class="form-control" value="{{$projects->created_at}}" id="created_at" placeholder="Enter a created_at">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>