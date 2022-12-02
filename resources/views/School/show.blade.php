@extends("CRUD")
@section("School")
<div class="container card p-2 m-2 bg-light">
    <table class="table table-borderless table-hover ">
                <thead>
			            <tr>
                            <th>Name</th>
                            <th>Action</th>
                            </tr>
                </thead>
                <tbody>
			            <tr>
                <td>id</td>
                <td>{{$School->id}}</td>

                </tr>
	<tr>
                <td>title</td>
                <td>{{$School->title}}</td>

                </tr>
	<tr>
                <td>body</td>
                <td>{{$School->body}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$School->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$School->updated_at}}</td>

                </tr>
	
	</tbody>
</table>

</div>