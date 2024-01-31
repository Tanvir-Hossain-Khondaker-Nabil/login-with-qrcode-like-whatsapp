@extends('frontend.layouts.master')

@section('content')
<div class="container-fluid p-5 bg-custom-gradient">
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
                <div class="card english" style="height:100%;padding-top: 150px;">
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
                <div>
                    <div class="examples">
                        <div class="radial" data-gap=".3">
                            <a href="{{ url('account') }}">
                                <button class="radial_center">
                                    <i class="fa-regular fa-credit-card fa-xl"></i>
                                    <h3>Get Cash</h3>
                                </button>
                            </a>
                            <div class="radial_edge"><i class="fa-solid fa-bangladeshi-taka-sign"></i><br>500</div>
                            <div class="radial_edge"><i class="fa-solid fa-bangladeshi-taka-sign"></i><br>1000</div>
                            <div class="radial_edge"><i class="fa-solid fa-bangladeshi-taka-sign"></i><br>5000</div>
                            <div class="radial_edge"><i class="fa-solid fa-bangladeshi-taka-sign"></i><br>10000
                            </div>
                            <div class="radial_edge"><i class="fa-solid fa-bangladeshi-taka-sign"></i><br>20000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 paddingleft30">
                <div class="card english mb-3" style="text-align: start;padding-left: 50px;">
                    <i class="fa-solid fa-ellipsis"></i>
                    <h4>More</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <h6>Wed 28th, 02:30pm</h6>
            </div>
            <div class="col-md-4 text-end  js-date">
                <button class="return-card"><i class="fa-solid fa-road"></i> Return Card</button>
            </div>
        </div>
    </div>
</div>
@endsection
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
</script>
@endpush