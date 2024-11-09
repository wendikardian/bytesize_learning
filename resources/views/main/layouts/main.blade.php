<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }} - Bytesize Learning </title>
  <link rel="icon" type="image/x-icon" href="res/favicon.ico" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/form-file.js') }}"></script>

  <!-- aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
</head>

<body>
  <div class="flex">
    <!-- Side Bar Menu -->
    @include('main.partials.sidebar')
    <!-- End Side Bar Menu -->

    <!-- Content -->
    <div class="w-full h-full p-2 mx-8 overflow-y-auto ml--4">
      <!-- Content Header -->
      @include('main.partials.header')
      <!-- End Content Header -->
      @yield('content')
    </div>
    <!-- End Content -->
  </div>
</body>
<script src="{{ asset('js/logic.js') }}"></script>
<script>
    AOS.init();
  </script>
</html>