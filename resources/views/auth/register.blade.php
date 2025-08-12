{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
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
        <div>
            <label>Mobile</label>
            <input type="text" name="mobile" value="{{ old('mobile') }}" required>
            @error('mobile') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>DOB</label>
            <input type="date" name="dob" value="{{ old('dob') }}" required>
            @error('dob') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
                <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
                <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
            </select>
            @error('gender') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Profile Image</label>
            <input type="file" name="profile_image">
            @error('profile_image') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Status</label>
            <select name="status" required>
                <option value="Active" {{ old('status')=='Active'?'selected':'' }}>Active</option>
                <option value="Inactive" {{ old('status')=='Inactive'?'selected':'' }}>Inactive</option>
            </select>
            @error('status') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="{{ route('login') }}">Already have an account? Login</a>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container" style="max-width:480px; margin-top:40px;">
    <div style="background:linear-gradient(135deg,#6a11cb 0%,#2575fc 100%); padding:32px 28px 24px 28px; border-radius:16px; box-shadow:0 4px 24px rgba(0,0,0,0.08);">
        <h2 style="text-align:center; color:#fff; margin-bottom:28px; font-weight:700;">Create Your Account</h2>
        <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                @error('name') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
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
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Mobile</label>
                <input type="text" name="mobile" value="{{ old('mobile') }}" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                @error('mobile') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">DOB</label>
                <input type="date" name="dob" value="{{ old('dob') }}" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                @error('dob') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Gender</label>
                <select name="gender" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                    <option value="">Select</option>
                    <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
                    <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
                    <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
                </select>
                @error('gender') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Profile Image</label>
                <input type="file" name="profile_image" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd; background:#fff;">
                @error('profile_image') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Status</label>
                <select name="status" required style="width:100%; padding:10px; border-radius:6px; border:1px solid #ddd;">
                    <option value="Active" {{ old('status')=='Active'?'selected':'' }}>Active</option>
                    <option value="Inactive" {{ old('status')=='Inactive'?'selected':'' }}>Inactive</option>
                </select>
                @error('status') <span style="color:#ffeb3b;">{{ $message }}</span> @enderror
            </div>
            <button type="submit" style="width:100%; padding:12px; background:#fff; color:#2575fc; font-weight:700; border:none; border-radius:6px; font-size:18px; margin-top:10px; transition:0.2s;">Register</button>
        </form>
        <div style="text-align:center; margin-top:18px;">
            <a href="{{ route('login') }}" style="color:#fff; text-decoration:underline;">Already have an account? Login</a>
        </div>
    </div>
</div>
@endsection