@extends('layouts.default_module')
@section('module_name')
Training Plan
@stop
@section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['training_plan.create'], 'files'=>true]) !!}
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
		<th>Duration</th>
        <th>Edit  </th>
		<th>Delete  </th>
      

	</tr>
</thead>
<tbody>

    @foreach($training_plan as $t)

    

        <td >{!! ucwords($t->name) !!}</td>
		<td >{!! ucwords($t->duration) !!}</td>
		
	
       

	
        <td>
			{!! link_to_action('Admin\TrainingPlanController@edit',
			'Edit', array($t->id), array('class' => 'badge bg-info')) !!}

        </td>

		<td>{!! Form::open(['method' => 'POST', 'route' => ['training_plan.delete', $t->id]]) !!}
			<a href="" data-toggle="modal" name="activate_delete" data-target=".delete" modal_heading="Alert" modal_msg="Do you want to proceed?">
				<span class="badge bg-info btn-primary ">
					{!! $t->deleted_at?'Activate':'Deactivate' !!}</span></a>
			{!! Form::close() !!}
		</td>

     
	</tr>
	@endforeach


</tbody>
@section('pagination')
<span class="pagination pagination-md pull-right">{!! $training_plan->render() !!}</span>
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
