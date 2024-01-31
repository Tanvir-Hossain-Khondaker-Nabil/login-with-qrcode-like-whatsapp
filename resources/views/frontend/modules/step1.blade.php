@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">Choose Your</h5>
                <h4 class="lang">language experience</h4>
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-3"></div>
            <div class="col-md-3 paddingleft50">
                <a href="{{ url('qr') }}" class="card english">
                    <i class="fa-solid fa-language"></i>
                    <h4>English</h4> 
                </a>
            </div>
            <div class="col-md-3 paddingright50">
                <div class="card bangla">
                    <i class="fa-solid fa-language"></i>
                    <h4>Bangla</h4>                         
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