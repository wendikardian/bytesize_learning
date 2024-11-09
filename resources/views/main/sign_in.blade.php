<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} -  Bytesize Learning </title>
    <link rel="icon" type="image/x-icon" href="/res/favicon.ico"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="bg-orange-400">
    <div class="flex justify-center items-center h-screen">
        <div class="flex-col  container-main-form">
            @if(session()->has('success'))
            <div id="alert" class="alert alert-success shadow-lg mb-8">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>{{ session('success') }}</span>
                </div>
                <div class="flex-none">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" id="close-alert" class="stroke-white flex-shrink-0 h-6 w-6 " fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </button>
                </div>
            </div>
            @endif
            @if(session()->has('loginErr'))
            <div id="alert" class="alert alert-error shadow-lg mb-8">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                  <span>{{ session('loginErr') }}</span>
                </div>
                <div class="flex-none">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" id="close-alert" class="stroke-white flex-shrink-0 h-6 w-6 " fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </button>
                </div>
            </div>
            @endif
            <div class="flex bg-white form-sign p-4">
                <div class="box-form mr-4" >
                    <p class="text-2xl font-bold text-success mb-8">Masuk</p>
                    <form class="form-control w-full " action="/masuk" method="POST">
                        @csrf
                        <div class="form-control w-full  mb-4">
                            <label for="email" class="mb-2">E-mail</label>
                            <input id="email" name="email" type="email" placeholder="example@gmail.com" class="input input-bordered shadow-lg @error('email') input-error @enderror" value="{{ old('email') }}" required/>
                            @error('email')
                            <p id="err-email" class="my-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-control w-full  mb-4">
                            <label for="password" class="mb-2">Password</label>
                            <input id="password" name="password" type="password" class="input input-bordered shadow-lg @error('password') input-error @enderror" required/>
                            @error('password')
                            <p id="err-password" class="my-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-success my-4 text-white normal-case" value="Masuk">
                    </form>
                    <p class="text-center">Belum memiliki akun?<a href="/daftar" class="font-semibold text-success">Daftar</a></p>
                    <p class="text-center mt-4">
                        <a href="{{ route('password.request') }}" class="font-semibold text-success">Forgot your password?</a>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#email").keyup(function(){
        $(this).removeClass('input-error');
        $("#err-email").hide();
    });
    $("#password").keyup(function(){
        $(this).removeClass('input-error');
        $("#err-password").hide();
    });
    $("#close-alert").click(function(){
        $("#alert").hide();
    });
});
</script>
</html>