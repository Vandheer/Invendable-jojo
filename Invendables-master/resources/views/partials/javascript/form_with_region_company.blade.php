    <script>

     var region_departments = Array();

     @foreach ($departments as $region_id => $departments_array)
        region_departments[{{$region_id}}] = Array(); 
         @foreach ($departments_array as $department)
            region_departments[{{$region_id}}]['{{$department['code']}}'] = "{!!$department['name']!!}"; 
        @endforeach
     @endforeach

    $(function ()
    {
        $('#department').closest('.form-group').hide();
        $('#region').change(function()
        {
            var option = $(this).find('option:selected').val();
            if(option != 0){
                $('#department option').remove();
                $('#department').closest('.form-group').show();
                for (key in region_departments[option]) {
                    $('#department').append($('<option>', {
                        value: key,
                        text: region_departments[option][key]
                    }));
                }
            }
            else {
                $('#department').closest('.form-group').hide();
            }
        });

        $('#region, #department').change(function(){
            $('#postal_code').val('');
            $('#city').val('');
        })
    });
    $(function() {
        $('.company-unique').addClass('hidden');
        $('.company-unique input').removeAttr( "required" );
        $('input[type=radio][name=user_type]').change(function() {
            if ($(this).val() == '0') {
               $('.company-unique input').removeAttr( "required" );
               $('.company-unique').addClass('hidden');
            } else if ($(this).val() == '1') {
                $('.company-unique input').prop('required',true);
                $('.company-unique').removeClass('hidden');
            }
        });
     
    });
    </script>