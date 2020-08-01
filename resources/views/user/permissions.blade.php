@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">   
    <div class="card-body">
        <div class="box box-color">
            <div class="box-title">
                <h3> <i class="fa fa-table"></i> Manage roles </h3>
            </div>
            <div style="float:right">
                <a class="btn btn-primary" href="/admin/role/create"><i class="fa fa-plus"></i> Create User</a>
            </div>
            <div class="box-content nopadding">
                <table class="table table-bordered" id="permissionTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Permission</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                    	<td>{{$permission->id}}</td>
                    	<td>{{$permission->name}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	  $('#permissionTable').DataTable();
	});
</script>
@endsection