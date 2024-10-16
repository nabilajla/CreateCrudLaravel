@extends("CRUD")

@section('contact')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('contact.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $contact)
                    <tr>
			            		<td>{{ $contact->id}}</td>
		<td>{{ $contact->Name}}</td>
		<td>{{ $contact->Phone}}</td>
		<td>{{ $contact->Email}}</td>
		<td>{{ $contact->created_at}}</td>
		<td>{{ $contact->updated_at}}</td>
		<td> <a class="btn btn-success" href="{{route('contact.show', $contact->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('contact.edit', $contact->id )}}" > Edit </a></td>
		<td> <form action="{{route('contact.destroy', $contact->id )}}" method="POST" >
                    @csrf
                    @Method("DELETE")
                <button class="btn btn-danger">Delete</button>
                </form>
                </td>

                    </tr>
                    @endforeach
		</tbody>
	    </table>
        </div>
@endsection
