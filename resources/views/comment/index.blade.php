@extends('layouts.app')


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Comment Guest</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Table 3 - Comment Guest yang usernya tidak terdaftar disistem</h6>
		</div>
		<div class="card-body">

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
							<th>Comment</th>
							<th>Guest</th>
						</tr>
					</thead>
					<tbody>
						@foreach($comments as $key => $comment)
						<tr>
							<td>{{ $comments->firstItem() + $key }}</td>
							<td>{{ $comment->comment }}</td>
							<td>{{ $comment->name }} <small>( {{$comment->email}} )</small></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $comments->links() }}
			</div>
		</div>
	</div>

</div>

@endsection

