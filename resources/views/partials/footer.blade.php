{{-- TODO --}}
<!-- FOOTER -->
<footer>
    <div class="bg-footer">
        <div class="container inner">
            <div class="d-flex justify-content-around pt-5 xs-container">
                <!-- Logo -->
                <div class="flex-son">
                    <img src="{{asset('img/boolbards-logo-white-1.png')}}" alt="BoolBards Logo">
                </div>

                <!-- About me -->
                <div class="d-flex">
                    <div class="flex-son">
                        <h4>Chi siamo</h4>
                        <p>Vivamus suscipit <span>tortor eget felis porttitor</span> volutpat. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
                    </div>

                    <!-- Category links -->
                    <div class="flex-son">
                        <h4>Categorie</h4>
                        <ul class="category-links d-flex categories-ul">

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "violinisti"])}}">
                                   Violinisti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "dj"])}}">
                                   Dj
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "cantanti"])}}">
                                   Cantanti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "batteristi"])}}">
                                   Batteristi
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "bassisti"])}}">
                                   Bassisti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "chitarristi"])}}">
                                   Chitarristi
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "sassofonisti"])}}">
                                   Sassofonisti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "registrazione-e-mixaggio"])}}">
                                   Rec & Mix
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "percussionisti"])}}">
                                   Percussionisti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "tastieristi"])}}">
                                   Tastieristi
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "trombettisti"])}}">
                                   Trombettisti
                                </a>
                            </li>

                            <li class="categories-li">
                                <i class="fas fa-chevron-right"></i>
                                <a href="{{route("category-page", ["slug" => "flautisti"])}}">
                                   Flautisti
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="flex-son">
                        <h4>Contatti</h4>
                        <div class="contatti">
                            Becci di Boolbards, Italy <br>
                            Piazza Cinque Giornate 10 Cap 20129 <br>
                            Numero REA: MI - 2078111 Milano (MI), Italia
                        </div>
                        <div class="social-icons">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Copyright -->
            <div class="copyright">
                <i class="far fa-copyright"></i>Copyright 2021 | Developed by <span>i Becci di BoolBards</span> | All Rights Reserved | Powered by <span>Laravel</span>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- Fixed -->
{{-- <div class="fixed-bot">
    <div class="chev-box">
        <a href="#up">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div> --}}
<!-- End Fixed -->
