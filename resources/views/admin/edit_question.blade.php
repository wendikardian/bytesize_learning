@extends('admin.layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
<script src="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.umd.js"></script>
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Question</div>
    <form action="{{ route('question.update', ['quiz' => $quiz->id, 'question' => $question->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="pertanyaan" class="form-label">Question</label>
            <textarea name="pertanyaan" id="pertanyaan">{{ old('pertanyaan', $question->pertanyaan) }}</textarea>
            <script>
                const {
                    ClassicEditor,
                    Essentials,
                    Bold,
                    Italic,
                    Font,
                    Paragraph,
                    Alignment,
                    BlockQuote,
                    Link,
                    List,
                    Table,
                    TableToolbar,
                    MediaEmbed,
                    Image,
                    ImageUpload,
                    ImageToolbar,
                    ImageCaption,
                    ImageStyle,
                    ImageResize,
                    LinkImage,
                    CodeBlock
                } = CKEDITOR;

                class MyUploadAdapter {
                    constructor(loader) {
                        // The file loader instance to use during the upload.
                        this.loader = loader;
                    }

                    // Starts the upload process.
                    upload() {
                        return this.loader.file
                            .then(file => new Promise((resolve, reject) => {
                                this._initRequest();
                                this._initListeners(resolve, reject, file);
                                this._sendRequest(file);
                            }));
                    }

                    // Aborts the upload process.
                    abort() {
                        if (this.xhr) {
                            this.xhr.abort();
                        }
                    }

                    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                    _initRequest() {
                        const xhr = this.xhr = new XMLHttpRequest();

                        // Note that your request may look different. It is up to you and your editor
                        // integration to choose the right communication channel. This example uses
                        // a POST request with JSON as a data structure but your configuration
                        // could be different.
                        xhr.open('POST', '{{ route('ckeditor.upload_quiz') }}', true);
                        xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                        xhr.responseType = 'json';
                    }

                    // Initializes XMLHttpRequest listeners.
                    _initListeners(resolve, reject, file) {
                        const xhr = this.xhr;
                        const loader = this.loader;
                        const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                        xhr.addEventListener('error', () => reject(genericErrorText));
                        xhr.addEventListener('abort', () => reject());
                        xhr.addEventListener('load', () => {
                            const response = xhr.response;

                            // This example assumes the XHR server's "response" object will come with
                            // an "error" which has its own "message" that can be passed to reject()
                            // in the upload promise.
                            //
                            // Your integration may handle upload errors in a different way so make sure
                            // it is done properly. The reject() function must be called when the upload fails.
                            if (!response || response.error) {
                                return reject(response && response.error ? response.error.message : genericErrorText);
                            }

                            // If the upload is successful, resolve the upload promise with an object containing
                            // at least the "default" URL, pointing to the image on the server.
                            // This URL will be used to display the image in the content. Learn more in the
                            // UploadAdapter#upload documentation.
                            resolve({
                                default: response.url
                            });
                        });

                        // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                        // properties which are used e.g. to display the upload progress bar in the editor
                        // user interface.
                        if (xhr.upload) {
                            xhr.upload.addEventListener('progress', evt => {
                                if (evt.lengthComputable) {
                                    loader.uploadTotal = evt.total;
                                    loader.uploaded = evt.loaded;
                                }
                            });
                        }
                    }

                    // Prepares the data and sends the request.
                    _sendRequest(file) {
                        // Prepare the form data.
                        const data = new FormData();

                        data.append('upload', file);

                        // Important note: This is the right place to implement security mechanisms
                        // like authentication and CSRF protection. For instance, you can use
                        // XMLHttpRequest.setRequestHeader() to set the request headers containing
                        // the CSRF token generated earlier by your application.

                        // Send the request.
                        this.xhr.send(data);
                    }
                }

                function uploadPlugin(editor) {
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        // Configure the URL to the upload script in your back-end here!
                        return new MyUploadAdapter(loader);
                    };
                }

                ClassicEditor
                    .create(document.querySelector('#pertanyaan'), {
                        plugins: [
                            Essentials, Bold, Italic, Font, Paragraph, Alignment, BlockQuote, Link, List, Table, TableToolbar, MediaEmbed, Image, ImageUpload,
                            Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, ImageResize,
                            CodeBlock
                        ],
                        extraPlugins: [uploadPlugin],
                        toolbar: [
                            'undo', 'redo', '|', 'bold', 'italic', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                            'alignment', 'blockQuote', 'link', '|',
                            'imageUpload', 'insertTable', 'mediaEmbed', 'horizontalLine', 'bulletedList', 'numberedList', '|',
                            'outdent', 'indent', '|', 'removeFormat', '|', 'codeBlock'
                        ],
                        ckfinder: {
                            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        },
                        image: {
                            toolbar: ['toggleImageCaption', 'imageTextAlternative', 'ckboxImageEdit'],
                            insert: {
                                integrations: ['upload', 'assetManager', 'url'],
                                type: 'auto'
                            },
                            toolbar: ['imageStyle:block',
                                'imageStyle:side',
                                '|',
                                'toggleImageCaption',
                                'imageTextAlternative',
                                '|',
                                'linkImage'
                            ]
                        }
                    })
                    .then(editor => {
                        console.log('Editor was initialized', editor);
                    })
                    .catch(error => {
                        console.error(error.stack);
                    });
            </script>
        </div>
        <div id="optionsContainer">
            @foreach ($answers as $index => $answer)
            <div class="form-group mb-4 flex items-center">
                <div class="flex items-center w-full">
                    <input type="radio" name="correct_answer" value="{{ $index + 1 }}" class="mr-2" {{ $answer->status ? 'checked' : '' }}>
                    <input type="text" name="options[]" id="option_{{ $index + 1 }}" class="form-control p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-full" value="{{ old('options.' . $index, $answer->jawaban) }}">
                    <!-- render also with the id of that answer -->
                    <input type="hidden" name="answer_ids[]" value="{{ $answer->id }}">

                </div>
            </div>
            @endforeach
        </div>


        <div class="form-group mb-4 flex flex-row w-full">
            <div>
                <label for="prev_quest" class="form-label mr-2">Prev Question</label>
                <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="prev_quest" name="prev_quest" placeholder="Enter previous question ID" value="{{ old('prev_quest', $question->prev_quest) }}">
            </div>
            <div class="mx-4">
                <label for="next_quest" class="form-label mr-2">Next Question</label>
                <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="next_quest" name="next_quest" placeholder="Enter next question ID" value="{{ old('next_quest', $question->next_quest) }}">
            </div>
            <div class="mx-4">
                <label for="point" class="form-label mr-2">Point</label>
                <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="point" name="point" placeholder="Enter point" value="{{ old('point', $question->point) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-full mt-4">Update Question</button>
    </form>
</div>

@endsection