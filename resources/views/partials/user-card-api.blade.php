<a :href="'bards/' + user.id" style="text-decoration: none; color: #444;">
    <div class="card mb-4 zoom" style="position: relative;">
        <div class="card-body d-flex flex-column align-items-center">
            <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                <img v-if="user.pic" :src="'/storage/' + user.pic" alt="" style="max-height: 120px; width: 100%; height: 100%; object-fit: cover;">
                <img v-else src="{{asset("/img/user-img.png")}}" alt="" style="max-height: 120px;">
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
        <div v-if="user.sponsored" style="position: absolute; top: 5px; right: 7px;">
            <small class="badge badge-secondary">Consigliato</small>
        </div>
    </div>
</a>