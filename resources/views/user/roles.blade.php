@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">   
	<div class="card-body">
		<div class="box box-color">
			<div class="box-title">
				<h3> <i class="fa fa-table"></i> Manage roles </h3>
			</div>
			<div style="float:right">
				<a class="btn btn-primary" href="/admin/role/create"><i class="fa fa-plus"></i> Create role</a>
			</div>
			<div class="box-content nopadding">

				<table id="roleTable" class="table table-hover table-bordered" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Gurad name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles as $role)
						<tr data-id="{{$role->id}}" data-name="{{$role->name}}" data-guard_name="{{$role->guard_name}}" data-target="#roleModal">
							<td>{{$role->id}}</td>
							<td class='roleName'>{{$role->name}}</td>
							<td>{{$role->guard_name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="/admin/role/editRole" method="post">
        {{ csrf_field() }}
            <input type="text">  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
			
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#roleTable').DataTable();
		$("#roleTable tbody").on('click','tr',function(){
			var roleId = $(this).data('id');
			var roleName = $(this).data('name');
			var guardName = $(this).data('guard_name');
			$('#exampleModal').modal('toggle'); 
			$('.modal-body').html("<form class='form-horizontal onSubmit='updateRole()' method='post'><input type='hidden' name='roleId' value="+roleId+"><div class='form-group'><div class='row'><label class='col-sm-3 control-label for='textinput'>Role name</label><input  name='roleName' value ="+roleName+" type='text' placeholder='' class='form-control col-sm-5' required=''></div></div>  <div class='form-group'><div class='row'><label class='col-sm-3 control-label for='textinput'>Guard name</label><input name='guardName' value ="+guardName+" type='text' placeholder='' class='form-control col-sm-5' required=''></div></div></form>");
		})
	});
	$("#submitBtn").on('click', function(){
		var roleId = $("input[name =roleId]").val();
		var roleName = $("input[name=roleName]").val();
		var guardName = $("input[name=guardName]").val();
		$.ajax({
	        method: "POST",
	        url: "/admin/role/submit",
	        data: {
	        "_token": "{{ csrf_token() }}",
	        "roleId": roleId,"roleName": roleName, "guardName": guardName
	        }
	        }).done(function( msg ) {
	        if(msg.success){
	            location.reload();
	        }else{
	            alert(msg.message);
	        }
	    });
	});
	
</script>
@endsection