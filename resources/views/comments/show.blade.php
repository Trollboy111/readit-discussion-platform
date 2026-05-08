@extends('home_page.main')

@section('content')
<section class="gradient-custom">
  <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Comment Details</strong>
              </div>           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="first_name" class="col-md-3 col-form-label">Username</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $comment->username }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-md-3 col-form-label">Comment</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $comment->comment }}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-0">
                      <div class="text-center">
                          <a href="{{ route("home_page.index") }}" class="btn btn-outline-secondary">Go Back</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
</section>
@endsection