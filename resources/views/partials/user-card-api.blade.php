<a :href="'bards/' + user.id">
    <div class="card mb-4 zoom position-relative">
        <div class="card-body d-flex flex-column align-items-center">
            <div class="profile-img-card-container">
                <img v-if="user.pic" :src="'/storage/' + user.pic" alt="" class="profile-img-card">
                <img v-else src="{{asset("/img/user-img.png")}}" alt="" class="profile-img-card">
            </div>
            <div class="mt-3 mb-2 font-weight-bold">
                <span>@{{user.name + ' ' + user.lastname}}</span>
            </div>
            <div class="text-secondary mb-2">
                <small><span>icone categorie</span></small>
            </div>
            <div>
                <span v-if="user.avg_vote > 0"><i v-for="n in parseInt(user.avg_vote)" class="fas fa-star"></i></span>
            </div>
            <div class="mt-2">
                <span v-if="user.nmb_reviews > 0">
                    <small>
                        <i class="fas fa-file-alt mr-2"></i>@{{user . nmb_reviews}} recensioni
                    </small>
                </span>
            </div>
        </div>
        <div v-if="user.sponsored" class="recommended-badge">
            <small class="badge badge-secondary">Consigliato</small>
        </div>
    </div>
</a>