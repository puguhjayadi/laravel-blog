@extends('layouts.app')


@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">User</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Table 2 - User List dengan comment dari usernya</h6>
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
							<th>User Author</th>
							<th>Comment</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $key => $user)
						<tr>
							<td>{{ $users->firstItem() + $key }}</td>
							<td>{{ $user->name }} <small>( {{$user->email}} )</small></td>
							<td>{{ $user->comment }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $users->links() }}
			</div>
		</div>
	</div>

</div>

@endsection

