<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homecss')

    <style>
        .post_container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Trzy kolumny */
            gap: 20px; /* Odstęp między postami */
            justify-content: center; /* Wyśrodkowanie względem przeglądarki */
            justify-self: center; 
            padding: 30px;
            max-width: 100vh;
        }

        .post_deg {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .post_deg:hover {
            transform: translateY(-5px);
        }

        .title_deg {
            font-size: 20px;
            font-weight: bold;
            margin: 15px 0;
            color: black;
        }

        .description_deg {
            font-size: 18px;
            font-weight: bold;
            padding: 5px;
            color: black;
        }

        .img_deg {
            height: 200px;
            width: auto;
            padding: 15px;
            margin: auto;
            border-radius: 5px;
        }

        .btn {
            margin: 5px;
        }

        /* Responsywność */
        @media (max-width: 768px) {
            .post_container {
                grid-template-columns: repeat(2, 1fr); /* Dwie kolumny na mniejszych ekranach */
            }
        }

        @media (max-width: 480px) {
            .post_container {
                grid-template-columns: 1fr; /* Jedna kolumna na bardzo małych ekranach */
            }
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

        @if(session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif
    </div>

    <!-- Posty -->
    <div class="post_container">
        @foreach ($data as $data)
            <div class="post_deg">
                <img class="img_deg" src="/postimage/{{$data->image}}">
                <h4 class="title_deg">{{$data->title}}</h4>
                
                <a href="{{url('post_update_page', $data->id)}}" class="btn btn-primary">{{__('Update')}}</a>
                <a onclick="return confirm('Are you sure to delete this ?')" href="{{url('my_post_del', $data->id)}}" class="btn btn-danger">{{__('Delete')}}</a>
            </div>
        @endforeach
    </div>

    <!-- footer section start -->
    @include('home.footer')
    <!-- footer section end -->
</body>

</html>
