@extends('home_page.main')

@section('content')
<section class="gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-4">
                        <h1 class="text-center mb-4 pb-2" style="color: lightblue; font-weight: bold; font-family:serif">ReadIt</h1>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-plus me-2"></i> 
                                Create Post
                            </a>
                            @include('home_page._filter')
                        </div>
                        @if ($message = session('message'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif                       
                        <div class="row">
                            <div class="col">
                                @if ($postsWithComments->count())
                                    @foreach ($postsWithComments as $index => $post)
                                    <!-- Add a visual divider between posts -->
                                    <div class="post-container mb-4 p-3 border rounded shadow-sm">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3 mt-1" src="{{ asset('images/icon.png') }}" alt="avatar" width="50" height="50" />
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="mb-0 d-flex justify-content-between align-items-center">
                                                        <p class="mb-0">
                                                            <span class="small">r/{{ $post->topic }}</span>
                                                            <span class="small">
                                                                · {{ \Carbon\Carbon::parse($post->created_at)->isToday() ? \Carbon\Carbon::parse($post->created_at)->diffForHumans() : \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                                                            </span>
                                                        </p>
                                                        <div class="d-flex">
                                                            <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-outline-success btn-sm d-flex align-items-center me-2">
                                                                <i class="fas fa-plus me-2"></i> <!-- Reply Icon -->
                                                                Add Comment
                                                            </a>        
                                                            <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}" class="btn btn-outline-warning btn-sm d-flex align-items-center me-2">
                                                                <i class="fas fa-edit me-2"></i> <!-- Reply Icon -->
                                                                Edit
                                                            </a>   
                                                            <a href="{{ route('posts.show', ['post_id' => $post->id]) }}" class="btn btn-outline-primary btn-sm d-flex align-items-center me-2">
                                                                <i class="fas fa-eye me-2"></i> <!-- Reply Icon -->
                                                                View
                                                            </a>          
                                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" class="delete-form">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center" title="Delete">
                                                                    <i class="fas fa-trash me-2"></i> <!-- Trash Icon -->
                                                                    Delete
                                                                </button>
                                                            </form>                                                       
                                                        </div>
                                                    </div>
                                                    <span class="small mt-0">
                                                        {{ $post->username }} 
                                                    </span>
                                                    <p class="mb-0 mt-1 h5 text-dark font-weight-bold">
                                                        {{ $post->title }} 
                                                    </p>
                                                    <p class="small mb-0">
                                                        {{ $post->comment }}
                                                    </p>
                                                </div>
                                            
                                                @foreach ($post->comments as $index => $comment)
                                                <!-- Add a border to each comment to separate them from each other -->
                                                <div class="comment-container mt-0 p-3 pb-0 border-left">
                                                    <div class="d-flex flex-start">
                                                        <a class="me-3" href="#">
                                                            <img class="rounded-circle shadow-1-strong" src="{{ asset('images/icon.png') }}" alt="avatar" width="25" height="25" />
                                                        </a>
                                                        <div class="flex-grow-1 flex-shrink-1">
                                                            <div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0">
                                                                        {{ $comment->username }} 
                                                                        <span class="small">
                                                                          · {{ \Carbon\Carbon::parse($comment->created_at)->isToday() ? \Carbon\Carbon::parse($comment->created_at)->diffForHumans() : \Carbon\Carbon::parse($comment->created_at)->format('Y-m-d') }}
                                                                        </span>
                                                                    </p>
                                                                    <div class="d-flex">     
                                                                        <a href="{{ route('comments.edit', ['comment_id' => $comment->id]) }}" class="btn btn-outline-warning btn-sm d-flex justify-content-center align-items-center me-2">
                                                                            <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                                                        </a>   
                                                                        <a href="{{ route('comments.show', ['comment_id' => $comment->id]) }}" class="btn btn-outline-primary btn-sm d-flex justify-content-center align-items-center me-2">
                                                                            <i class="fas fa-eye"></i> <!-- View Icon -->
                                                                        </a>                                                                               
                                                                        <form action="{{ route('comments.destroy', ['comment_id' => $comment->id]) }}" method="POST" style="display: inline;" class="delete-form">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-outline-danger btn-sm d-flex justify-content-center align-items-center" title="Delete">
                                                                                <i class="fas fa-trash"></i> <!-- Trash Icon -->
                                                                            </button>
                                                                        </form>                                                                                                                            
                                                                    </div>
                                                                </div>
                                                                <p class="small mb-0">
                                                                    {{ $comment->comment }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
