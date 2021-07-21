<a href="{{route("profile", ["id" => $user->id])}}" class="user-card-a">
    <div class="card mb-4 zoom position-relative user-card">    
        <div class="card-body d-flex flex-column align-items-center">
            <div class="profile-img-card-container mb-3">
                @if ($user->pic)
                    <img src="{{asset('storage/' . $user->pic)}}" alt="" class="profile-img-card">
                @else
                    <img src="{{asset("/img/user-img.png")}}" alt="" class="profile-img-card">
                @endif
            </div>
            <div class="font-weight-bold">
                <span>{{ucfirst($user->name) . " " . ucfirst($user->lastname)}}</span>
            </div>
            <div>
                {{-- TODO to remove --}}
                <small><span>icone categorie</span></small>
            </div>
            <div>
                {{-- TODO to remove --}}
                <small><span>stelline voto medio</span><span><i class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span></small>
                @for ($i = 0; $i < intval($user->avg_vote); $i++) {{-- intval() ritorna un intero da una stringa --}}
                    <span><i class="fas fa-star"></i></span>
                @endfor
            </div>
            <div>
                <span>
                    <small>
                        <i class="fas fa-file-alt mr-2"></i>numero recensioni
                    </small>
                </span>
            </div>
            @if ($user->sponsored)
                <div class="recommended-badge">
                    <small class="badge badge-secondary">Consigliato</small>
                </div>
            @endif
        </div>
    </div>
</a>