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
                <a href="{{ url('qr') }}" class="card bangla">
                    <i class="fa-solid fa-language"></i>
                    <h4>Bangla</h4>                         
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
        @include('frontend.includes.footer')
    </div>
</div>
@endsection