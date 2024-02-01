@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">Time to make a dicision now.</h5>
                <h4 class="lang">Go green, maybe?</h4>
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-3">
            </div>
            <div class="col-md-3 paddingleft30">
                <a href="{{ url('complete') }}" class="card english" style="height:109%;padding-top: 150px;">
                    <i class="fa-brands fa-pagelines fa-xl mb-4"></i>
                    <h4>No Receipt</h4>
                </a>
            </div>
            <div class="col-md-3 paddingright30">
                <div class="card english mb-4" style="height:52%;padding-top: 60px;">
                    <i class="fa-solid fa-at"></i>
                    <h4>Email Receipt</h4>
                </div>
                <div class="card english" style="height:52%;padding-top: 60px;">
                    <i class="fa-solid fa-print"></i>
                    <h4>Print Receipt</h4>
                </div>
            </div>                
            <div class="col-md-3">
            </div>
        </div>
        @include('frontend.includes.footer')
    </div>
</div>
@endsection