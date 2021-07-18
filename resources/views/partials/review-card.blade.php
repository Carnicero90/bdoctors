<div class="card mt-4">
    <div class="card-header d-flex">
        <div class="mr-5">
            <span><i class="fas fa-user-circle mr-1"></i></span>
            <span>{{ $review->author_name }}</span>
        </div>
        <div>
            <span><i class="fas fa-envelope mr-1"></i></span>
            <span>{{ $review->author_email }}</span>
        </div>
    </div>
    <div class="card-body">
        <span class="text-secondary">{{ date('d/m/Y', $review->created_at->timestamp) }}</span>
        <div>
            @for ($i = 0; $i < $review->votes; $i++)
                <i class="fas fa-star"></i>
            @endfor
        </div>
        {{-- div vote --}}
        <div class="mt-2 mb-2">
            @for ($i = 0; $i < $review->vote->value; $i++)
                <i class="fas fa-star"></i>
            @endfor
        </div>
        {{-- END div vote --}}
        <div class="mt-2 mb-2">
            <p class="card-text text-secondary">
                {{ strlen($review->content) > 120 ? substr($review->content, 0, 120) . '...' : $review->content }}
            </p>
        </div>
    </div>
</div>