<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }} - Bytesize Learning </title>
  <link rel="icon" type="image/x-icon" href="res/favicon.ico" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://kit.fontawesome.com/f0e17752b2.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />

  <script type="module">
  import {
    ClassicEditor,
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Font
  } from 'ckeditor5';

  ClassicEditor
    .create(document.querySelector('#editor'), {
      plugins: [Essentials, Paragraph, Bold, Italic, Font],
      toolbar: [
        'undo', 'redo', '|', 'bold', 'italic', '|',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
      ]
    })
    .then(editor => {
      window.editor = editor;
    })
    .catch(error => {
      console.error(error);
    });
</script>
</head>

<body>
  <div class="flex">
    <!-- Side Bar Menu -->
    @include('admin.partials.sidebar')
    <!-- End Side Bar Menu -->

    <!-- Content -->
    <div class="w-full h-full p-2 mx-8 overflow-y-auto ml--4">
      <!-- Content Header -->
      @include('admin.partials.header')
      <!-- End Content Header -->
      @yield('content')
    </div>
    <!-- End Content -->
  </div>
</body>
<script src="{{ asset('js/logic.js') }}"></script>


<script type="importmap">
  {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.0/"
                }
            }
        </script>

<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
  window.onload = function() {
    if (window.location.protocol === "file:") {
      alert("This sample requires an HTTP server. Please serve this file with a web server.");
    }
  };
</script>
<script>
  AOS.init();
</script>

</html>