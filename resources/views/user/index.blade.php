@extends('layouts.master')
@section('content')
  	<div class="card shadow mb-4">   
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($allUsers as $user)
            <tr>
            	<td>{{$user->id}}</td>
            	<td>{{$user->name}}</td>
            	<td>{{$user->email}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
	</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	  $('#userTable').DataTable();
	});
</script>
@endsection