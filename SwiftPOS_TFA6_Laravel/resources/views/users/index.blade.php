@extends('layouts.app')
@section('title', 'User Accounts')
@section('content')
<p class="eyebrow">DIRECTORY</p>
<div class="heading-row">
    <div><h1>User Accounts</h1><p class="lead">Your people and their roles at a glance.</p></div>
    <span class="count">{{ $users->count() }} records</span>
</div>
<div class="table-wrap">
    <table>
        <caption class="sr-only">User Accounts directory</caption>
        <thead><tr><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Role</th></tr></thead>
        <tbody>
        @forelse ($users as $record)
            <tr><td>{{ $record->username }}</td><td>{{ $record->full_name }}</td><td><span class="badge">{{ $record->role }}</span></td></tr>
        @empty
            <tr><td colspan="3">No users found.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
<p class="note">Customer or staff details shown for the SwiftPOS demonstration.</p>
@endsection
