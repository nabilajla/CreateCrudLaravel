@extends("CRUD")
@section("articles")
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
                <td>{{$articles->id}}</td>

                </tr>
	<tr>
                <td>Title</td>
                <td>{{$articles->Title}}</td>

                </tr>
	<tr>
                <td>paragraph</td>
                <td>{{$articles->paragraph}}</td>

                </tr>
	<tr>
                <td>Photo</td>
                <td>{{$articles->Photo}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$articles->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$articles->updated_at}}</td>

                </tr>
	
	</tbody>
</table>

</div>