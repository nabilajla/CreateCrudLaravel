@extends("CRUD")
@section("contacts")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
@Method("POST")
<input class="btn btn-primary" type="submit" />
</form>

</div>