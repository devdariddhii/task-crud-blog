@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $blog->title }}</h2>
    <p><strong>Author:</strong> {{ $blog->user->name }}</p>
    <p><strong>Date:</strong> {{ $blog->created_at->format('d M Y') }}</p>
    <p><strong>Tags:</strong> {{ $blog->tags ? implode(', ', $blog->tags) : '' }}</p>
    <div>
        <strong>Description:</strong>
        <p>{{ $blog->description }}</p>
    </div>
    <div>
        <strong>Images:</strong>
        @if($blog->images)
            @foreach($blog->images as $img)
                <a href="{{ asset('storage/'.$img) }}" target="_blank">
                    <img src="{{ asset('storage/'.$img) }}" width="100">
                </a>
            @endforeach
        @endif
    </div>
    <div>
        <strong>Links:</strong>
        @if($blog->links)
            @foreach($blog->links as $link)
                <a href="{{ $link['url'] }}" class="btn btn-info" target="_blank">{{ $link['title'] }}</a>
            @endforeach
        @endif
    </div>
</div>
@endsection