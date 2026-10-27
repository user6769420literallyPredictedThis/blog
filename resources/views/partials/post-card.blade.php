<div class="card bg-base-200 shadow-sm">
    @if ($post->images->count() === 1)
        <figure>
            <img src="{{ $post->images()->first()->path }}" />
        </figure>
    @elseif($post->images->count() > 1)
        <div class="carousel rounded-box w-64">
            @foreach ($post->images as $image)
                <div class="carousel-item w-full">
                    <img src="{{ $image->path }}" class="w-full" />
                </div>
            @endforeach
        </div>
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        @isset($posts)
            <p>{{ $post->snippet }}</p>
        @else
            <p>{{ !!$post->displayBody }}</p>
        @endisset
        <span class="text-base-content/50">
            <a href="{{ route('user', $post->user) }}" class="btn btn-link">
                {{ $post->user->name }}</a>
        </span>
        <span class="text-base-content/50">{{ $post->created_at->diffForHumans() }}</span>
        <span class="text-base-content"><b>Comments:</b> {{ $post->comments_count }}</span>
        <div>
            @foreach ($post->tags as $tag)
                <span class="badge badge-outline badge-primary">
                    <a href="{{ route('tag', $tag) }}">
                    {{ $tag->name }}</a>
                </span>
            @endforeach
        </div>
        <div class="card-actions justify-end">
            <a href="{{ route('post', $post) }}" class="btn btn-primary">@lang('Read More')</a>
        </div>
    </div>
</div>
