<div class="card-wrapper">
    <div class="card">
        <a href="{{ route('blogPostShow', ['slug' => $blog->slug]) }}">
            <div class="card-img">
                <img src="{{ asset('storage/featured_image/' . $blog->featured_image) }}" alt="画像の説明">
            </div>

            <p class="mb-0">
                {{ Str::limit($blog->title, 70, '...') }}
            </p>
        </a>
    </div>
</div>
