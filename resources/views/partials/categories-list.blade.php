<div class="col-3">
    <a href="{{route("category-page", ["slug" => $category->slug])}}" class="font-weight-bold" style="text-decoration: none; color: #444;">
        <div class="card mb-3 zoom">
            <div class="card-body text-center text-uppercase">
                <img src="{{asset("/img/icons/" . $category->slug . ".png")}}" alt="" style="height: 25px;" class="mr-2">
                <span>{{str_replace("registrazione e mixaggio", "rec & mix", $category->name)}}</span>
            </div>
        </div>
    </a>
</div>