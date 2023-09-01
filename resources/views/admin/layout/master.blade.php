<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @include('admin.include.css')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>

		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
<style>
    .registration-message {
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      font-size: 16px;
      color: #333;
      font-weight: bold;
    }
  </style>

</head>
<body>
    @include('admin.include.navbar')
    @include('admin.include.sidebar')
    @include('admin.include.leftsidebar')
    <div class="mobile-menu-overlay"></div>
    @yield('content')
    @include('admin.include.script')
</body>
<script>
    @if(Session::has('success'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{!!Session::get('success')!!}");
    @endif
    @if(Session::has('msg'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
    toastr.success("{!!Session::get('success')!!}");
    @endif

    @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>


<script>

    const chatBoxElement = document.querySelector(".chat-box");
    const userMessageInput = document.getElementById("message");
    const sendMesageForm = document.getElementById("chat_form");

    let url = new URL(window.location.href);
    let userName = url.searchParams.get('name');

    const pusher = new Pusher('02accd28f51f85aca55a', {
      cluster: 'ap2',
      encrypted: true
    });

    const chatChannel = pusher.subscribe('chat');

    sendMesageForm.addEventListener("submit", function (e) {
      e.preventDefault();

      if (userMessageInput.value.trim() !== '') {
        // Send the chat message to the server
        axios.post('/admin/send/chat', {
          username: userName,
          message: userMessageInput.value.trim()
        })


        userMessageInput.value = '';
      }
    });

    chatChannel.bind('chating', function(data) {
    const isAdmin = data.message === 'admin';

    //new chat item to be added to the chat box
    const chatItem = document.createElement('li');
    chatItem.classList.add("clearfix");

    //added chat image
    const chatImg = document.createElement('span');
chatImg.classList.add("chat-img");
const img = document.createElement('img');

if (isAdmin) {
  img.src = "{{ asset('vendors/images/chat-img2.jpg') }}";
} else {
  img.src = "{{ asset('vendors/images/chat-img1.jpg') }}";
}
chatImg.appendChild(img);
chatItem.appendChild(chatImg);

    //added the chat username
    const chatUsername = document.createElement('div');
    chatUsername.classList.add("chat_username");
    chatUsername.textContent = data.message;
    chatItem.appendChild(chatUsername);

    //added  the chat body
    const chatBody = document.createElement('div');
    chatBody.classList.add("chat-body");
    chatBody.classList.add("clearfix");

    //added  the chat message with usernaame
    const chatMessage = document.createElement('p');
    chatMessage.textContent = data.username;
    chatBody.appendChild(chatMessage);

    //added chat time
    const chatTime = document.createElement('div');
    chatTime.classList.add("chat_time");
    chatTime.textContent = getCurrentTime();
    chatBody.appendChild(chatTime);

    //added chat body to the chat item
    chatItem.appendChild(chatBody);

    //added the chat item to the chat box
    chatBoxElement.querySelector(".chat-desc ul").appendChild(chatItem);
  });

    //real time
    function getCurrentTime() {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    const amPm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return `${hours}:${minutes}${amPm}`;
  }
  </script>


   {{-------register real time notification---------------}}

<script>
        //Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('e604e6b1600c85933f22', {
      cluster: 'ap2',
   // in case of private channel
    ///paste url above which check authentication of user
    });
    let notificationCounter = 0;
    const channel = pusher.subscribe("register-channel");
    channel.bind('App\\Events\\UserRegistration', function(data) {
        toastr.info(JSON.stringify(data.name) +'joined our site');
        //   alert(JSON.stringify(data.name));
        const userName = data.name;

    // Create a new notification item for the event
    const notificationItem = document.createElement('li');
    notificationItem.innerHTML = `
      <a href="#">
        <h3>${userName}</h3>
        <p id=notification-message></p>
      </a>
    `;

    // Get the notification list element
    const notificationList = document.getElementById('notification-list');

    // Add the new notification item to the notification list
    notificationList.appendChild(notificationItem);

    // Increment the notification counter and update the badge count
    notificationCounter++;
    const notificationBadge = document.querySelector('.notification-count');
    notificationBadge.textContent = notificationCounter;

    // Display the message in the <p> tag
    const notificationMessage = document.getElementById('notification-message');
    notificationMessage.textContent = `User "${userName}" has registered!`;
    });

  </script>

</html>
