<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="SwiftPOS customer and staff directory">
<title>@yield('title', 'Home') | SwiftPOS</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}"></head>
<body><a class="skip" href="#main">Skip to content</a>
<header><div class="nav-shell"><a class="brand" href="{{ route('home') }}">S<span>SwiftPOS</span></a>
<nav aria-label="Main navigation">
<a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
<a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
<a href="{{ route('customers.index') }}" @if(request()->routeIs('customers.*')) aria-current="page" @endif>Customers</a>
<a href="{{ route('users.index') }}" @if(request()->routeIs('users.*')) aria-current="page" @endif>Users</a>
</nav></div></header>
<main id="main" class="container">@yield('content')</main>
<footer><div class="container">SwiftPOS · Earl Christian R. Velasquez · DX31 <span>IT0049 · TFA6</span></div></footer>
</body></html>
