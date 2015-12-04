@extends('layouts.dashboard')

@section('section')
    <div class="conter-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Upload CSV
                            <div class="panel-control pull-right">
                                <a class="panelButton"><i class="fa fa-refresh"></i></a>
                                <a class="panelButton"><i class="fa fa-minus"></i></a>
                                <a class="panelButton"><i class="fa fa-remove"></i></a>
                            </div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="dropzone" id="dropzoneFileUpload"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-info">

                    <div class="panel-heading">
                        <h3 class="panel-title">Result
                            <div class="panel-control pull-right">
                                <a class="panelButton"><i class="fa fa-refresh"></i></a>
                                <a class="panelButton"><i class="fa fa-minus"></i></a>
                                <a class="panelButton"><i class="fa fa-remove"></i></a>
                            </div>
                        </h3>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset("css/dropzone.css")}}">
@stop

@section('js')
    @parent

    <script src="{{ asset("js/dropzone.js")}}"></script>

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/cgps/file",
            params: {
                _token: token
            }
        })
                .on("addedfile", function (file) {
                    console.log(file);
                    /* Maybe display some more file information on your page */
                });

        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 20, // MB
            addRemoveLinks: true,
            accept: function (file, done) {

            },

        };
    </script>
@stop