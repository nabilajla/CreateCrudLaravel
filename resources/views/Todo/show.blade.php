@extends("CRUD")
@section("Todo")
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
                <td>{{$Todo->id}}</td>

                </tr>
	<tr>
                <td>title</td>
                <td>{{$Todo->title}}</td>

                </tr>
	<tr>
                <td>body</td>
                <td>{{$Todo->body}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$Todo->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$Todo->updated_at}}</td>

                </tr>
	
	</tbody>
</table>

</div>