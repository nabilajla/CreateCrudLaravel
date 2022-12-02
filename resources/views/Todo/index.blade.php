@extends("CRUD")

@section('Todo')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('Todo.create')}}">Create Team</a>
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
                    @foreach($Todo as $todo)
                    <tr>
			            		<td>{{ $todo->id}}</td>
		<td>{{ $todo->title}}</td>
		<td>{{ $todo->body}}</td>
		<td>{{ $todo->created_at}}</td>
		<td>{{ $todo->updated_at}}</td>
		<td> <a class="btn btn-success" href="{{route('Todo.show', $todo->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('Todo.edit', $todo->id )}}" > Edit </a></td>
		<td> <form action="{{route('Todo.destroy', $todo->id )}}" method="POST" >
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
