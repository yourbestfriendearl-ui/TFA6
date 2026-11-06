@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="hero"><p class="eyebrow">YOUR STORE, CONNECTED</p><h1>A clearer view of<br>the people behind your store.</h1>
<p class="lead">Keep customer details and staff information within easy reach. One simple workspace for your everyday connections.</p>
<div class="actions"><a class="button" href="{{ route('customers.index') }}">View customers &rarr;</a><a class="button secondary" href="{{ route('users.index') }}">Meet your team</a></div></section>
<section class="grid" aria-label="Explore SwiftPOS"><a class="card" href="{{ route('customers.index') }}"><span class="icon">01</span><h2>Customer Accounts</h2><p>Find customer names, email addresses, and phone numbers.</p><strong>Open directory &rarr;</strong></a>
<a class="card" href="{{ route('users.index') }}"><span class="icon">02</span><h2>User Accounts</h2><p>See your team, usernames, and assigned staff roles.</p><strong>View team &rarr;</strong></a>
<a class="card" href="{{ route('about') }}"><span class="icon">03</span><h2>About SwiftPOS</h2><p>Learn about this application and its purpose.</p><strong>Learn more &rarr;</strong></a></section>
@endsection
