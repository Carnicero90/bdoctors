<a href="{{route("profile", ["id" => $user->id])}}" style="text-decoration: none; color: #444;">
    <div class="card mb-4 zoom" style="position: relative;">    
        <div class="card-body d-flex flex-column align-items-center">
            <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                @if ($user->pic)
                    <img src="{{asset('storage/' . $user->pic)}}" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                @else
                    <img src="{{asset("/img/user-img.png")}}" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">                                    
                @endif
            </div>
            <div class="mt-3 mb-2 font-weight-bold">
                <span>{{ucfirst($user->name) . " " . ucfirst($user->lastname)}}</span>
            </div>

            <div class="text-secondary mb-2">
                <small><span>icone categorie</span></small>
            </div>
            <div>
                @for ($i = 0; $i < intval($user->avg_vote); $i++) {{-- intval() ritorna un intero da una stringa --}}
                    <span><i class="fas fa-star"></i></span>
                @endfor
            </div>
            <div class="mt-2">
                <span>
                    <small>
                        <i class="fas fa-file-alt mr-2"></i>numero recensioni
                    </small>
                </span>
            </div>
            @if ($user->sponsored)
                <div style="position: absolute; top: 5px; right: 7px;">
                    <small class="badge badge-secondary">Consigliato</small>
                </div>
            @endif
        </div>
    </div>
</a>