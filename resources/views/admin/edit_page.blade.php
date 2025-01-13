<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    @include('admin.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <style type="text/css">
        .post_title {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #1a1a1a;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        .div_center {
            margin: 20px 0;
            padding: 20px;
            background: #2d2d2d;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-group {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        label {
            min-width: 200px;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.5px;
            text-align: right;
        }

        input[type="text"] {
            flex: 1;
            width: 100%;
            padding: 12px 20px;
            background: #333;
            border: 2px solid #444;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        input[type="file"] {
            flex: 1;
            width: 100%;
            padding: 10px;
            background: #333;
            border: 2px solid #444;
            border-radius: 8px;
            color: #fff;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            transition: background 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background: #0056b3;
        }

        .ck-editor__editable_inline {
            min-height: 300px !important;
            max-height: 500px !important;
            background-color: #333 !important;
            color: #fff !important;
        }

        .ck.ck-editor {
            width: 100% !important;
            margin: 0 !important;
        }

        .ck.ck-editor__main>.ck-editor__editable {
            background-color: #333 !important;
            border: 2px solid #444 !important;
            padding: 20px !important;
        }

        .ck.ck-toolbar {
            background: #2d2d2d !important;
            border: 2px solid #444 !important;
        }

        .ck.ck-button {
            color: #fff !important;
            background: #2d2d2d !important;
        }

        .ck.ck-button:hover {
            background: #444 !important;
        }

        .submit-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn-primary {
            background: #007bff;
            color: #fff;
            padding: 12px 40px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 86, 179, 0.3);
        }

        .old-image {
            margin: auto;
            height: 150px;
            width: auto;
            border-radius: 8px;
            border: 2px solid #444;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <h1 class="post_title">Update Post</h1>

            <div class="form-container">
                <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data" id="postForm">
                    @csrf
                    <div class="div_center">
                        <div class="form-group">
                            <input type="text" name="title" value="{{$post->title}}" required>
                        </div>
                    </div>

                    <div class="div_center">
                        <div class="form-group">
                            <input type="hidden" name="description" id="description_hidden">
                            <textarea id="description_editor">{{$post->description}}</textarea>
                        </div>
                    </div>

                    <div class="div_center">
                        <div class="form-group">
                            <img class="old-image" src="/postimage/{{$post->image}}" alt="Current post image">
                        </div>
                    </div>

                    <div class="div_center">
                        <div class="form-group">
                            <input type="file" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="submit-container">
                        <input type="submit" value="Update Post" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        @include('admin.footer')

        <script>
            let editor;

            ClassicEditor
                .create(document.querySelector('#description_editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}',
                    }
                })
                .then(newEditor => {
                    editor = newEditor;

                    // Update hidden field on editor content change
                    editor.model.document.on('change:data', () => {
                        document.getElementById('description_hidden').value = editor.getData();
                    });

                    // Set initial value for hidden field
                    document.getElementById('description_hidden').value = editor.getData();
                })
                .catch(error => {
                    console.error(error);
                });

            // Form validation
            document.getElementById('postForm').addEventListener('submit', function(e) {
                const description = editor.getData();
                if (!description.trim()) {
                    e.preventDefault();
                    alert('Description is required!');
                    return false;
                }
                document.getElementById('description_hidden').value = description;
            });
        </script>
    </div>
</body>
</html>