<div class="form-group">
    {!! Form::label('weekday_num','Weekday Number') !!}


    <select id="select-example" class="form-control"  name="weekday_num"  placeholder="Select weekday_number...">
        <option name="weekday_num" value="1">1</option>
        <option name="weekday_num" value="2">2</option>
        <option name="weekday_num" value="3">3</option>\
        <option name="weekday_num" value="4">4</option>
        <option name="weekday_num" value="5">5</option>
        <option name="weekday_num" value="6">6</option>
        <option name="weekday_num" value="7">7</option>
    </select>




    
       
   


        




 
        
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
