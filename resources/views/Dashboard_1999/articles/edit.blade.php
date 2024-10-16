@extends("CRUD")
@section("articles")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('articles.update' ,$articles->id ) }}" method="POST">
@csrf
@method('PUT')
      <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" name="Title" class="form-control" value="{{$articles->Title}}" id="Title" placeholder="Enter a Title">
  </div>
  <div class="form-group">
    <label for="paragraph">paragraph</label>
    <input type="text" name="paragraph" class="form-control" value="{{$articles->paragraph}}" id="paragraph" placeholder="Enter a paragraph">
  </div>
  <div class="form-group">
    <label for="Photo">Photo</label>
    <input type="text" name="Photo" class="form-control" value="{{$articles->Photo}}" id="Photo" placeholder="Enter a Photo">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>