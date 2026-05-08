<div class="input-group" style="max-width: 300px;">
    <select id="filter_posts_topic" class="form-select">
        <option value="">All Topics</option>
        @foreach ($topics as $topic)
            <option value="{{ $topic }}" {{ $topic == request('topic') ? 'selected' : '' }}>{{ $topic }}</option>
        @endforeach
    </select>
</div>