@extends('layouts.app')

@section('content')
@include('includes.alertMessage')

    <div class="content-wrapper p-4">

        <h4 class="text-center">Commission rate (%)</h4>
        @if(isset($rates))
            <table id="table" class="table table-bordered table-hover text-center">
                <thead class="bg-info">
                    <th>SL</th>
                    <th>Client type</th>
                    <th>Operation type</th>
                    <th>Percentage</th>
                </thead>
                <tbody>
                    @foreach($rates as $rate)
                        <tr>
                            <td width="5">{{ $loop->iteration }}</td>
                            <td>{{ $rate->client_type }}</td>
                            <td>{{ $rate->operation_type }}</td>
                            <td>{{ $rate->percentage*100 }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="https://adminlte.io/" target="_blank">AdminLTE</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
@endsection
