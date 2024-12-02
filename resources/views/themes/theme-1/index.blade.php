@extends('themes.default.layout.app')
@php
    $product = 0;
@endphp
@section('content')
    <section class="swiper-container js-swiper-slider slideshow full-width_padding"
        data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "pagination": {
          "el": ".slideshow-pagination",
          "type": "bullets",
          "clickable": true
        }
      }'>

        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide full-width_border border-1" style="border-color: #f5e6e0;">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-bg" style="background-color: #f5e6e0;">
                            <img loading="lazy" src="{{ asset('files/banner/' . $banner->banner_image) }}" width="1761"
                                height="778" alt="Pattern" class="slideshow-bg__img object-fit-cover">
                        </div>
                        <!-- <p class="slideshow_markup font-special text-uppercase position-absolute end-0 bottom-0">Summer</p> -->
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            {{-- <img loading="lazy" src="{{ asset('files/banner/' . $banner->banner_image) }}" width="400" height="733"
                                alt="Woman Fashion 1"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 h-auto w-auto"> --}}
                            <div class="character_markup">
                                <p
                                    class="text-uppercase font-sofia fw-bold animate animate_fade animate_rtl animate_delay-10">
                                    {{ $banner->category ? $banner->category->category_name : 'unkown' }}</p>
                            </div>
                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase text-red fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                {{ $banner->category ? $banner->category->category_name : 'unkown' }}</h6>
                            <h2 class="text-uppercase h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                                {{ $banner->banner_description }}</h2>
                            <h2 class="text-uppercase h1 fw-bold animate animate_fade animate_btt animate_delay-5">
                                {{ $banner->banner_title }}
                            </h2>
                            <a href="{{ route('index') }}"
                                class="btn-link btn-link_lg default-underline text-uppercase fw-medium animate animate_fade animate_btt animate_delay-7">Discover
                                More</a>
                        </div>
                    </div>
                </div><!-- /.slideshow-item -->
            @endforeach
        </div><!-- /.slideshow-wrapper js-swiper-slider -->

        <div class="container">
            <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-5"></div>
            <!-- /.products-pagination -->
        </div><!-- /.container -->

        <div
            class="slideshow-social-follow d-none d-xxl-block position-absolute top-50 start-0 translate-middle-y text-center">
            <ul class="social-links list-unstyled mb-0 text-secondary">
                <li>
                    <a href="#" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_facebook" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_twitter" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_instagram" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.pinterest.com/" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_pinterest" width="14" height="15" viewBox="0 0 14 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_pinterest" />
                        </svg>
                    </a>
                </li>
            </ul><!-- /.social-links list-unstyled mb-0 text-secondary -->
            <span class="slideshow-social-follow__title d-block mt-5 text-uppercase fw-medium text-secondary">Follow
                Us</span>
        </div><!-- /.slideshow-social-follow -->
        <a href="#section-collections-grid_masonry"
            class="slideshow-scroll d-none d-xxl-block position-absolute end-0 bottom-0 text_dash text-uppercase fw-medium">Scroll</a>
    </section>

    <section class="category-carousel container py-4">
        <div class="position-relative">
            <div class="swiper-container js-swiper-slider"
                data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "effect": "none",
              "loop": true,
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 3,
                  "slidesPerGroup": 3,
                  "spaceBetween": 24
                },
                "992": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 5,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                }
              }
            }'>
                <div class="swiper-wrapper">
                    @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('front.category', $category->slugs) }}">
                                <img loading="lazy" class="w-100 h-auto mb-3"
                                    src="{{ asset('files/category/' . $category->category_image) }}" width="258"
                                    height="278" alt="">
                            </a>
                            <div class="text-center">
                                <a href="{{ route('front.category', $category->slugs) }}"
                                    class="menu-link menu-link_us-s text-uppercase">{{ $category->category_name }}</a>
                                <p class="mb-0 text-secondary">{{ $category->getTotalProduct() }} Products</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="products-carousel container py-3 py-md-5">
        <h2 class="section-title text-uppercase fw-bold mb-3">Best Selling</h2>
        <div class="row">
            @foreach ($populars as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('themes.default.component.product', ['products' => $product])
                </div>
            @endforeach
        </div>
    </section><!-- /.products-grid -->

    <section class="products-carousel container py-3 py-md-5">
        <h2 class="section-title text-uppercase fw-bold mb-3">Latest</h2>
        <div class="row">
            @foreach ($latests as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('themes.default.component.product', ['products' => $product])
                </div>
            @endforeach
        </div>
    </section><!-- /.products-grid -->

    <section class="products-carousel container py-3 py-md-5">
        <h2 class="section-title text-uppercase fw-bold mb-3">Recommended</h2>
        <div class="row">
            @foreach ($featureds as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('themes.default.component.product', ['products' => $product])
                </div>
            @endforeach
        </div>
    </section><!-- /.products-grid -->
    <section class="brands-carousel container py-5">
        <h2 class="d-none">Brands</h2>
        <div class="position-relative">
            <div class="swiper-container js-swiper-slider"
                data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 7,
              "slidesPerGroup": 7,
              "effect": "none",
              "loop": true,
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "spaceBetween": 24
                },
                "992": {
                  "slidesPerView": 7,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                }
              }
            }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand1.png" width="120"
                            height="20" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand2.png" width="87"
                            height="20" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand3.png" width="132"
                            height="22" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand4.png" width="72"
                            height="21" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand5.png" width="123"
                            height="31" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand6.png" width="137"
                            height="22" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="{{ asset('themes/default/brands') }}/brand7.png" width="94"
                            height="21" alt="">
                    </div>
                </div><!-- /.swiper-wrapper -->
            </div><!-- /.swiper-container js-swiper-slider -->
        </div><!-- /.position-relative -->

    </section><!-- /.products-carousel container -->
@endsection
