@extends("CRUD")

@section('Nabil')

<div class="container bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2  " href="{{ route('Nabil.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>Name</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>show</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($Nabil as $nabil)
                    <tr>
			            		<td>{{ $nabil->id}}</td>
		<td>{{ $nabil->Name}}</td>
		<td>{{ $nabil->created_at}}</td>
		<td>{{ $nabil->updated_at}}</td>
		<td> <a class="btn btn-primary" href="{{route('Nabil.show', $nabil->id )}}" > show </a></td>

                    </tr>
                    @endforeach
		</tbody>
	    </table>
        </div>
@endsection