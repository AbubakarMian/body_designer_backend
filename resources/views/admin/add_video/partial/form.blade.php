
{{-- 
<div class="form-group">
    {!! Form::label('price','Price') !!}
    <div>
        {!! Form::number('price',null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'price','required',
        'maxlength'=>"100"]) !!}
    </div>
</div> --}}

<div class="form-group">  
<button type="button"  id="addnewtbtn"  onclick="addmybutton();" style="background-color:white;">add video </button></br>
<div id="textboxDiv"></div>
   
</div>


        
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

            function validateForm(){
        return true;
    }

        </script>

        @endsection

