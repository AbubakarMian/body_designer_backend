
@extends('layouts.default_edit')
@section('heading')
    {!! ucwords ($plan->name) !!} Plan
   
@endsection
@section('leftsideform')
   
   
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['add_video.save',$plan_id ], 'files'=>true]) !!}
  
    @include('admin.add_video.partial.form')
    {!!Form::close()!!}


    <div class="col-md-5 pull-left">
        <div class="form-group text-center">
            <div>
                {!! Form::open(['method' => 'get', 'route' => ['product.index']]) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-default btn-block btn-lg btn-parsley']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{!!Form::close()!!}




