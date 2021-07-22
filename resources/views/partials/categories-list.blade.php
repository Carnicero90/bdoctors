<div class="col-3">
    <a href="{{route("category-page", ["slug" => $category->slug])}}" class="font-weight-bold no-decorations">
        <div style="background-image: url({{ asset('/img/categories_img/' . config('categories.' . $category->slug . '.img')) }})" class="card mb-3 zoom cat-card shadow">
            <div class="text-center text-uppercase cat-icon-container">
                <span class="cat-list-title">{{str_replace("registrazione e mixaggio", "rec & mix", $category->name)}}</span>
            </div>
        </div>
    </a>
</div>