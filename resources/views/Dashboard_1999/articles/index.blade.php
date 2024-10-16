@extends("CRUD")

@section('articles')

<div class="container card p-2 m-2 bg-light">
@if(session()->has('Success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
<a class="btn btn-primary m-2 w-25" href="{{ route('articles.create')}}">Create Team</a>
            <table class="table table-borderless table-hover ">
                <thead>
                    <tr>
			            		<th>id</th>
		<th>Title</th>
		<th>paragraph</th>
		<th>Photo</th>
		<th>created_at</th>
		<th>updated_at</th>
		<th>show</th>
		<th>edit</th>
		<th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $articles)
                    <tr>
			            		<td>{{ $articles->id}}</td>
		<td>{{ $articles->Title}}</td>
		<td>{{ $articles->paragraph}}</td>
		<td>{{ $articles->Photo}}</td>
		<td>{{ $articles->created_at}}</td>
		<td>{{ $articles->updated_at}}</td>
		<td> <a class="btn btn-success" href="{{route('articles.show', $articles->id )}}" > show </a></td>
		<td> <a class="btn btn-primary" href="{{route('articles.edit', $articles->id )}}" > Edit </a></td>
		<td> <form action="{{route('articles.destroy', $articles->id )}}" method="POST" >
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
