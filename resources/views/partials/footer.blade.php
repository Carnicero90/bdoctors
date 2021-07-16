{{-- TODO --}}
<!-- FOOTER -->
<footer>
    <div class="jumbotrontest">
        <div class="">
            <!-- Logo -->
            <div>
                <img src="" alt="Author Logo">
            </div>

            <!-- About me -->
            <div class="">
                <div class="">
                    <h4>About me</h4>

                    <p>
                        Vivamus suscipit <span>tortor eget felis porttitor</span> volutpat. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat.
                    </p>
                </div>

                <!-- Useful links -->
                <div class="">
                    <h4>Useful links</h4>

                    <ul class="">
                        <li v-for="item in usefulLink">
                            <i class="fas fa-chevron-right"></i> 
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="">
                    <h4>Contact info</h4>

                    <ul>
                        <li v-for="item in contact">
                            
                        </li>
                    </ul>

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
            <i class="far fa-copyright"></i> Copyright 2020 - 2021 | Developed by <span>I Becci di BoolBards</span> | All Rights Reserved | Powered by <span>Laravel</span>
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
