<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password - Bytesize Learning</title>
    <link rel="icon" type="image/x-icon" href="/res/favicon.ico"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="bg-orange-400">
    <div class="flex justify-center items-center h-screen">
        <div class="flex-col container-main-form">
            @if(session('status'))
            <div id="alert" class="alert alert-success shadow-lg mb-8">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>A password reset link has been sent to your email address.</span>
                </div>
                <div class="flex-none">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" id="close-alert" class="stroke-white flex-shrink-0 h-6 w-6 " fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </button>
                </div>
            </div>
            @endif
            <div class="flex bg-white form-sign p-4">
                <div class="box-form mr-4">
                    <p class="text-2xl font-bold text-success mb-8">Forgot Your Password?</p>
                    <p class="mb-4">Enter your email address below and we'll send you a link to reset your password.</p>
                    <form class="form-control w-full mt-4" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="email" name="email" id="email" class="input input-bordered w-full" required>
                        </div>
                        <button type="submit" class="btn btn-success my-4 text-white normal-case">Send Password Reset Link</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#close-alert").click(function(){
        $("#alert").hide();
    });
});
</script>
</html>
