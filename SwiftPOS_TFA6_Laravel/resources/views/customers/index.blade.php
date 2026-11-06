@extends('layouts.app')
@section('title', 'Customer Accounts')
@section('content')
<p class="eyebrow">DIRECTORY</p>
<div class="heading-row">
    <div><h1>Customer Accounts</h1><p class="lead">Customer contact information, together in one place.</p></div>
    <span class="count">{{ $customers->count() }} records</span>
</div>
<div class="table-wrap">
    <table>
        <caption class="sr-only">Customer Accounts directory</caption>
        <thead><tr><th scope="col">Full name</th><th scope="col">Email</th><th scope="col">Phone</th></tr></thead>
        <tbody>
        @forelse ($customers as $record)
            <tr><td>{{ $record->full_name }}</td><td>{{ $record->email }}</td><td>{{ $record->phone }}</td></tr>
        @empty
            <tr><td colspan="3">No customers found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<p class="note">Customer or staff details shown for the SwiftPOS demonstration.</p>
@endsection
