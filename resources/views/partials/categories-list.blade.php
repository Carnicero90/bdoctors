<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <a href="{{route("category-page", ["slug" => $category->slug])}}" class="font-weight-bold no-decorations">
        <div style="background-image: url({{ asset('/img/categories_img/' . config('categories.' . $category->slug . '.img')) }})" class="card mb-4 zoom cat-card">
            <div class="text-center text-uppercase cat-icon-container">
                <span class="cat-list-title cat-header">{{str_replace("registrazione e mixaggio", "rec & mix", $category->name)}}</span>
            </div>
        </div>
    </a>
</div>