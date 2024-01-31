@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">Great, almost done!</h5>
                <h4 class="lang">Remove your card</h4>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-center">
                <img src="{{ asset('assets/frontend/output-atm.gif') }}" style="width: 200px;" alt="">
            </div>
        </div>            
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center js-date">
                <h6>Wed 28th, 02:30pm</h6>
            </div>
            <div class="col-md-4 text-end">
                <button class="return-card"><i class="fa-solid fa-road"></i> Return Card</button>
            </div>
        </div>
    </div>
</div>
@endsection