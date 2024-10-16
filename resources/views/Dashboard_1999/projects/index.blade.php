@extends("Dashboard_1999.CRUD")

@section('projects')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('projects.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>Title</th>
		<th>Details</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>ActiveIndex</th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $projects)
                    <tr>
			            		<td>{{ $projects->id}}</td>
		<td>{{ $projects->Title}}</td>
		<td>{{ $projects->Details}}</td>
		<td>{{ $projects->created_at}}</td>
		<td>{{ $projects->updated_at}}</td>
		<td>{{ $projects->ActiveIndex}}</td>
		<td> <a class="btn btn-success" href="{{route('projects.show', $projects->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('projects.edit', $projects->id )}}" > Edit </a></td>
		<td> <form action="{{route('projects.destroy', $projects->id )}}" method="POST" >
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
