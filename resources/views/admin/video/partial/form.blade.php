<?php

$avatar =  asset('images/courses2.png');

if(isset($video)){

    if($video->url){
        $video = $video->url;
    }
}
?>
    
       
   

    <div class="form-group">

        <div class="form-group pull-right">
            <img width="100px" src="{!! $video !!}" class="show-product-img imgshow">
        </div>

        <div class="form-group">
            {!! Form::label('video','Video') !!}
            {!! Form::file('video', ['class' => 'choose-video', 'id'=>'avatar'] ) !!}
            <p class="help-block" id="error">Limit 2MB</p>
        </div>
        <div class="form-group">
            {!! Form::textarea('video_visible',null,['class'=>'form-control' ,
            'rows'=>'3','placeholder'=>'Enter video URL',
            'maxlength'=>"225"]) !!}
            {!!Form::hidden('video')!!}
    
        </div> 

    </div>
    @include('admin.video.partial.image_modal')
        
        <span id="err" class="error-product"></span>


        <div class="form-group col-md-12">
        </div>



     

        <div class="col-md-5 pull-left">
            <div class="form-group text-center">
                <div>
                    {!!Form::submit('Save',
                    ['class'=>'btn btn-primary btn-block btn-lg btn-parsley','onblur'=>'return validateForm();'])!!}
                </div>
            </div>
        </div>

        

        @section('app_jquery')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script>
            function validateForm(){
        return true;
    }

        </script>

        @endsection
