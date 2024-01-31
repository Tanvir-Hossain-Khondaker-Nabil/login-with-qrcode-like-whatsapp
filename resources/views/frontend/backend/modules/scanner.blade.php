@extends('frontend.backend.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="divider"></div>
<main class="mt-5">
    <div id="reader"></div>
    <div id="result"></div>
    <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
</main>
@endsection
@push('css')
<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #reader {
        width: 600px;
    }
    #result {
        text-align: center;
        font-size: 1.5rem;
    }
    .divider{
        padding:50px 0 ;
    }
</style>
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
    const scanner = new Html5QrcodeScanner('reader', { 
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        },  // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success (result) {

        document.getElementById('result').innerHTML = `
        <h2>Success!</h2>
        `;
        // Prints result as a link inside result element

        scanner.clear();
        // Clears scanning instance

        document.getElementById('reader').remove();



        let user_id = document.getElementById("user_id").value
        
        axios.put(window.location.origin+'/qr/update/'+result, {
            userId: user_id,
        })
        .then((response) => {
            console.log(response.data);
        })
        .catch((error) => {
            console.error(error);
        });

    
    }
    console.log(url)

    function error(err) {
        console.error(err);
        // Prints any errors to the console
    }
</script>
@endpush