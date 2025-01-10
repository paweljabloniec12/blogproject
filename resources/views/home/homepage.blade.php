<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

        <!-- banner section start -->
        @include(('home.banner'))
        <!-- banner section end -->
    </div>
    <!-- header section end -->

    <!-- services section start -->
    @include('home.services')
    <!-- services section end -->

    <!-- about section start -->
    @include('home.about_homepage')
    <!-- about section end -->

    <!-- footer section start -->
    @include('home.footer')
    <!-- footer section end -->

   </body>

</html>