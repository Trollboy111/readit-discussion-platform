<div class="card-body">
        <div class="form-group row">
            <label for="username" class="col-md-3 col-form-label">Username</label>
            <div class="col-md-9">
                <input type="text" name="username" id="username" value="{{ old('username', $post->username) }}" class="form-control @error('username') is-invalid @enderror">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="topic" class="col-md-3 col-form-label">Topic</label>
            <div class="col-md-9">
                <input type="text" name="topic" id="topic" value="{{ old('topic', $post->topic) }}" class="form-control @error('topic') is-invalid @enderror">
                @error('topic')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-md-3 col-form-label">Title</label>
            <div class="col-md-9">
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="comment" class="col-md-3 col-form-label">Comment</label>
            <div class="col-md-9">
                <textarea name="comment" id="comment" rows="3" class="form-control @error('comment') is-invalid @enderror">{{ old('comment', $post->comment) }}</textarea>
                @error('comment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-success">Post</button>
                <a href="{{ route('home_page.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
</div>

