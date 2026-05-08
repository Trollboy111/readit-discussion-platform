@extends('home_page.main')

@section('content')
<section class="gradient-custom">
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Edit Comment</strong>
              </div>           
              <div class="card-body">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @method('PUT')
                    @csrf
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