@extends('layouts.app')

@section('content')
<div class="loginbox"> <img src="https://icons.veryicon.com/png/o/miscellaneous/two-color-icon-library/user-286.png" class="avatar">
    <h1>Connectez-vous</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <p>Adresse e-mail</p>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div>
            <p>Mot de passe</p>
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <input type="submit" value="Se connecter" />

</div>
</form>
</form>
</div>
@endsection

<style>
    body {
        margin: 0;
        padding: 0;
        background: url(https://img.freepik.com/premium-photo/auto-repair-maintenance-garage-render-3d_10221-16070.jpg);
        background-size: cover;
        background-position: center;
        font-family: sans-serif
    }

    .loginbox {
        border-radius: 10px;
        width: 320px;
        height: 430px;
        background: #fff;
        color: #000;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        padding: 70px 30px
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        top: -50px;
        left: calc(50% - 50px)
    }

    h1 {
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 22px
    }

    .loginbox p {
        margin: 0;
        padding: 0;
        font-weight: bold
    }

    .loginbox input {
        width: 100%;
        margin-bottom: 20px
    }

    .loginbox input[type="email"],
    input[type="password"] {
        border: none;
        border-bottom: 1px solid #000;
        background: transparent;
        outline: none;
        height: 40px;
        color: #000;
        font-size: 16px
    }

    .loginbox input[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        background: #256fbffa;
        color: #fff;
        font-size: 18px;
        border-radius: 20px
    }

    .loginbox input[type="submit"]:hover {
        cursor: pointer;
        background: #256fbfb3;
    }

    .loginbox a {
        text-decoration: none;
        font-size: 12px;
        line-height: 20px;
        color: darkgrey
    }

    .loginbox a:hover {
        color: #ffc107
    }
</style>