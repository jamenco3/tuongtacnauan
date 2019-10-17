@extends('master')
@section('content')
	<section id="mu-restaurant-menu" style="margin-top: 100px">
	{{-- <head>
		<title>Demo chat</title>
	</head> --}}
{{-- 	<body> --}}
		<div id="data" style="text-align: center">
			@foreach($messages as $message)
			<p id="{{$message->id}}"><strong>{{ $message->author }}</strong>: {{ $message->content }}</p>
			@endforeach
		</div>
		<div style="text-align: center">
			<form action="send-message" method="POST">
				@CSRF
				Name: <input type="text" value="{{ Auth::user()->name }}" name="author">
				<br>
				<br>
				Content: <textarea name="content" rows="5" style="width: 80%"></textarea>
				<button type="submit" name="send" id="sendButton">Gửi</button>
			</form>
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

		<script>           
        $(document).ready(function () {
         	var socket = io('http://localhost:6001')
	        socket.on('chat:message',function(data){
	            console.log(data)
	            if($('#'+data.id).length == 0){
	                $('#data').append('<p><strong>'+data.author+'</strong>: '+data.content+'</p>')
	            }
	            else{
	                console.log('Đã có tin nhắn')
	            }
	        })
        });
        </script>

		</div>

	{{-- </body> --}}
	</section>
@endsection