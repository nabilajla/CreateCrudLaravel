@extends("CRUD")
@section("articles")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('articles.store') }}" method="POST">
    @csrf
@Method("POST")
  <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" name="Title" class="form-control" id="Title" placeholder="Enter a Title">
  </div>
  <div class="form-group">
    <label for="paragraph">paragraph</label>
    <input type="text" name="paragraph" class="form-control" id="paragraph" placeholder="Enter a paragraph">
  </div>
  <div class="form-group">
    <label for="Photo">Photo</label>
    <input type="text" name="Photo" class="form-control" id="Photo" placeholder="Enter a Photo">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>