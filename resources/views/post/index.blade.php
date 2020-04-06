@extends('layouts.app')


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Content Post</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Table 1 - Content Post dengan email, name penulisnya</h6>
		</div>
		<div class="card-body">

			<div class="row mb-4">
				<div class="col-8">
					<a href="{{url('post/create')}}" class="btn btn-sm btn-primary create"><i class="fas fa-plus"></i> Create</a>
				</div>
			</div>

			@if(session()->get('success'))
			<div class="alert alert-success">
				{{ session()->get('success') }}  
			</div><br/>
			@endif
			
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Post</th>
							<th>Author</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $key => $post)
						<tr>
							<td>{{ $posts->firstItem() + $key }}</td>
							<td>{{ $post->title }} |<small><i> {{date('d-m-Y H:i:s', strtotime($post->created_at))}}</i></small></td>
							<td>{{ $post->user->name }} <small>( {{$post->user->email}} )</small></td>
							<td>
								<form action="{{ route('post.destroy', $post->id)}}" method="post">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $posts->links() }}
			</div>
		</div>
	</div>

</div>

@endsection

