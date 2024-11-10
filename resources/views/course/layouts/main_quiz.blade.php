<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} - Bytesize Learning </title>
    <link rel="icon" type="image/x-icon" href="/res/favicon.ico"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ai-guide.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.1/ckeditor5-premium-features.css" />
  </head>
  <body>
    <div class="flex">
      <!-- Content -->
      <div class="w-full h-full">
        <!-- Content Header -->
        @include('course.partials.header')
        <!-- End Content Header -->
        <div class="flex m-8">
          @include('course.partials.side_nav')

          @yield('content')

          @include('course.partials.quiz_bottom')

        </div>
      </div>
      <!-- End Content -->
    </div>
  </body>
</html>
