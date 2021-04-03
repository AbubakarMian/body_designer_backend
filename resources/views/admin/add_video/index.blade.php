@extends('layouts.default_module')
@section('module_name')
{!!$plan->name!!}
@stop
{{-- @section('add_btn')

{!! Form::open(['method' => 'get', 'route' => ['product.create'], 'files'=>true]) !!}
<span>{!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}</span>
{!! Form::close() !!}
@stop --}}

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

        <th>Add Video</th>
	
      

	</tr>
</thead>
<tbody>

    

    

        
   
		<td>
			<button type="button"  id="addnewtbtn"  onclick="addmybutton();" style="background-color:white;">add video </button></br>
			<div id="textboxDiv"></div>
		
	</td>
		
     

	


</tbody>
@section('pagination')
{{-- <span class="pagination pagination-md pull-right">{!! $product->render() !!}</span> --}}
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


@section('app_jquery')

<script>
	var vidoes_options = [];
	@foreach($videos as $key_id=>$video)
		vidoes_options.push("<option value='{!!$key_id!!}'>{!!$video!!}</option>");
	@endforeach
	
function addmybutton(){

	var dd = $('#textboxDiv').append(addVideoHtml()); 
	
	console.log(dd);
	
	}

	function addVideoHtml(){
		return `<div>`+selectVideoHtml()+`			
				<input type="number" name="day_num[]"placeholder="day number"/>
			</div>
		`;
	}

	function selectVideoHtml(){
		
		var optionsHtml = '<select name="videos[]" >';
		for(var i =0;i<vidoes_options.length;i++){
			optionsHtml = optionsHtml+vidoes_options[i];
		}
		optionsHtml = optionsHtml + '</select>';
		return optionsHtml;
	}


</script>
