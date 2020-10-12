<div class="cookie-modal-btn"><i class="fas fa-cookie-bite"></i></div>
<div class="cookie-modal-container<?php echo $this->isCookieSet() ? ' cookie_set' : ''; ?>" style="display: none;">
    <div class="cookie-modal-inner" style="display: none;">
        <div class="stepbox stepbox-1">
            <p>Ta strona używa plików cookies</p>

            <ul>
                <li>koniecznych do korzystania ze strony <b>(cookies niezbędne)</b></li>
                <li>koniecznych do korzystania ze statystyk dot.
                    zachowania użytkowników w narzędziu Google Analytics <b>(cookies analityczne)</b></li>
                <li>koniecznych do współpracy z zewnętrznymi serwisami, np. Messenger,
                    Facebook, Twitter, Youtube czy Linkedin <b>(cookies społecznościowe)</b></li>
                <li>koniecznych do wyświetlania Ci reklam w zewnętrznych serwisach za pomocą narzędzia Facebook Pixel
                    oraz wyświetlania Ci propozycji zapisu na newsletter <b>(cookies marketingowe)</b></li>
            </ul>

            <p>
                Możesz zaakceptować korzystanie z wszystkich typów plików cookies lub dokonać wyboru,
                a także zmienić w każdej chwili swoje ustawienia.
                Więcej informacji o Twoich prawach w <a href="<?php echo get_home_url();?>/polityka-prywatnosci/"><b>Polityce prywatności</b></a>.
            </p>

            <div class="modal-navi-box">
                <div class="modal-buttons">
                    <div class="modal-button-box">
                        <div class="single-modal-btn btn-accept-all">
                            <span>Włącz wszystkie cookies!</span>
                        </div>
                        <div class="modal-btn-description">
                            akceptuję wszystkie pliki cookies
                        </div>
                    </div>

                    <div class="modal-button-box">
                        <div class="single-modal-btn btn-accept-partial">
                            <span>Chcę wybrać cookies!</span>
                        </div>
                        <div class="modal-btn-description">
                            chcę ustawić swoje preferencje
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stepbox stepbox-2" style="display: none;">
            <div class="cookie-modal-options">
                <div class="single-cookie-option">
                    <div class="cookie-option-name">Cookies niezbędne</div>
                    <div class="cookie-option-switch-box">
                        <div class="cookie-option-switch switch_on switch_disabled">
                            <div class="cookie-option-text">
                                <div>Wł.</div>
                                <div>Wył.</div>
                            </div>
                            <div class="cookie-option-switch-dot"></div>
                        </div>
                    </div>
                </div>

<!--                <div class="single-cookie-option">-->
<!--                    <div class="cookie-option-name">Cookies funkcjonalne</div>-->
<!--                    <div class="cookie-option-switch-box">-->
<!--                        <div class="cookie-option-switch cookie_functional --><?php //echo isset($_COOKIE['cookie_functional']) && $_COOKIE['cookie_functional'] === '1' ? 'switch_on' : 'switch_off'; ?><!--">-->
<!--                            <div class="cookie-option-text">-->
<!--                                <div>Wł.</div>-->
<!--                                <div>Wył.</div>-->
<!--                            </div>-->
<!--                            <div class="cookie-option-switch-dot"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="single-cookie-option">
                    <div class="cookie-option-name">Cookies analityczne</div>
                    <div class="cookie-option-switch-box">
                        <div class="cookie-option-switch cookie_analitic <?php echo isset($_COOKIE['cookie_analitic']) && $_COOKIE['cookie_analitic'] === '1' ? 'switch_on' : 'switch_off'; ?>">
                            <div class="cookie-option-text">
                                <div>Wł.</div>
                                <div>Wył.</div>
                            </div>
                            <div class="cookie-option-switch-dot"></div>
                        </div>
                    </div>
                </div>

                <div class="single-cookie-option">
                    <div class="cookie-option-name">Cookies społecznościowe</div>
                    <div class="cookie-option-switch-box">
                        <div class="cookie-option-switch cookie_social <?php echo isset($_COOKIE['cookie_social']) && $_COOKIE['cookie_social'] === '1' ? 'switch_on' : 'switch_off'; ?>">
                            <div class="cookie-option-text">
                                <div>Wł.</div>
                                <div>Wył.</div>
                            </div>
                            <div class="cookie-option-switch-dot"></div>
                        </div>
                    </div>
                </div>

                <div class="single-cookie-option">
                    <div class="cookie-option-name">Cookies marketingowe</div>
                    <div class="cookie-option-switch-box">
                        <div class="cookie-option-switch cookie_comercial <?php echo isset($_COOKIE['cookie_comercial']) && $_COOKIE['cookie_comercial'] === '1' ? 'switch_on' : 'switch_off'; ?>">
                            <div class="cookie-option-text">
                                <div>Wł.</div>
                                <div>Wył.</div>
                            </div>
                            <div class="cookie-option-switch-dot"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-navi-box">
                <div class="modal-buttons">
                    <div class="modal-button-box">
                        <div class="single-modal-btn btn-accept-all">
                            <span>Lubię wszystkie cookies!</span>
                        </div>
                        <div class="modal-btn-description">
                            akceptuję wszystkie pliki cookies
                        </div>
                    </div>

                    <div class="modal-button-box">
                        <div class="single-modal-btn btn-accept-specific">
                            <span>Wybrałem swoje cookies</span>
                        </div>
                        <div class="modal-btn-description">
                            chcę zapisać moje ustawienia
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>