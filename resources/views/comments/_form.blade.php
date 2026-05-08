<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <!-- Username Field -->
            <div class="form-group row">
                <label for="username" class="col-md-3 col-form-label">Username</label>
                <div class="col-md-9">
                    <input type="text" name="username" id="username" value="{{ old('username', $comment->username) }}" class="form-control @error('username') is-invalid @enderror">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Comment Field -->
            <div class="form-group row">
                <label for="comment" class="col-md-3 col-form-label">Comment</label>
                <div class="col-md-9">
                    <textarea name="comment" id="comment" rows="3" class="form-control @error('comment') is-invalid @enderror">{{ old('comment', $comment->comment) }}</textarea>
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
                    <button type="submit" class="btn btn-success">Comment</button>
                    <a href="{{ route('home_page.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
