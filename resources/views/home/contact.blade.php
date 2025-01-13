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

      .send_btn button {
         background-color: #007bff;
         color: white;
         padding: 10px 40px;
         border: none;
         border-radius: 5px;
         font-size: 18px;
         cursor: pointer;
         transition: background-color 0.3s;
         position: relative;
         min-width: 160px;
      }

      .send_btn button:hover {
         background-color: #0056b3;
      }

      .send_btn button:disabled {
         background-color: #80b5f1;
         cursor: not-allowed;
      }

      .send_btn button .button-text {
         transition: opacity 0.2s;
      }

      .send_btn button .spinner {
         display: none;
         position: absolute;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         width: 20px;
         height: 20px;
         border: 3px solid rgba(255, 255, 255, 0.3);
         border-radius: 50%;
         border-top-color: white;
         animation: spin 1s ease-in-out infinite;
      }

      @keyframes spin {
         to {
            transform: translate(-50%, -50%) rotate(360deg);
         }
      }

      .send_btn button.loading .button-text {
         opacity: 0;
      }

      .send_btn button.loading .spinner {
         display: block;
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
               <form action="/post_message" method="POST" id="contactForm">
                  @csrf
                  <div class="form-group">
                     <input type="text" class="email-bt @error('name') is-invalid @enderror"
                        placeholder="{{__('Your Name')}}" name="name" value="{{ old('name') }}" required minlength="2"
                        maxlength="50">
                     @error('name')
                   <div class="error-message">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="form-group">
                     <input type="tel" class="email-bt @error('phone') is-invalid @enderror"
                        placeholder="{{__('Phone Number')}}" name="phone" value="{{ old('phone') }}" required
                        pattern="[0-9\s\-\+\(\)]{9,15}">
                     @error('phone')
                   <div class="error-message">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="form-group">
                     <input type="email" class="email-bt @error('email') is-invalid @enderror"
                        placeholder="{{__('Your Email')}}" name="email" value="{{ old('email') }}" required>
                     @error('email')
                   <div class="error-message">{{ $message }}</div>
                @enderror
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt @error('title') is-invalid @enderror"
                        placeholder="{{__('Your Title')}}" name="title" value="{{ old('title') }}" required
                        minlength="2" maxlength="100">
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
                     <button type="submit" id="submitButton">
                        <span class="button-text">{{__('messages.send_message')}}</span>
                        <div class="spinner"></div>
                     </button>
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

<script>
   document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('contactForm');
      const submitButton = document.getElementById('submitButton');

      form.addEventListener('submit', function (e) {
         // Zapobiegamy wielokrotnemu kliknięciu
         if (submitButton.disabled) {
            e.preventDefault();
            return;
         }

         // Pokazujemy animację i blokujemy przycisk
         submitButton.classList.add('loading');
         submitButton.disabled = true;

         // Pozwalamy formularzowi na standardowe wysłanie
         return true;
      });
   });
</script>

</html>