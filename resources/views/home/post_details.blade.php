<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="/public">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    @include('home.homecss')

    <style>
        /* Header styling */
        .header_section {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333333;
            z-index: 1000;
        }

        /* Main content wrapper */
        .main-content {
            padding-top: 180px;
            padding-bottom: 50px;
        }

        /* Post content container */
        .post-container {
            width: 100%;
            max-width: 90vh;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Post title */
        .post-title {
            font-size: 32px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Post metadata */
        .post-meta {
            text-align: right;
            color: #666666;
            font-size: 14px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        /* Content area */
        .post-content {
            margin: 20px 0;
            line-height: 1.6;
        }

        .ck-editor__editable_inline {
            min-height: auto !important;
            max-height: none !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
        }

        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border: none;
        }
    </style>
</head>

<body>
    <div class="header_section">
        @include('home.header')
    </div>

    <div class="main-content">
        <div class="post-container">
            <h1 class="post-title">{{$post->title}}</h1>
            
            <div class="post-content">
                <textarea disabled id="description_viewer" style="display: none;">{{$post->description}}</textarea>
            </div>

            <div class="post-meta">
                {{__('Post by')}} <b>{{$post->name}}</b>
            </div>
        </div>
    </div>

    @include('home.footer')

    <script>
        ClassicEditor
            .create(document.querySelector('#description_viewer'), {
                toolbar: [], // Pusty toolbar - brak przycisków edycji
                isReadOnly: true // Tryb tylko do odczytu
            })
            .then(editor => {
                // Wyłącz możliwość edycji
                editor.isReadOnly = true;
                
                // Usuń obramowanie edytora
                const editorElement = editor.ui.view.element;
                if (editorElement) {
                    editorElement.style.border = 'none';
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>