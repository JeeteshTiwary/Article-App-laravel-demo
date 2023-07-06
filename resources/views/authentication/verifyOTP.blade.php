@include('authentication.header')

<div class="col-md-9">
    <h2> OTP Verification </h2>
    {{ 'Check your email and enter received OTP for Authentication.' }}
    <hr>
</div>

<form class="form-inline col-md-9" action="{{ Route('authentication.verify') }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group mb-2">
        <label for="email" class="sr-only">Email</label>
        <input type="text" readonly class="form-control-plaintext" id="email" name="email"
            value="{{ $email }}">
    </div>
    <div class="form-group mb-2 mx-3">
        <label for="otp" class="sr-only">OTP: </label>
        <input type="text" class="form-control" id="otp" name="otp" placeholder="enter otp">
        <span class="text-danger mx-2"> {{ $errors->first('otp') }} </span>
        <span class="text-danger mx-2"> {{ $msg }} </span>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Verify OTP</button>
</form>
</div>
</div>

