@extends('frontend.layouts.master')

@section('content')
    <div id="content" class="container-fluid p-5 bg-custom-gradient">
        <div class="container">
            @include('frontend.includes.head')
            <div class="row title mb-5">
                <div class="col-12 text-center">
                    <h5 class="choose">Great, almost done!</h5>
                    <h4 class="lang">Receive your cash</h4>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-center">
                    <img src="{{ asset('assets/frontend/output-atm.gif') }}" style="width: 200px;" alt="">
                </div>
            </div>
            @include('frontend.includes.footer-without-logout')
        </div>
    </div>
    {{-- <img id="load" className=' w-16 py-20' src="https://i.gifer.com/ZZ5H.gif" alt="" /> --}}
    {{-- <img id="load" src="{{ asset('assets/output-onlinegiftools.gif') }}" style="width: 400px" alt="" /> --}}
    <audio autoplay src="{{ asset('assets/receive_your_cash.mp3') }}"></audio>
@endsection
@push('css')
    <style>
        /* div#content {
        display: none;
        } */
        #load {
            top: 140px;
            position: absolute;
            z-index: 1000;
            cursor: wait;
            left: 470px;
            width: 200px;
        }
    </style>
@endpush
@push('js')
    <script>
        function preloader() {
            document.getElementById("load").style.display = "none";
            document.getElementById("content").style.display = "block";
        } //preloader
        window.onload = preloader;
    </script>
@endpush
