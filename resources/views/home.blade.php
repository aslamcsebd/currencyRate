@extends('layouts.app')

@section('content')
@include('includes.alertMessage')

    <div class="content-wrapper p-4">

        <h4 class="text-center">Date : {{date('Y-m-d')}}</h4>
        @if(isset($todayCurrency))
            <table id="table" class="table table-bordered table-hover text-center">
                <thead class="bg-info">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Rate</th>
                </thead>
                <tbody>
                    @foreach($todayCurrency as $currency)
                        <tr>
                            <td width="5">{{ $loop->iteration }}</td>
                            <td>{{ $currency->currency }}</td>
                            <td>{{ $currency->rate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; {{date('Y')}} <a href="https://adminlte.io/" target="_blank">AdminLTE</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
@endsection
