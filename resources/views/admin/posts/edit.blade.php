@extends('layouts.dashboard')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Title card  --}}
                <div class="card">
                    <div class="card-header">Edit a Post</div>

                    <div class="card-body">
                        <div class="errors">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form action="{{route('admin.posts.update', $post)}}" method="POST">
                            {{-- Token  --}}
                            @csrf
                            {{-- / Token  --}}
                            @method('PUT')

                            {{-- title post --}}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" 
                                    class="form-control @error('title') is-invalid @enderror " 
                                    placeholder="Post's title"
                                    value="{{ old('title', $post->title) }}"
                                >
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{--/ title post --}}

                            {{-- content post --}}
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea type="text" name="content" 
                                    class="form-control @error('content') is-invalid @enderror" 
                                    placeholder="Write the post's content..."
                                >{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                @enderror
                            </div>
                            {{--/ content post --}}

                            <div class="form-group">
                                <input type="submit" class="btn btn-info white" value="Edit Post">
                            </div>
                        </form>
                    </div>
                </div>
                <a href="{{route('admin.posts.index')}}" class="btn btn-success">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection