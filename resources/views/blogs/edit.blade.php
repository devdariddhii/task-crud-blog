@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Blog</h2>
    <form method="POST" action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" required>
            @error('title') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required>{{ old('description', $blog->description) }}</textarea>
            @error('description') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Images</label>
            <input type="file" name="images[]" multiple>
            @if($blog->images)
                @foreach($blog->images as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="50">
                @endforeach
            @endif
            @error('images') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Tags</label>
            <select name="tags[]" multiple required>
                @foreach($tags as $tag)
                    <option value="{{ $tag }}" {{ in_array($tag, $blog->tags ?? []) ? 'selected' : '' }}>{{ $tag }}</option>
                @endforeach
            </select>
            @error('tags') <span>{{ $message }}</span> @enderror
        </div>
        <div id="links-container">
            <label>Links</label>
            @php $i = 0; @endphp
            @if($blog->links)
                @foreach($blog->links as $link)
                    <div class="link-row">
                        <input type="text" name="links[{{ $i }}][title]" value="{{ $link['title'] }}" placeholder="Link Title">
                        <input type="url" name="links[{{ $i }}][url]" value="{{ $link['url'] }}" placeholder="Link URL">
                    </div>
                    @php $i++; @endphp
                @endforeach
            @else
                <div class="link-row">
                    <input type="text" name="links[0][title]" placeholder="Link Title">
                    <input type="url" name="links[0][url]" placeholder="Link URL">
                </div>
            @endif
        </div>
        <button type="button" onclick="addLink()">+ Add More</button>
        <button type="submit">Update</button>
    </form>
</div>
<script>
let linkIndex = {{ $i ?? 1 }};
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
@endsection