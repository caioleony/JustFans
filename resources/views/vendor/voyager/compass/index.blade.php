@extends('voyager::master')

@section('css')

    @include('voyager::compass.includes.styles')

@stop

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-compass"></i>
        <p> {{ __('voyager::generic.compass') }}</p>
    </h1>
@stop

@section('content')

    <div class="container-fluid">
        @include('voyager::alerts')
    </div>

    <div class="page-content compass container-fluid">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#logs"><i class="voyager-logbook"></i> {{ __('voyager::compass.logs.title') }}</a></li>
        </ul>

        <div class="tab-content">

          <div id="logs" class="tab-pane fade in active">
            <div class="row">
                @include('voyager::compass.includes.logs')
            </div>
          </div>
        </div>

    </div>

@stop
@section('javascript')
    <script>
        $('document').ready(function(){
            $('.collapse-head').click(function(){
                var collapseContainer = $(this).parent();
                if(collapseContainer.find('.collapse-content').hasClass('in')){
                    collapseContainer.find('.voyager-angle-up').fadeOut('fast');
                    collapseContainer.find('.voyager-angle-down').fadeIn('slow');
                } else {
                    collapseContainer.find('.voyager-angle-down').fadeOut('fast');
                    collapseContainer.find('.voyager-angle-up').fadeIn('slow');
                }
            });
        });
    </script>
    <!-- JS for commands -->
    <script>

        $(document).ready(function(){
            $('.command').click(function(){
                $(this).find('.cmd_form').slideDown();
                $(this).addClass('more_args');
                $(this).find('input[type="text"]').focus();
            });

            $('.close-output').click(function(){
                $('#commands pre').slideUp();
            });
        });

    </script>

    <!-- JS for logs -->
    <script>
      $(document).ready(function () {
        $('.table-container tr').on('click', function () {
          $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
          "order": [1, 'desc'],
          "stateSave": true,
          "language": {!! json_encode(__('voyager::datatable')) !!},
          "stateSaveCallback": function (settings, data) {
            window.localStorage.setItem("datatable", JSON.stringify(data));
          },
          "stateLoadCallback": function (settings) {
            var data = JSON.parse(window.localStorage.getItem("datatable"));
            if (data) data.start = 0;
            return data;
          }
        });

        $('#delete-log, #delete-all-log').click(function () {
          return confirm('{{ __('voyager::generic.are_you_sure') }}');
        });
      });
    </script>
@stop
