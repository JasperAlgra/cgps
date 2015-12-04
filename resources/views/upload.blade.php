

@extends('layouts.master')

@section('title', 'Upload')

@section('sidebar')
    @parent


@endsection

@section('content')



    <div class="dropzone" id="dropzoneFileUpload"></div>

    <script src="{{ asset('assets/dropzone/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/dropzone/dropzone.css') }}">

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl+"/dropzone/uploadFiles",
            params: {
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {

            },
        };
    </script>
@endsection