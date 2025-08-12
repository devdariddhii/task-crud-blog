{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Login</h2>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Login</button>
    </form>
    <a href="{{ route('register') }}">Don't have an account? Register</a>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container" style="max-width:400px; margin-top:60px;">
    <div style="background:linear-gradient(135deg,#2575fc 0%,#6a11cb 100%); padding:32px 28px 24px 28px; border-radius:16px; box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h2 style="text-align:center; color:#fff; margin-bottom:28px; font-weight:700;">Login</h2>
        @if(session('success'))
            <div style="background:#fff; color:#2575fc; padding:8px; border-radius:6px; margin-bottom:18px; text-align:center;">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                @error('email') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Password</label>
                <input type="password" name="password" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                @error('password') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <button type="submit" style="width:100%; padding:12px; background:#fff; color:#2575fc; font-weight:700; border:none; border-radius:6px; font-size:18px; margin-top:10px; transition:0.2s;">Login</button>
        </form>
        <div style="text-align:center; margin-top:18px;">
            <a href="{{ route('register') }}" style="color:#fff; text-decoration:underline;">Don't have an account? Register</a>
        </div>
    </div>
</div>
@endsection