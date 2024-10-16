@extends("CRUD")
@section("projects")
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
                <td>{{$projects->id}}</td>

                </tr>
	<tr>
                <td>Title</td>
                <td>{{$projects->Title}}</td>

                </tr>
	<tr>
                <td>Details</td>
                <td>{{$projects->Details}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$projects->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$projects->updated_at}}</td>

                </tr>
	<tr>
                <td>ActiveIndex</td>
                <td>{{$projects->ActiveIndex}}</td>

                </tr>
	
	</tbody>
</table>

</div>