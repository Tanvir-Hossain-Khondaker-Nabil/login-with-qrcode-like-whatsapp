@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row title mb-5">
            <div class="col-12 text-center">
                <h5 class="choose"><i>Please Wait...</i></h5>
                {{-- <h4 class="lang">Please Wait!</h4> --}}
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-3"></div>
            <div class="col-md-6 service-logo">
                <img src="{{ asset('assets/rcreation-service.jpg') }}" alt="">
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
      setTimeout(function(){
        window.location.href = window.location.origin+`/public/qr`;
      }, 2000);  
    </script>
@endpush