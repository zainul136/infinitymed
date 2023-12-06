<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>
        InfinityMe
    </title>
    <style>
        .error{
         color: #FF0000;
        }
      </style>

    <style>
        .stickyHeader {
            position: fixed;
            width: 100%;
        }

        .chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            cursor: pointer;
        }

        .chatbot-icon img {
            width: 50px;
        }

        .chatbot-window {
            display: none;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 300px;
            height: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .chatbot-content {
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .chatbot-header {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .chatbot-conversation {
            flex-grow: 1;
            overflow-y: scroll;
            padding-top: 40px;
            padding-bottom: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .chatbot-input {
            display: flex;
            flex-direction: column;
        }

        .chatbot-input input,
        .chatbot-input textarea,
        .chatbot-input button {
            margin-bottom: 10px;
        }

        .box {
            margin: 0 10px;
        }

        .img-box {
            text-align: center;
        }

        .img-box i {
            font-size: 100px;
            color: #0b3b3c;
        }

        /* Add your custom styles here */
        .slider_section {
            position: relative;
        }

        .slider_section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity by changing the last value (0.5 in this case) */
        }

        .slider_container {
            position: relative;
            z-index: 1;
        }
        .chatbot-window {
            overflow: auto; /* or overflow: hidden; */
            /* Add any other necessary styles */
        }
    </style>
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet"/>
</head>
<body style="background-color: rgb(231 230 229)">
<div class="hero_area sticky-sm-top p-0" >
    @include('user.layouts.header')
    @yield('main-content')

    @include('user.layouts.footer')

    <div class="chatbot-button" id="chatbot-button">
        <div class="chatbot-icon">
            <button class="btn btn-primary" style="background-color: #055875 !important; border:none;"> Book a consultation</button>
            <!-- <img src="{{asset('frontend/images/chatbot.png')}}" alt="Chatbot Icon"> -->
        </div>
    </div>
    <div class="chatbot-window" id="chatbot-window" style="z-index:200;">
        <div class="chatbot-content">
            <div class="chatbot-header">
                Chat with Us
            </div>
            {{-- <form id="chatbot_submit"> --}}
                <form method="POST" action="{{ route('chatbot.submit') }}">
                @csrf
                <div class="chatbot-input">
                    <div class="form-group">
                        <label for="name-input">Name:</label>
                        <input name="name" type="text" class="form-control" id="name-input" placeholder="Your Name" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="help-input">How can we help?
                            Describe what you would like help with i.e. I have a chest infection and would like to request antibiotics</label>
                        <textarea id="help-input" name="help" class="form-control" placeholder="Describe what you would like help with" required></textarea>
                        @error('help')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="medical-conditions-input">Do you have any medical conditions we should be aware of?</label>
                        <textarea id="medical-conditions-input" name="medical_conditions" class="form-control" placeholder="Enter your medical conditions (if any)" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact-preference-input">How would you prefer to be contacted?</label>
                        <select id="contact-preference-input" name="contact_preference" class="form-control">
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>
                    </div>
                    <div id="email-section">
                        <div class="form-group">
                            <label for="email-address-input">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="email-address-input" placeholder="Your Email" required>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="phone-section" style="display: none;">
                        <div class="form-group">
                            <label for="phone-number-input">Phone Number:</label>
                            <input type="tel" name="phone" class="form-control" id="phone-number-input" placeholder="Your Phone">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="call-time-input">When is the best time to call?</label>
                            <input type="text" name="call_time" class="form-control" id="call-time-input" placeholder="Best time for a call">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="urgent-checkbox">Please tick to confirm that your query is not urgent and you will be contacted within the next 24-48 hours.</label>
                        <input type="checkbox" name="urgent" id="urgent-checkbox" required>
                    </div>
                    <button type="submit" class="form-control" style="background-color: #0b3b3c; color: white">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @stack('frontend_script')
    <script>
        @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>


    <script>
        // Define the service data
        const services = [
            ["Remote Consultant", "fas fa-user-tie"],
            ["Private prescription", "fas fa-prescription"],
            ["Medical advice", "fas fa-stethoscope"],
            ["Skin Note", "fas fa-file-medical"],
            ["Service 5", "fas fa-envelope"],
            // Add more services as needed
        ];

        // Create carousel items dynamically with 4 services per slide
        const serviceCarousel = document.getElementById("serviceCarousel");
        for (let i = 0; i < services.length; i += 4) {
            const activeClass = i === 0 ? "active" : "";
            const carouselItem = document.createElement("div");
            carouselItem.className = `carousel-item ${activeClass}`;
            const servicesSlice = services.slice(i, i + 4);
            const servicesHtml = servicesSlice.map(service => `
                <div class="col-md-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <i class="${service[1]}" aria-hidden="true"></i>
                            </div>
                            <div class="detail-box">
                                <h6 style="margin-left:50px;">${service[0]}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            `).join("");
            carouselItem.innerHTML = `
                <div class="container-fluid">
                    <div class="row">
                        ${servicesHtml}
                    </div>
                </div>
            `;
            serviceCarousel.appendChild(carouselItem);
        }
    </script>
    <script>
        // script.js
        const chatbotButton = document.querySelector('#chatbot-button');
        const chatbotWindow = document.querySelector('#chatbot-window');
        const chatbotConversation = document.querySelector('#chatbot-conversation');
        const contactPreferenceInput = document.querySelector('#contact-preference-input');
        const emailSection = document.querySelector('#email-section');
        const phoneSection = document.querySelector('#phone-section');

        chatbotButton.addEventListener('click', () => {
            chatbotWindow.style.display = (chatbotWindow.style.display === 'none' || chatbotWindow.style.display === '') ? 'block' : 'none';
        });

        contactPreferenceInput.addEventListener('change', () => {
            if (contactPreferenceInput.value === 'email') {
                emailSection.style.display = 'block';
                phoneSection.style.display = 'none';
            } else if (contactPreferenceInput.value === 'phone') {
                emailSection.style.display = 'none';
                phoneSection.style.display = 'block';
            } else {
                emailSection.style.display = 'none';
                phoneSection.style.display = 'none';
            }
        });

        function sendMessage() {
            const nameInput = document.querySelector("#name-input").value;
            const helpInput = document.querySelector("#help-input").value;
            const medicalConditionsInput = document.querySelector("#medical-conditions-input").value;
            const contactPreference = contactPreferenceInput.value;
            const emailInput = document.querySelector("#email-address-input").value;
            const phoneInput = document.querySelector("#phone-number-input").value;
            const callTimeInput = document.querySelector("#call-time-input").value;
            const urgentCheckbox = document.querySelector("#urgent-checkbox").checked;

            chatbotConversation.innerHTML += `
            <div class="user-message">Name: ${nameInput}</div>
            <div class="user-message">How can we help: ${helpInput}</div>
            <div class="user-message">Medical Conditions: ${medicalConditionsInput}</div>
            <div class="user-message">Contact Preference: ${contactPreference}</div>
        `;

            if (contactPreference === 'email') {
                chatbotConversation.innerHTML += `<div class="user-message">Email Address: ${emailInput}</div>`;
            } else if (contactPreference === 'phone') {
                chatbotConversation.innerHTML += `
                <div class="user-message">Phone Number: ${phoneInput}</div>
                <div class="user-message">Best Time to Call: ${callTimeInput}</div>
            `;
            }

            if (urgentCheckbox) {
                chatbotConversation.innerHTML += `<div class="user-message">Query is Urgent: Yes</div>`;
            } else {
                chatbotConversation.innerHTML += `<div class="user-message">Query is Urgent: No</div>`;
            }

            // You can further process or send this data as needed

            document.querySelector("#name-input").value = "";
            document.querySelector("#help-input").value = "";
            document.querySelector("#medical-conditions-input").value = "";
            contactPreferenceInput.value = "email";
            document.querySelector("#email-address-input").value = "";
            document.querySelector("#phone-number-input").value = "";
            document.querySelector("#call-time-input").value = "";
            document.querySelector("#urgent-checkbox").checked = false;
            emailSection.style.display = 'none';
            phoneSection.style.display = 'none';
        }
    </script>

    <script>
        $(document).ready(function () {
            var header = $(".sticky-header");
            var scrollPosition = $(window).scrollTop();

            $(window).scroll(function () {
                scrollPosition = $(window).scrollTop();

                // Add or remove the "sticky" class based on scroll position
                if (scrollPosition > 0) {
                    header.addClass("sticky");
                } else {
                    header.removeClass("sticky");
                }
            });
        });
    </script>
</body>

</html>

