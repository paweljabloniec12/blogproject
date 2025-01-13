<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> <!-- basic -->
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
            /* Adjust this value based on your header height */
        }

        /* Form styling */
        .div_deg {
            width: 100%;
            max-width: 90vh;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .title_deg {
            font-size: 28px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: #444444;
            margin-bottom: 8px;
        }

        #title_field,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color: #333333;
            border: 1px solid #cccccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }



        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .ck-editor__editable_inline {
            min-height: 300px !important;
            max-height: 400px !important;
        }

        .ck.ck-editor {
            position: relative;
            width: 100% !important;
            margin-bottom: 20px;
        }

        .ck.ck-editor__main>.ck-editor__editable {
            background-color: white !important;
            padding: 20px !important;
        }

        /* Poprawka dla responsywności */
        .ck.ck-reset.ck-editor.ck-rounded-corners {
            width: 100% !important;
        }

        /* Styl dla toolbar'a */
        .ck.ck-toolbar {
            border-radius: 5px 5px 0 0 !important;
            background-color: #f8f9fa !important;
        }

        /* Styl dla głównego kontenera edytora */
        .ck.ck-content {
            border-radius: 0 0 5px 5px !important;
            border-color: #cccccc !important;
        }

        .ck.ck-sticky-panel__content {
            position: static !important;
            /* Domyślnie wyłączamy sticky */
        }

        .ck.ck-sticky-panel__content.ck-sticky {
            position: fixed !important;
            top: 80px !important;
            /* Dostosuj tę wartość do wysokości twojego headera */
            z-index: 999;
            /* Mniejszy niż header */
            background: white;
            width: inherit !important;
            max-width: inherit !important;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
    </div>

    <!-- Main content wrapper -->
    <div class="main-content">
        <div class="div_deg">
            <h3 class="title_deg">{{__('Add Post')}}</h3>
            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data" id="postForm">
                @csrf
                <div class="field_deg">
                    <label>{{__('Title')}}</label>
                    <input id="title_field" type="text" name="title" placeholder="{{__('messages.enter_title')}}"
                        required>
                </div>

                <div class="field_deg">
                    <label>{{__('Description')}}</label>
                    <!-- Dodajemy ukryte pole do przechowywania wartości z CKEditor -->
                    <input type="hidden" name="description" id="description_hidden">
                    <!-- Zmieniamy nazwę textarea na inną niż 'description' -->
                    <textarea id="description_editor" placeholder="{{__('messages.enter_desc')}}"></textarea>
                </div>

                <div class="field_deg">
                    <label>{{__('Add Image')}}</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <div class="field_deg">
                    <input type="submit" value="{{__('Add Post')}}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    @include('home.footer')

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

                // Aktualizuj ukryte pole przy każdej zmianie w edytorze
                editor.model.document.on('change:data', () => {
                    document.getElementById('description_hidden').value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        // Dodaj walidację przed wysłaniem formularza
        document.getElementById('postForm').addEventListener('submit', function (e) {
            const description = editor.getData();
            if (!description.trim()) {
                e.preventDefault();
                alert('Description is required!');
                return false;
            }
            document.getElementById('description_hidden').value = description;
        });
    </script>

</html>