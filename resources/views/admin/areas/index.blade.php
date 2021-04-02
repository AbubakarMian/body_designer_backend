@extends('layouts.default_module')
@section('module_name')
 Areas
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['areas.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
@stop

@section('table-properties')
width="400px" style="table-layout:fixed;"
@endsection


<style>
	td {
		white-space: nowrap;
		overflow: hidden;
		width: 30px;
		height: 30px;
		text-overflow: ellipsis;
	}
</style>
@section('table')
{{-- {!! Form::open(['method' => 'post', 'route' => ['doctor.search'], 'files'=>true]) !!}
@include('admin.doctor.partial.searchfilters')
{!!Form::close() !!} --}}
{{-- @stop --}}

<thead>
	<tr>

        <th>Name</th>
	   <th>Image</th>
		<th>Edit  </th>
		<th>Delete  </th>
      

	</tr>
</thead>
<tbody>

    @foreach($areas as $a)

    

        <td >{!! ucwords($a->name) !!}</td>
	
		
		<?php if (!$a->avatar) {
			$a->avatar = asset('images/map.png');
			} ?>

			<td><img width="100px" src="{!! $a->avatar  !!}" class="show-product-img imgshow"></td>

       

	
        <td>
			{!! link_to_action('Admin\AreasController@edit',
			'Edit', array($a->id), array('class' => 'badge bg-info')) !!}

        </td>

    	<td>{!! Form::open(['method' => 'POST', 'route' => ['areas.delete', $a->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to proceed?">
				<span class="badge bg-info btn-primary ">
					{!! $a->deleted_at?'Activate':'Deactivate' !!}</span></a>
			{!! Form::close() !!}
		</td>

     
	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $areas->render() !!}</span>
<div class="col-md-3 pull-left">
	<div class="form-group text-center">
		<div>
			{!! Form::open(['method' => 'get', 'route' => ['dashboard']]) !!}
			{!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@stop
