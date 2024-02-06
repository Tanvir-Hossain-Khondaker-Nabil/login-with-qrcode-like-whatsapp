@extends('frontend.layouts.master')

@section('content')
<div id="content" class="container-fluid p-5 bg-custom-gradient">
  <div class="container">

    @include('frontend.includes.head')
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h5 class="choose">How can you make your day better</h5>
        <h4 class="lang">Select a service below</h4>
      </div>
    </div>
    <div class="row divider">
      <div class="col-md-3 paddingright30">
        <div class="card english withdrawal" style="height:100%;padding-top: 150px;">
          <i class="fa-solid fa-money-bill-transfer"></i>
          <h4>Withdrawal</h4>
        </div>
      </div>
      <div class="col-md-3 paddingright30">
        <div class="card english mb-4" style="height:47%;padding-top: 60px;">
          <i class="fa-regular fa-credit-card"></i>
          <h4>Payment</h4>
        </div>
        <div class="card english" style="height:47%;padding-top: 60px;">
          <i class="fa-solid fa-shuffle"></i>
          <h4>Transfer</h4>
        </div>
      </div>
      <div class="col-md-4">
        <div class="examples">
          <div class="radial" data-gap=".3">
            <a onclick="getcash('hi')">
              <button class="radial_center">
                <i class="fa-regular fa-credit-card fa-xl"></i>
                <h3>Get Cash</h3>
              </button>
            </a>
            <button onclick="amount('500')" class="radial_edge"><i
                class="fa-solid fa-bangladeshi-taka-sign"></i><br>500</button>
            <button onclick="amount('1000')" class="radial_edge"><i
                class="fa-solid fa-bangladeshi-taka-sign"></i><br>1000</button>
            <button onclick="amount('5000')" class="radial_edge"><i
                class="fa-solid fa-bangladeshi-taka-sign"></i><br>5000</button>
            <button onclick="amount('10000')" class="radial_edge"><i
                class="fa-solid fa-bangladeshi-taka-sign"></i><br>10000
            </button>
            <button onclick="amount('20000')" class="radial_edge"><i
                class="fa-solid fa-bangladeshi-taka-sign"></i><br>20000
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-2 paddingleft30">


        <div class="card english mb-3 d-flex align-items-center d-block" onclick="more()">
          <i class="fa-solid fa-ellipsis"></i>
          <h4>More</h4>
        </div>

        <div class="d-none mt-5" id="more">
          <fieldset>
            <label for="" style="font-size: 21px; font-weight:500; padding-right:50px">Amount</label>
            <div class="d-flex gap-1 mt-2">
              <input id="amount" oninput="round(this)" type="text" name="more" style="width: 140px;height:40px"
                class="form-control" placeholder="Enter Amount">
              <button class="btn btn-sm btn-light"><i class="fa-regular fa-floppy-disk fa-2xl"
                  style="color: #00448e"></i></button>
            </div>
          </fieldset>
          <code id="error-msg" style="font-size: 15px;"></code>
        </div>
      </div>
    </div>
    @include('frontend.includes.footer')
  </div>
</div>
<img id="load" src="{{ asset('assets/output-onlinegiftools.gif') }}" style="width: 400px" alt="" />
{{-- <img id="load" className=' w-16 py-20' src="https://i.gifer.com/ZZ5H.gif" alt="" /> --}}
<audio autoplay src="{{asset('assets/welcome.mp3')}}"></audio>
@endsection
@push('css')
<style>
  fieldset {
    margin-top: 12px;
    border: 1px solid #39c;
    padding: 12px;
    -moz-border-radius: 8px;
    border-radius: 8px;
  }
  fieldset {
    display: block;
    margin-inline-start: 2px;
    margin-inline-end: 2px;
    padding-block-start: 0.35em;
    padding-inline-start: 0.75em;
    padding-inline-end: 0.75em;
    padding-block-end: 0.625em;
    min-inline-size: min-content;
    border-width: 2px;
    border-style: groove;
    border-color: rgb(192, 192, 192);
    border-image: initial;
  }
    div#content {
    display: none;
    }
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
  const ns = {
    radial: (r) => {
      //capture radial edges
      let el = $(r),
        e = el.children('.radial_edge');

      //avoid div zero
      if (e.length) {
        //calc orbital angle and radius
        let c = el.children('.radial_center'),
          sa = -360 / e.length, //-360 rotates clockwise, 360 rotates counter
          i = 0, //0 sets first child at top
          cw = el.data('center') || c.width() || 100,
          ew = el.data('edge'),
          gap = el.data('gap') || .2;

        //calc x,y and reposition each edge
        e.each(function () {
          let re = $(this),
            ewa = ew || re.width() || 50,
            rad = (cw + ewa) * (1 + gap),
            x = Math.cos((sa * i) * (Math.PI / 180)) * rad * -1, //-1 flips vertically
            y = Math.sin((sa * i) * (Math.PI / 180)) * rad * -1;
          re.css({
            inset: x + 'px 0 0 ' + y + 'px'
          });
          i++;
        });
      }
    }
  }

  $(document).ready(() => {
    //parse each radial group
    $('.radial').each(function () {
      ns.radial(this);
    });
  });

  function amount(e) {
    $("#more").removeClass('d-none').addClass('d-block')

    $("#amount").val(e)
  }

  function round(e) {
    let val = parseFloat($(e).val());

    let round = Math.round(val / 500) * 500

    // if (val < 500) {
    //   console.log('minimum 500 tk')
    // }
 
    if (val < '500') {      
      $('#error-msg').text('You need withdraw at least 500tk.'); 
      const audio = new Audio(`{{asset('assets/500.mp3')}}`);
      audio.play(); 
    } else if (val !== round) {      
      $('#error-msg').text('Please Amount should be Divisor (GCD) of 500 is 500 itself.');
      const audio = new Audio(`{{asset('assets/500.mp3')}}`);
      audio.play();
    }
    else if (val === 'null') {
      $('#error-msg').text('You need withdraw at least 500tk.');
      const audio = new Audio(`{{asset('assets/500.mp3')}}`);
      audio.play();
    }
    else {
      $('#error-msg').empty();
    }

  }

  function getcash() {
    let code = $('#error-msg').text()
    let amount = $('#amount').val()

    if (code === '' && amount !== '') {
      console.log('complete')
      window.location.href = window.location.origin + '/public/complete/'
    }
    // if (val < '500') {
    //   // $('#error-msg').text('You need withdraw at least 500tk.');
    // console.log('You need withdraw at least 500tk.')
    // } else if(val !== round){
    //   // $('#error-msg').text('Please Amount should be Divisor (GCD) of 500 is 500 itself.');
    //   console.log('Please Amount should be Divisor (GCD) of 500 is 500 itself')
    // }
    // else if(val === 'null'){
    //   // $('#error-msg').text('You need withdraw at least 500tk.');
    //   console.log('You need withdraw at least 500tk.')
    // }
    // else{
    //   // $('#error-msg').empty();
    //   window.location.href = window.location.origin+'/complete/'
    //   console.log('complete')
    // }
  }

  // if(val<500){
  //   val = 500;
  // }else{
  //   val = Math.round(val/500)*500;
  //   $("#amount").val(val)
  // }
  function preloader(){
      document.getElementById("load").style.display = "none";
      document.getElementById("content").style.display = "block";
  }//preloader
  window.onload = preloader;

  @if(Session::has('success'))
  toastr.success("{{ session('success') }}")
  @endif
</script>
@endpush