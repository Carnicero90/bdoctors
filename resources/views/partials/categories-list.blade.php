<div class="col-3">
    <a href="{{route("category-page", ["slug" => $category->slug])}}" class="font-weight-bold">
        <div class="card mb-3 zoom">
            <div class="card-body text-center text-uppercase cat-icon-container">
                <img src="{{asset("/img/icons/" . $category->slug . ".png")}}" alt="" class="mr-2">
                <span>{{str_replace("registrazione e mixaggio", "rec & mix", $category->name)}}</span>
            </div>
        </div>
    </a>
</div>