@extends("CRUD")
@section("contact")
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
                <td>{{$contact->id}}</td>

                </tr>
	<tr>
                <td>Name</td>
                <td>{{$contact->Name}}</td>

                </tr>
	<tr>
                <td>Phone</td>
                <td>{{$contact->Phone}}</td>

                </tr>
	<tr>
                <td>Email</td>
                <td>{{$contact->Email}}</td>

                </tr>
	<tr>
                <td>created_at</td>
                <td>{{$contact->created_at}}</td>

                </tr>
	<tr>
                <td>updated_at</td>
                <td>{{$contact->updated_at}}</td>

                </tr>
	
	</tbody>
</table>

</div>