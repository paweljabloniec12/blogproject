<!DOCTYPE html>
<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .table_deg {
            border-collapse: collapse;
            /* Usuwa podwójne linie między komórkami */
            width: fit-content;
            text-align: center;
            margin: 0 auto;
            overflow-x: auto;
        }

        .th_deg {
            background-color: rgb(200, 84, 84);
            color: white;
            border: 1px solid white;
            /* Linie pomiędzy nagłówkami */
        }

        .table_deg td,
        .table_deg th {
            border: 1px solid lightgray;
            /* Linie w komórkach */
            padding: 10px;
            /* Dodaje odstęp w komórkach */
        }

        .img_deg {
            max-height: 100px;
            width: auto;
            margin-bottom: 10px;
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

                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{session()->get('message')}}
                </div>

            @endif

            <h1 class="title_deg">All Post</h1>

            <table class="table_deg">

                <tr class="th_deg">
                    <th>Post title</th>
                    <th>Description</th>
                    <th>Post by</th>
                    <th>Post status</th>
                    <th>User type</th>
                    <th>Image</th>

                    <th>Delete</th>

                    <th>Update</th>

                    <th>Status Accept</th>
                    <th>Status Reject</th>
                </tr>

                @foreach ($post as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($post->description, 50, '...') }}</td>
                        <td>{{$post->name}}</td>
                        <td @if($post->post_status === 'active') style="color: green;"
                        @elseif($post->post_status === 'rejected') style="color: red;"
                        @elseif($post->post_status === 'pending') style="color: skyblue;" @endif>{{$post->post_status}}</td>
                        <td>{{$post->usertype}}</td>
                        <td>
                            <img class="img_deg" src="postimage/{{$post->image}}">
                        </td>

                        <td>
                            <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger"
                                onclick="confirmation(event)">Delete</a>
                        </td>

                        <td>
                            <a href="{{url('edit_page', $post->id)}}" class="btn btn-secondary">Edit</a>
                        </td>

                        <td>
                            @if($post->post_status === 'pending' || $post->post_status === 'rejected')
                                <a onclick="return confirm('Are you sure to accept this post?')"
                                    href="{{url('accept_post', $post->id)}}" class="btn btn-success">Accept</a>
                            @else
                                <button class="btn btn-success" disabled>Accept</button>
                            @endif
                        </td>

                        <td>
                            @if($post->post_status !== 'rejected')
                                <a onclick="return confirm('Are you sure to reject this post?')"
                                    href="{{url('reject_post', $post->id)}}" class="btn btn-primary">Reject</a>
                            @else
                                <button class="btn btn-primary" disabled>Reject</button>
                            @endif
                        </td>
                    </tr>
                @endforeach




            </table>

        </div>

        @include('admin.footer')

        <script type="text/javascript">

            function confirmation(ev) {
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect)

                swal({

                    title: "Are You sure to Delete This ?",
                    text: "You won't be able to revert this delete",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });

            }

        </script>
</body>

</html>