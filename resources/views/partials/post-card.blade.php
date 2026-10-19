<div class="card bg-base-200 shadow-sm">
    {{-- <figure>
                <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
            </figure> --}}
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
