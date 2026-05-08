@extends('home_page.main')

@section('content')
    <section class="gradient-custom">
        <main class="py-5">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>Add New Post</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('posts.store') }}" method="POST">
                                    @csrf
                                    @include('posts._form')
                                </form>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
