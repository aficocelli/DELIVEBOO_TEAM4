<footer>
    <div class="footer_wrapper"> 
        <a id="sel_link" href="{{route('guest.index')}}">
            <div class="footer_logo">
                <img class="img-logo-footer" src="{{asset('img-carousel/dropfood-logo-white.svg')}}" alt="dropfood logo">
                <h6 class="text_logo_footer">dropfood</h6>
            </div>
        </a>
    </div> 
    <div class="footer_text">
        <ul class="social d-inline-flex list-unstyled">
            <li class="list_item"><a target="_blank" class="list_item_link" href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
            <li class="list_item"><a target="_blank" class="list_item_link" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
            <li class="list_item"><a target="_blank" class="list_item_link" href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a></li>
            <li class="list_item"><a target="_blank" class="list_item_link" href="https://www.youtube.com/"><i class="fab fa-youtube-square"></i></a></li>
        </ul>
    </div>

    <div class="footer_payment">
        <small class="d-block mb-1">we accept the following payment methods:</small>
        <ul class="payments_custom d-inline-flex align-items-center list-unstyled">
            <li class="pay_cards"><img src="{{asset('img-carousel/credit_cards/MainVisaWhite.png')}}" alt=""></li>
            <li class="pay_cards_mc"><img src="{{asset('img-carousel/credit_cards/mc_hrz_rev.svg')}}" alt=""></li>
            <li class="pay_cards_ms"><img src="{{asset('img-carousel/credit_cards/ms_hrz_rev.svg')}}" alt=""></li>
        </ul>
    </div>
    <small class="d-block copyright_custom mt-5">made with &hearts; by Team 4</small>
    <small class="copyright_custom">Copyright&reg; 2021</small>
    
</footer>