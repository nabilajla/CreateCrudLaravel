@extends("CRUD")
@section("contacts")
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
                <td></td>
                <td>{{$contacts->}}</td>

                </tr>
	
	</tbody>
</table>

</div>