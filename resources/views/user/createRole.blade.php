@extends('layouts.master')
@section('content')
<div class="card shadow mb-4">   
    <div class="card-body">
        <form class="form-horizontal" action="{{$formAction}}" method="post">
        {{ csrf_field() }}
            @include('user/roleForm')  
        </form>
    </div>
</div>
@endsection

