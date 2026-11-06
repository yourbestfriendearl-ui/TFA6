@extends('layouts.app')
@section('title', 'About')
@section('content')
<p class="eyebrow">ABOUT SWIFTPOS</p>
<h1>A simple place for<br>your store connections.</h1>
<section class="panel prose">
    <h2>What SwiftPOS does</h2>
    <p>SwiftPOS keeps customer contact details and staff information easy to find. Open either directory from the navigation to see the latest saved records.</p>
    <h2>About this project</h2>
    <p>I developed this application for IT0049 Technical Formative Assessment 6. It builds on my four-page POS foundation by retrieving customer and staff records from a database through Laravel Eloquent.</p>
    <dl><dt>Developer</dt><dd>Earl Christian R. Velasquez</dd><dt>Section</dt><dd>DX31</dd><dt>Professor</dt><dd>Sir Tio</dd><dt>Technology</dt><dd>Laravel, PHP, Eloquent, Blade, and CSS</dd></dl>
    <a class="button" href="{{ route('customers.index') }}">Explore customer accounts</a>
</section>
@endsection
