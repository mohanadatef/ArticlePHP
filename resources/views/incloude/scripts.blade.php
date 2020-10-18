<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{!! Html::script('public/js/jquery.dataTables.min.js') !!}
{!! Html::script('public/js/dataTables.bootstrap.min.js') !!}
<script src="http://www.codermen.com/js/jquery.js"></script>
<script type="text/javascript">
    $('#country_id').change(function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:"GET",
                url:"{{url('get-state-list')}}?country_id="+countryID,
                success:function(res){
                    if(res){
                        $("#city_id").empty();
                        $("#city_id").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#city_id").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#city_id").empty();
                    }
                }
            });
        }else{
            $("#city_id").empty();
        }
    });



    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });

</script>
@yield('footer')