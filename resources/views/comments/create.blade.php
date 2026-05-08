@extends('home_page.main')

@section('content')
    <section class="gradient-custom">
        <main class="py-5">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>Add New Comment</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('comments.store', $post_id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post_id }}">
                                    @include('comments._form')
                                </form>                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
