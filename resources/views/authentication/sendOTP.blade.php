@include('authentication.header')

<div class="col-md-9">
    <h2> Email Verification </h2>
    {{ 'Enter your registered email to get otp for Authentication.' }}
    <hr>
</div>

@if (Session::has('msg'))
    <div class="alert alert-danger" role="alert">
        <span> <strong> Oops! </strong> {{ Session::get('msg') }} </span>
    </div>
@endif

<form name="sendOTP" action="{{ Route('authentication.request') }}" method="post">
    @csrf
    @method('POST')

    <div class="form-group col-md-6">
        <label for="Email1">Email</label>
        <input type="email" class="form-control" id="Email" name="email" placeholder="enter your email..."
            required>
        <span class="text-danger"> {{ $errors->first('email') }}
    </div>

    <div>
        <button type="submit" class="btn btn-outline-primary mx-3">Send OTP</button>
        <a class="btn btn-outline-warning" href="/dashboard"> Cancel </a>
    </div>
</form>
</div>
</div>

