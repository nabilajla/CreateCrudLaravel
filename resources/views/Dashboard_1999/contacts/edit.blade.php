@extends("CRUD")
@section("contacts")
<div class="container card p-2 m-2 bg-light">
    <form action="{{ route('contacts.update' ,$contacts->id ) }}" method="POST">
@csrf
@method('PUT')
    <input class="btn btn-primary" type="submit" />
</form>

</div>