<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{!! Html::script('public/js/jquery.dataTables.min.js') !!}
{!! Html::script('public/js/dataTables.bootstrap.min.js') !!}
<script>
    $(document).ready(function () {

        $('#example').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
        });
    });
</script>
