<a href="{{route("profile", ["id" => $user->id])}}" class="user-card-a">
    <div class="card mb-4 zoom position-relative user-card shadow">
        <div class="card-body d-flex flex-column align-items-center">
            <div class="profile-img-card-container mb-3">
                @if ($user->pic)
                    <img src="{{asset('storage/' . $user->pic)}}" alt="" class="profile-img-card">
                @else
                    <img src="{{asset("/img/user/user-img.png")}}" alt="" class="profile-img-card">
                @endif
            </div>
            <div class="font-weight-bold">
                <span>{{ucfirst($user->name) . " " . ucfirst($user->lastname)}}</span>
            </div>
            @if ($user->avg_vote)
                <div>
                    {{-- intval() ritorna un intero da una stringa --}}
                    @for ($i = 0; $i < intval($user->avg_vote); $i++)
                        <span><i class="fas fa-star"></i></span>
                    @endfor
                </div>
            @else
                <div>
                    <span><small>nessun voto ricevuto</small></span>
                </div>
            @endif
            @if (count($user->reviews))
                <div>
                    <span>
                        <small>
                            <i class="fas fa-file-alt mr-2"></i>{{count($user->reviews)}}
                            @if (count($user->reviews) == 1)
                                recensione
                            @elseif (count($user->reviews) > 1)
                                recensioni    
                            @endif
                            </small>
                    </span>
                </div>
            @endif
            @if ($user->sponsored)
                <div v-if="user.sponsored" class="recommended-badge">
                    <small class="badge badge-top">Top Bard</small>
                </div>
            @endif
        </div>
    </div>
</a>