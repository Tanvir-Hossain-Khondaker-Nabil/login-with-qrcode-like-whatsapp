<div class="row">
    <div class="col-md-4">
    <a href="{{ route('home') }}" class="return-card"><i class="fa-solid fa-road"></i> Cancel</a>
    </div>
    <div class="col-md-4 text-center js-date">
        <h6>{{ date('d M, Y') }}</h6>
    </div>
    <div class="col-md-4 text-md-end text-center">
        <a href="{{ route('waiting-second') }}" class="return-card"><i class="fa-solid fa-road"></i> Continue</a>
    </div>
</div>