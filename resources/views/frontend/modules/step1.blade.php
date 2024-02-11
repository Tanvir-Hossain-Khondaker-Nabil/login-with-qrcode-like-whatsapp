@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluid p-5 bg-custom-gradient">
        <div class="container">
            @include('frontend.includes.head')
            <div class="title mb-5">
                <div class="col-12 text-center">
                    <h5 class="choose">Choose Your</h5>
                    <h4 class="lang">System Experience</h4>
                </div>
            </div>
            <div class="row pt-5 divider">
                <div class="col-md-3"></div>
                <div class="col-md-3 paddingleft50">
                    <a href="{{ url('waiting') }}" class="card english">
                        <i class="fa-solid fa-qrcode"></i>
                        <h4>QR Code</h4>
                    </a>
                </div>
                <div class="col-md-3 paddingright50">
                    <a class="card bangla">
                        <i class="fa-solid fa-building-columns"></i>
                        <h4>Mobile Banking</h4>
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>
            @include('frontend.includes.footer-without-logout')
        </div>
    </div>
@endsection
