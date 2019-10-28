@extends('layouts.app')
@extends('master')
@section('content')
<div class="container">
    <chats :user="{{auth()->user()}}"></chats>
</div>
@endsection