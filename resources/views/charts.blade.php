@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    @push('js')
        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
        <!-- Your application script -->
        <script>
          const chart = new Chartisan({
            el: '#chart',
            url: "@chart('income_chart')",
          });
        </script>
    @endpush
@endsection
