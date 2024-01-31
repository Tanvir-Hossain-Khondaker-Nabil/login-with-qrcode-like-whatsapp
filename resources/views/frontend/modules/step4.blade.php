@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">What kind of account would</h5>
                <h4 class="lang">You like to access?</h4>
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-3"></div>
            <div class="col-md-3 paddingleft50">
                <a href="{{ url('receipt') }}" class="card english">
                    <!-- <i class="fa-solid fa-piggy-bank"></i> -->
                    <i class="fa-solid fa-building-columns"></i>
                    <h4>Current Account</h4> 
                </a>
            </div>
            <div class="col-md-3 paddingright50">
                <div class="card bangla">
                    <i class="fa-solid fa-id-card"></i>
                    <h4>Saving Account</h4>                         
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center  js-date">
                <h6>Wed 28th, 02:30pm</h6>
            </div>
            <div class="col-md-4 text-end">
                <button class="return-card"><i class="fa-solid fa-road"></i> Return Card</button>
            </div>
        </div>
    </div>
</div>

@endsection