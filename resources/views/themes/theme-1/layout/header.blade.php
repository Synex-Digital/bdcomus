@php
    use App\Models\ProductCategory;
    $cats = ProductCategory::get();

@endphp
<div class="header-mobile header_sticky">
    <div class="container d-flex align-items-center h-100">
        <a class="mobile-nav-activator d-block position-relative" href="#">
            <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_nav" />
            </svg>
            <span class="btn-close-lg position-absolute top-0 start-0 w-100"></span>
        </a>

        <div class="logo">
            <a href="{{ route('index') }}">
                @if ($configData)
                    <img src="{{ asset('files/config/' . $configData->logo) }}" alt="Uomo"
                        class="logo__image d-block">
                @endif
            </a>
        </div>

        <a href="#" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20.2236 12.5257C19.6384 9.40452 19.3458 7.84393 18.2349 6.92196C17.124 6 15.5362 6 12.3606 6H11.6394C8.46386 6 6.87608 6 5.76518 6.92196C4.65428 7.84393 4.36167 9.40452 3.77645 12.5257C2.95353 16.9146 2.54207 19.1091 3.74169 20.5545C4.94131 22 7.17402 22 11.6394 22H12.3606C16.826 22 19.0587 22 20.2584 20.5545C20.9543 19.7159 21.108 18.6252 20.9537 17"
                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" />
                <path d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6" stroke="#000000"
                    stroke-width="1.5" stroke-linecap="round" />
            </svg>
            <span class="cart-amount d-block position-absolute js-cart-items-count" id="total-cart-item-1">0</span>
        </a>
    </div>

    <nav
        class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
        <div class="container">
            <form method="GET" class="search-field position-relative mt-4 mb-3">
                <div class="position-relative">
                    <input class="search-field__input w-100 border rounded-1 search-main-products" type="text"
                        placeholder="Search products">
                    <button class="btn-icon search-popup__submit pb-0 me-2" type="submit">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_search" />
                        </svg>
                    </button>
                    <button class="btn-icon btn-close-lg search-popup__reset pb-0 me-2" type="reset"></button>
                </div>

                <div class="position-absolute start-0 top-100 m-0 w-100">
                    <div class="search-loader d-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" height="35px">
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="40"
                                cy="100">
                                <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4">
                                </animate>
                            </circle>
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="100"
                                cy="100">
                                <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2">
                                </animate>
                            </circle>
                            <circle fill="#000000" stroke="#000000" stroke-width="15" r="15" cx="160"
                                cy="100">
                                <animate attributeName="opacity" calcMode="spline" dur="2" values="1;0;1;"
                                    keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0">
                                </animate>
                            </circle>
                        </svg>
                    </div>
                    <div class="search-result">

                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="products-grid search-result-grid search-result-phone row row-cols-3 row-cols-md-5"
                id="search-result-grid">
            </div>
            <div class="overflow-hidden">
                <ul class="navigation__list list-unstyled position-relative">
                    <li class="navigation__item">
                        <a href="{{ route('index') }}"
                            class="navigation__link js-nav-right d-flex align-items-center">Home<svg class="ms-auto"
                                width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_next_sm" />
                            </svg></a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('shop') }}"
                            class="navigation__link js-nav-right d-flex align-items-center">Shop<svg class="ms-auto"
                                width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_next_sm" />
                            </svg></a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('contact') }}" class="navigation__link">Contact</a>
                    </li>

                    <li class="navigation__item">
                        <a href="{{ route('aboutus') }}" class="navigation__link">About</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-top mt-auto pb-2">
            <div class="container d-flex align-items-center">
                <label for="footerSettingsLanguage_mobile" class="me-2 text-secondary">Language</label>
                <select id="footerSettingsLanguage_mobile" class="form-select form-select-sm bg-transparent border-0"
                    aria-label="Default select example" name="store-language">
                    <option class="footer-select__option" selected>Bangla</option>
                </select>
            </div>

            <div class="container d-flex align-items-center">
                <label for="footerSettingsCurrency_mobile" class="me-2 text-secondary">Currency</label>
                <select id="footerSettingsCurrency_mobile" class="form-select form-select-sm bg-transparent border-0"
                    aria-label="Default select example" name="store-language">
                    <option selected>BDT</option>
                </select>
            </div>

            <ul class="container social-links list-unstyled d-flex flex-wrap mb-0">
                <li>
                    <a href="https://www.facebook.com/@euphoriaknit" target="_blank"
                        class="footer__social-link d-block ps-0">
                        <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_facebook" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<header id="header" class="header header_sticky position-absolute">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="{{ route('index') }}">
                    @if ($configData)
                        <img src="{{ asset('files/config/' . $configData->logo) }}" alt="{{ $configData->name }}"
                            class="logo__image d-block">
                    @endif
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item">
                        <a href="{{ route('index') }}" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('shop') }}" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('aboutus') }}" class="navigation__link">About</a>
                    </li>
                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <div class="header-tools__item hover-container">
                    <div class="js-hover__open position-relative">
                        <a class="js-search-popup search-field__actor" href="#">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_search"></use>
                            </svg>
                            <i class="btn-icon btn-close-lg"></i>
                        </a>
                    </div>

                    <div class="search-popup js-hidden-content">
                        <form action="https://uomo-html.flexkitux.com/Demo1/search_result.html" method="GET"
                            class="search-field container">
                            <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                            <div class="position-relative">
                                <input class="search-popup__input w-100 fw-medium search-main-products" type="text"
                                    name="search-keyword" placeholder="Search products">
                                <button class="btn-icon search-popup__submit" type="submit">
                                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_search"></use>
                                    </svg>
                                </button>
                                <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                            </div>

                            <div class="search-popup__results">
                                <div class="search-loader d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" height="35px">
                                        <circle fill="#000000" stroke="#000000" stroke-width="15" r="15"
                                            cx="40" cy="100">
                                            <animate attributeName="opacity" calcMode="spline" dur="2"
                                                values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                                repeatCount="indefinite" begin="-.4"></animate>
                                        </circle>
                                        <circle fill="#000000" stroke="#000000" stroke-width="15" r="15"
                                            cx="100" cy="100">
                                            <animate attributeName="opacity" calcMode="spline" dur="2"
                                                values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                                repeatCount="indefinite" begin="-.2"></animate>
                                        </circle>
                                        <circle fill="#000000" stroke="#000000" stroke-width="15" r="15"
                                            cx="160" cy="100">
                                            <animate attributeName="opacity" calcMode="spline" dur="2"
                                                values="1;0;1;" keySplines=".5 0 .5 1;.5 0 .5 1"
                                                repeatCount="indefinite" begin="0"></animate>
                                        </circle>
                                    </svg>
                                </div>
                                <div class="sub-menu search-suggestion">
                                    <div class="products-grid search-result-grid  row row-cols-2 row-cols-md-5"
                                        id="search-result-grid">
                                    </div>
                                    <h6 class="sub-menu__title fs-base">Quicklinks</h6>
                                    <ul class="sub-menu__list list-unstyled">
                                        @foreach ($cats as $cat)
                                            <li class="sub-menu__item">
                                                <a href="{{ route('front.category', $cat->slugs) }}"
                                                    class="menu-link menu-link_us-s">{{ $cat->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="search-result row row-cols-5"></div>
                            </div>
                        </form><!-- /.header-search -->
                    </div><!-- /.search-popup -->
                </div><!-- /.header-tools__item hover-container -->

                <a href="#" class="header-tools__item header-tools__cart js-open-aside"
                    data-aside="cartDrawer">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart"></use>
                    </svg>
                    <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
                </a>

                <a class="header-tools__item" href="#" data-bs-toggle="modal" data-bs-target="#siteMap">
                    <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_nav"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>
