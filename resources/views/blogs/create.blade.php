{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Blog</h2>
    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required>{{ old('description') }}</textarea>
            @error('description') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Images</label>
            <input type="file" name="images[]" multiple>
            @error('images') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Tags</label>
            <select name="tags[]" multiple required>
                @foreach($tags as $tag)
                    <option value="{{ $tag }}">{{ $tag }}</option>
                @endforeach
            </select>
            @error('tags') <span>{{ $message }}</span> @enderror
        </div>
        <div id="links-container">
            <label>Links</label>
            <div class="link-row">
                <input type="text" name="links[0][title]" placeholder="Link Title">
                <input type="url" name="links[0][url]" placeholder="Link URL">
            </div>
        </div>
        <button type="button" onclick="addLink()">+ Add More</button>
        <button type="submit">Create</button>
    </form>
</div>
<script>
let linkIndex = 1;
function addLink() {
    let container = document.getElementById('links-container');
    let div = document.createElement('div');
    div.className = 'link-row';
    div.innerHTML = `<input type="text" name="links[${linkIndex}][title]" placeholder="Link Title">
                     <input type="url" name="links[${linkIndex}][url]" placeholder="Link URL">`;
    container.appendChild(div);
    linkIndex++;
}
</script>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px; margin-top:40px;">
    @if(session('success'))
        <div style="background:#d4edda; padding:10px; border-radius:5px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background:#f8d7da; padding:10px; border-radius:5px; margin-bottom:15px;">
            <ul style="margin:0; padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background:linear-gradient(135deg,#43cea2 0%,#185a9d 100%); padding:32px; border-radius:16px;">
        <h2 style="text-align:center; color:#fff; margin-bottom:28px;">Create Blog</h2>

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required style="width:100%; padding:10px; border-radius:6px;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Description</label>
                <textarea name="description" required style="width:100%; padding:10px; border-radius:6px; min-height:80px;">{{ old('description') }}</textarea>
            </div>

            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Images</label>
                <input type="file" name="images[]" multiple style="width:100%; padding:10px; border-radius:6px; background:#fff;">
            </div>

            <div style="margin-bottom:18px;">
                <label style="color:#fff;">Tags</label>
                <select name="tags[]" multiple required style="width:100%; padding:10px; border-radius:6px;">
                    @foreach($tags as $tag)
                        <option value="{{ $tag }}" {{ in_array($tag, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="links-container" style="margin-bottom:18px;">
                <label style="color:#fff;">Links</label>
                <div class="link-row" style="margin-bottom:8px;">
                    <input type="text" name="links[0][title]" placeholder="Link Title" style="width:48%; padding:8px; margin-right:2%;">
                    <input type="url" name="links[0][url]" placeholder="Link URL" style="width:48%; padding:8px;">
                </div>
            </div>

            <button type="button" onclick="addLink()" style="width:100%; padding:10px; background:#fff; color:#185a9d; font-weight:bold;">+ Add More</button>
            <button type="submit" style="width:100%; padding:12px; background:#fff; color:#43cea2; font-weight:bold; margin-top:10px;">Create</button>
        </form>
    </div>
</div>

<script>
let linkIndex = 1;
function addLink() {
    let container = document.getElementById('links-container');
    let div = document.createElement('div');
    div.className = 'link-row';
    div.style.marginBottom = '8px';
    div.innerHTML = `<input type="text" name="links[${linkIndex}][title]" placeholder="Link Title" style="width:48%; padding:8px; margin-right:2%;">
                     <input type="url" name="links[${linkIndex}][url]" placeholder="Link URL" style="width:48%; padding:8px;">`;
    container.appendChild(div);
    linkIndex++;
}
</script>
@endsection
