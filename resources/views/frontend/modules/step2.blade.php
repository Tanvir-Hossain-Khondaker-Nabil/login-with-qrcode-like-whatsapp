@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
    <div class="container">
        @include('frontend.includes.head')
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h5 class="choose">Scan this QR code</h5>
                <h4 class="lang">On your mobile app</h4>
            </div>
        </div>
        <div class="row divider">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card qr-image">
                    <img src="{{asset($qr->qr)}}" class="img-fluid" alt=""> 
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        @include('frontend.includes.footer')
    </div>
</div>
<input type="hidden" id="qr_code" value="{{$string }}">
<audio autoplay src="{{asset('assets/qrcode.mp3')}}"></audio>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       let qr_code = document.getElementById("qr_code").value
       setInterval(async function () {
        await axios.get(window.location.origin+'/qr/fetch/'+qr_code).then(res=>{
            if (res.data.length > 0) {
              if (res.data[0].status) {
                window.location.href = window.location.origin+`/public/service/${qr_code}`
              }
            }
        })
       }, 1000);
    </script>
@endpush