<div class="form-group">
    {!! Form::label('name','Name') !!}
    <div>
        {!! Form::text('name',null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('price','Price') !!}
    <div>
        {!! Form::number('price',null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'price','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>

    
       
   


        
<?php
    $image = asset('images/map.png');

    if (isset($product)) {
    if ($product->avatar) {
    $image = $product->avatar;
    }
    }
    ?>

    <div class="form-group">

        <div class="form-group pull-right">
            <img width="100px" src="{!! $image !!}" class="show-product-img imgshow">
        </div>

        <div class="form-group">
            
            {!! Form::label('image', 'Image') !!}
            {!! Form::file('image', ['class' => 'choose-image', 'id' => 'image']) !!}
            <p class="help-block" id="error">Limit 2MB</p>
        </div>

    </div>
    @include('admin.product.partial.image_modal')
        
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
