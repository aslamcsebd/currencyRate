@extends('layouts.app')

@section('content')
@include('includes.alertMessage')

    <div class="content-wrapper p-4">
		{{ Illuminate\Mail\Markdown::parse(file_get_contents(base_path() . '/README.md')) }}
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="https://adminlte.io/" target="_blank">AdminLTE</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
@endsection
