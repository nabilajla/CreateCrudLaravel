@extends('CRUD')

@section(Nabil)

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

                    </tr>
                </thead>
                <tbody>
                    @foreach($Nabil as ${{ModelSmall}})
                    <tr>
			            		<td> $nabil->id</td>
		<td> $nabil->Name</td>
		<td> $nabil->created_at</td>
		<td> $nabil->updated_at</td>

                    </tr>
                    @endforeach
		</tbody>
	    </table>
        </div>
@endsection@extends('CRUD')

@section(Nabil)

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
                    </tr>
                </thead>
                <tbody>
                    @foreach($Nabil as $nabil)
                    <tr>
			            <td> $nabil->id</td>
                        <td> $nabil->Name</td>
                        <td> $nabil->created_at</td>
                        <td> $nabil->updated_at</td>

                    </tr>
                    @endforeach
		</tbody>
	    </table>
        </div>
@endsection