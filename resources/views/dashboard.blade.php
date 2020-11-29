@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">

        <div class="col-sm-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_income }}</h3>
                    <p>Total Income</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('income.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_expense }}</h3>
                    <p>Total Expenses</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('expense.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_wishlist }}</h3>
                    <p>In Wishlist</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('wish_list.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection
