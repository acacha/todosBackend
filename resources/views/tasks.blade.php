@extends('adminlte::layouts.app')

@section('htmlheader_title')
    TODO LIST
@endsection

@section('main-content')
    <script>
        Window.access_token = {{ $access_token }}
    </script>
        <todos></todos>
@endsection