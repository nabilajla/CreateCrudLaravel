@extends("CRUD")
@section("contact")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('contact.store') }}" method="POST">
    @csrf
@Method("POST")
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="Name" class="form-control" id="Name" placeholder="Enter a Name">
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="text" name="Phone" class="form-control" id="Phone" placeholder="Enter a Phone">
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="text" name="Email" class="form-control" id="Email" placeholder="Enter a Email">
  </div>
<input class="btn btn-primary" type="submit" />
</form>

</div>