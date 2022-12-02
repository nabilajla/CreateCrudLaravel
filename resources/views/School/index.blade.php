@extends("CRUD")

@section('School')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('School.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>title</th>
		<th>body</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($School as $school)
                    <tr>
			            		<td>{{ $school->id}}</td>
		<td>{{ $school->title}}</td>
		<td>{{ $school->body}}</td>
		<td>{{ $school->created_at}}</td>
		<td>{{ $school->updated_at}}</td>
		<td> <a class="btn btn-success" href="{{route('School.show', $school->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('School.edit', $school->id )}}" > Edit </a></td>
		<td> <form action="{{route('School.destroy', $school->id )}}" method="POST" >
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
