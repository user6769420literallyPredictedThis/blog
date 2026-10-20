<div class="card bg-base-200 shadow-sm">
    @if($post->images->count() === 1)
        <figure>
            <img src="{{ $post->images()->first()->path }}" />
        </figure>
    @elseif($post->images->count() > 1)
        <div class="carousel rounded-box w-64">
            @foreach($post->images as $image)
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
        <span class="text-base-content/50">{{ $post->user->name }}</span>
        <span class="text-base-content/50">{{ $post->created_at->diffForHumans() }}</span>
        <div class="card-actions justify-end">
            <a href="{{ route('post', $post) }}" class="btn btn-primary">@lang('Read More')</a>
        </div>
    </div>
</div>