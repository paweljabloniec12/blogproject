<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')</div>

        <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">{{__('About Us')}}</h1>
                     <p class="about_text">{{__('messages.lorem_ipsum')}}</p>
                     <div class="readmore_bt"><a href="{{url('about')}}">{{__('Read More')}}</a></div>
                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="images/about-img.png" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>

    <!-- footer section start -->
    @include('home.footer')
    <!-- footer section end -->

   </body>

</html>