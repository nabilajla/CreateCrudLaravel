@extends("CRUD")

@section('contacts')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('contacts.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th></th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contacts)
                    <tr>
			            		<td>{{ $contacts->}}</td>
		<td> <a class="btn btn-success" href="{{route('contacts.show', $contacts->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('contacts.edit', $contacts->id )}}" > Edit </a></td>
		<td> <form action="{{route('contacts.destroy', $contacts->id )}}" method="POST" >
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
