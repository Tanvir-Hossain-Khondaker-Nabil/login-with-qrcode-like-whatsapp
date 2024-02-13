@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row title mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">Please do not leave till the transaction is completed, <br>
                    When 'Ok/Success' message displays in your mobile <br>
                    Press 'Continue' here
                </h5>
                {{-- <h4 class="lang">Please Wait!</h4> --}}
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-3"></div>
            <div class="col-md-6 service-logo">
                <div style="height:150px"></div> 
            </div>
            <div class="col-md-3"></div>
        </div>
        @include('frontend.includes.footer-without-logout')
    </div>
</div>
@endsection