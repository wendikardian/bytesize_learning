@extends('admin.layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.css" />
<script src="https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.umd.js"></script>
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Challenge</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.updateChallenge', $challenge->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="judul" name="judul" value="{{ old('judul', $challenge->judul) }}" placeholder="Enter Judul">
        </div>
        <div class="form-group mb-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500">{{ old('deskripsi', $challenge->deskripsi) }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi">{{ old('isi', $challenge->isi) }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="step" class="form-label">Step</label>
            <textarea name="step" id="step">{{ old('step', $challenge->step) }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="point" class="form-label">Point</label>
            <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="point" name="point" value="{{ old('point', $challenge->point) }}" placeholder="Enter Point">
        </div>
        <div class="form-group mb-4">
            <label for="xp" class="form-label">XP</label>
            <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="xp" name="xp" value="{{ old('xp', $challenge->xp) }}" placeholder="Enter XP">
        </div>
        <button type="submit" class="btn btn-primary w-full mt-4">Update Challenge</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                    this.loader = loader;
                }

                upload() {
                    return this.loader.file
                        .then(file => new Promise((resolve, reject) => {
                            this._initRequest();
                            this._initListeners(resolve, reject, file);
                            this._sendRequest(file);
                        }));
                }

                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('ckeditor.upload_challenge') }}', true);
                    xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                    xhr.responseType = 'json';
                }

                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                    xhr.addEventListener('error', () => reject(genericErrorText));
                    xhr.addEventListener('abort', () => reject());
                    xhr.addEventListener('load', () => {
                        const response = xhr.response;

                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }

                        resolve({
                            default: response.url
                        });
                    });

                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', evt => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                _sendRequest(file) {
                    const data = new FormData();
                    data.append('upload', file);
                    this.xhr.send(data);
                }
            }

            function uploadPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new MyUploadAdapter(loader);
                };
            }

            ClassicEditor
                .create(document.querySelector('#isi'), {
                    plugins: [
                        Essentials, Bold, Italic, Font, Paragraph, Alignment, BlockQuote, Link, List, Table, TableToolbar, MediaEmbed, Image, ImageUpload,
                        ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, CodeBlock
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

            ClassicEditor
                .create(document.querySelector('#step'), {
                    plugins: [
                        Essentials, Bold, Italic, Font, Paragraph, Alignment, BlockQuote, Link, List, Table, TableToolbar, MediaEmbed, Image, ImageUpload,
                        ImageToolbar, ImageCaption, ImageStyle, ImageResize, LinkImage, CodeBlock
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
        });
    </script>
</div>

@endsection
