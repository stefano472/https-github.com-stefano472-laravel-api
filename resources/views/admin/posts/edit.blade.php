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
                        <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                            {{-- Token  --}}
                            @csrf
                            {{-- / Token  --}}
                            @method('PUT')

                            {{-- title post --}}
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" 
                                    class="form-control @error('title') is-invalid @enderror" 
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

                            {{-- categories select --}}
                            <div class="form-group">
                                <label for="title">Category:</label>
                                <select name="category_id" class="@error('category_id') is-invalid @enderror">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            {{--/ categories select --}}

                            <div class="form-group">
                                @if ($post->cover)
                                    <div>
                                        <img src="{{ asset('storage/' . $post->cover) }}" alt="cover-img">
                                    </div>
                                @endif
                                <label for="image">Cover Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            
                            <div class="form-group d-flex">
                                <div>Tags:</div>
                                <div class="ml-5">
                                    @foreach ($tags as $tag)
                                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                                {{ $post->tags->contains($tag) ? 'checked' : '' }}
                                            class="form-check-input @error('tags') is-invalid @enderror"
                                        >
                                        <div class="form-check-label">
                                            {{ $tag->name }}
                                        </div>
                                    @endforeach
                                </div>
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

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