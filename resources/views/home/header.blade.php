<div class="header_main">
   <div class="mobile_menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="logo_mobile"><a href="{{url('home')}}"><img src="images/logo.png"></a></div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="services.html">Services</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link " href="contact.html">Contact</a>
               </li>
            </ul>
         </div>
      </nav>
   </div>
   <div class="container-fluid">
      <div class="logo"><a href="{{url('/')}}"><img src="images/logo.png"></a></div>
      <div class="menu_main">
         <ul>
            <li class="active"><a href="{{url('/home')}}">{{__('messages.home')}}</a></li>
            <li><a href="{{url('about')}}">{{__('messages.about')}}</a></li>
            <li><a href="{{url('contact')}}">{{ __('messages.contact') }}</a></li>

            @if (Route::has('login'))
            @auth
            <li><a href="{{url('my_post')}}">{{ __('messages.my_post') }}</a></li>
            <li><a href="{{url('create_post')}}">{{ __('messages.create_post') }}</a></li>
            <li><x-app-layout></x-app-layout></li>
            <li>
               <x-dropdown align="right">
                <x-slot name="trigger">
                  <span class="inline-flex rounded-md w-[100px]" id="language-trigger">
                   <button type="button"
                     class="w-full inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                     @if(app()->getLocale() == 'en')
                   <img src="{{ asset('images/flags/gb.png') }}" alt="GB" style="width: 24px; height: 15px;"
                     class="mr-2">
                @else
                <img src="{{ asset('images/flags/pl.png') }}" alt="PL" style="width: 24px; height: 15px;"
                  class="mr-2">
             @endif
                     <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                     </svg>
                   </button>
                  </span>
                </x-slot>

                <x-slot name="content">
                  <div class="w-[100px]">
                   @if(app()->getLocale() == 'en')
                  <x-dropdown-link :href="route('localization', 'pl')"
                   class="inline-flex items-center justify-center w-full">
                   <img src="{{ asset('images/flags/pl.png') }}" alt="PL" style="width: 32px; height: 20px;">
                  </x-dropdown-link>
               @else
               <x-dropdown-link :href="route('localization', 'en')"
                class="inline-flex items-center justify-center w-full">
                <img src="{{ asset('images/flags/gb.png') }}" alt="GB" style="width: 32px; height: 20px;">
               </x-dropdown-link>
            @endif
                  </div>
                </x-slot>
               </x-dropdown>

            </li>
         @else
         <li><a href="{{route('login')}}">{{ __('messages.login') }}</a></li>
         <li><a href="{{route('register')}}">{{ __('messages.register') }}</a></li>
      @endauth
         @endif
         </ul>
      </div>
   </div>
</div>