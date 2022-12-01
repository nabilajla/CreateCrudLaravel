@extends("CRUD")
@section("Nabil")
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
                <td>{{$Nabil->id}}</td>

                </tr>
	<tr>
                <td>Name</td>
                <td>{{$Nabil->Name}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$Nabil->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$Nabil->updated_at}}</td>

                </tr>
	
	</tbody>
</table>

</div>