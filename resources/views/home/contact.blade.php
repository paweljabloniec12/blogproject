<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   @include('home.homecss')
   <style>
      .contact_section {
         padding: 20px 0;
      }

      .contact_container {
         display: flex;
         flex-direction: column;
         align-items: center;
         width: 100%;
      }

      .contact_taital {
         font-size: 40px;
         text-align: center;
         color: #252525;
         width: 100%;
         margin-bottom: 10px;
      }

      .alert_wrapper {
         width: 100%;
         max-width: 50vh;
         margin: 10px 0;
         position: relative;
      }

      .alert {
         padding: 5px;
         border-radius: 5px;
         width: 100%;
         max-width: 70vh;
         margin: 0 auto;
         text-align: center;
      }

      .alert-success {
         background-color: #d4edda;
         border-color: #c3e6cb;
         color: #155724;
      }

      .alert-danger {
         background-color: #f8d7da;
         border-color: #f5c6cb;
         color: #721c24;
      }

      .error-message {
         color: #dc3545;
         font-size: 14px;
         margin-top: -15px;
         margin-bottom: 15px;
      }

      .email_text {
         width: 100%;
         max-width: 50vh;
         padding: 0;
      }

      .email-bt {
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;
         border: 1px solid #ddd;
         border-radius: 5px;
         font-size: 16px;
      }

      .email-bt.is-invalid {
         border-color: #dc3545;
      }

      .massage-bt {
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;
         border: 1px solid #ddd;
         border-radius: 5px;
         height: 150px;
         resize: none;
      }

      .massage-bt.is-invalid {
         border-color: #dc3545;
      }

      .send_btn {
         text-align: center;
         margin-top: 20px;
      }

      .send_btn button {
         background-color: #007bff;
         color: white;
         padding: 10px 40px;
         border: none;
         border-radius: 5px;
         font-size: 18px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      .send_btn button:hover {
         background-color: #0056b3;
      }
   </style>
</head>

<body>
   <!-- header section start -->
   <div class="header_section">
      @include('home.header')
   </div>

   <div class="contact_section layout_padding">
      <div class="container">
         <div class="contact_container">
            <h1 class="contact_taital">{{__('messages.send_us')}}</h1>
            
            <div class="alert_wrapper">
               @if(session()->has('message'))
                  <div class="alert alert-success">
                     {{ session()->get('message') }}
                  </div>
               @endif
            </div>
            <div class="email_text">
               <form action="/post-message" method="POST">
                  @csrf
                  <div class="form-group">
                     <input type="text" class="email-bt @error('name') is-invalid @enderror" 
                            placeholder="{{__('Your Name')}}" name="name" value="{{ old('name') }}" 
                            required minlength="2" maxlength="50">
                     @error('name')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input type="tel" class="email-bt @error('phone') is-invalid @enderror" 
                            placeholder="{{__('Phone Number')}}" name="phone" value="{{ old('phone') }}" 
                            required pattern="[0-9\s\-\+\(\)]{9,15}">
                     @error('phone')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input type="email" class="email-bt @error('email') is-invalid @enderror" 
                            placeholder="{{__('Your Email')}}" name="email" value="{{ old('email') }}" 
                            required>
                     @error('email')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt @error('title') is-invalid @enderror" 
                            placeholder="{{__('Your Title')}}" name="title" value="{{ old('title') }}" 
                            required minlength="2" maxlength="100">
                     @error('title')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <textarea class="massage-bt @error('message') is-invalid @enderror" 
                               placeholder="{{__('Your Message')}}" name="message" required 
                               minlength="10">{{ old('message') }}</textarea>
                     @error('message')
                        <div class="error-message">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="send_btn">
                     <button type="submit">{{__('messages.send_message')}}</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- footer section start -->
   @include('home.footer')
   <!-- footer section end -->
</body>

</html>