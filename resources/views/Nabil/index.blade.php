@extends("CRUD")

@section('Nabil')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('Nabil.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>Name</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($Nabil as $nabil)
                    <tr>
			            		<td>{{ $nabil->id}}</td>
		<td>{{ $nabil->Name}}</td>
		<td>{{ $nabil->created_at}}</td>
		<td>{{ $nabil->updated_at}}</td>
		<td> <a class="btn btn-success" href="{{route('Nabil.show', $nabil->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('Nabil.edit', $nabil->id )}}" > Edit </a></td>
		<td> <form action="{{route('Nabil.destroy', $nabil->id )}}" method="POST" >
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
