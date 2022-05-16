<div class="top_panel">
    <div class="wrap">
        <div class="wrap_float">
            <div class="currency">
                <select>
                    <option value="usd">usd</option>
                    <option value="eur">eur</option>
                    <option value="rub">rub</option>
                </select>
            </div>
            <div class="left">
                <div class="search_btn"></div>
                <a href="/" class="logo">
                    <img src="img/logo.svg" alt="">
                </a>
            </div>
            <div class="menu_wrap" id="menu_wrap">
                <div class="scroll">
                    <div class="center">
                        <div class="menu">
                            <ul>
                                <li><a href="/" class="{{ \Request::is('/') ? 'active' : '' }}"><span>Home</span></a></li>
                                <li>
                                    <a href="{{ url('trips') }}" class="{{ \Request::is('trips') ? 'active' : '' }}"><span>Trip list</span></a>
                                </li>
                            </ul>
                            <div class="mobile_content">
                                <div class="currency_mob">
                                    <select>
                                        <option value="usd">usd</option>
                                        <option value="rub">rub</option>
                                        <option value="eur">eur</option>
                                    </select>
                                    <p>
                                        Chosen currency
                                    </p>
                                </div>
                                <div class="tel">
                                    <a href="tel:+0034411345777">+ 00 344 113 457 77</a>
                                    <p>Round the clock support</p>
                                </div>
                                <div class="social">
                                    <a href="#" class="link facebook"><span></span></a>
                                    <a href="#" class="link instagram"><span></span></a>
                                    <a href="#" class="link pinterest"><span></span></a>
                                    <a href="#" class="link twitter"><span></span></a>
                                    <a href="#" class="link youtube"><span></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="close" id="menu-close">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="tel"><a href="tel:+19092020119"><span>+ 1909 202 0119</span></a></div>
                    </div>
                    <div class="user" id="userblock">
                        <div class="userlink" id="userlink"></div>
                        <div class="usermenu" id="usermenu">
                            <ul>
                                <li><a href="#" class="js-popup-open" data-href="#login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile_btn" id="mobile_btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>
