<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    @if ($configData)
        <link rel="shortcut icon" href="{{ asset('files/config/' . $configData->fav) }}" type="image/x-icon">
    @endif
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/default') }}/css/plugins/swiper.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/default') }}/css/style.css" type="text/css">
    @yield('style')
</head>

<body>
    @include('themes.default.layout.icon')
    @include('themes.default.layout.header')
    <main>
        @yield('content')
    </main>

    @include('themes.default.layout.footer')
    @include('themes.default.layout.modal')
    <!-- Page Overlay -->
    <div class="page-overlay"></div><!-- /.page-overlay -->
    <script src="{{ asset('themes/default') }}/js/plugins/jquery.min.js"></script>
    <script src="{{ asset('themes/default') }}/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('themes/default') }}/js/plugins/bootstrap-slider.min.js"></script>
    <script src="{{ asset('themes/default') }}/js/plugins/swiper.min.js"></script>
    <script src="{{ asset('themes/default') }}/js/plugins/countdown.js"></script>
    <script src="{{ asset('themes/default') }}/js/theme.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Cart update
        function loadCartData() {
            $.ajax({
                url: '{{ route('cart.items') }}',
                method: 'GET',
                success: function(data) {
                    updateCart(data.total, data.html, data.totalPrice);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading cart data:', error);
                }
            });
        }

        function updateCart(total, html, price) {
            let priceConvert = price +
                ' Tk';
            $('.js-cart-items-count').text(total);
            $('.cart-drawer-items-list').html(html);
            $('.cart-total-price').text(priceConvert);
        }

        //Checkout cart update
        function loadCheckoutData() {
            $.ajax({
                url: '{{ route('checkout.items') }}',
                method: 'GET',
                success: function(data) {
                    updateCheckout(data.html, data.totalPrice);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading cart data:', error);
                }
            });
        }

        function updateCheckout(html, price) {
            $('.checkout-product-list').html(html);
            $('.checkout-total').text(price);
        }
        $(document).ready(function() {

            loadCartData();

            $(document).on('click', '.cart-item-remove', function() {
                var productId = $(this).data('cartremove');

                var $button = $(this);
                var $loader = $button.siblings('.add-to-cart-remove-loader');

                $button.hide();
                $loader.show();

                $.ajax({
                    url: '/cart/item/remove/' + productId,
                    type: 'GET',
                    success: function(response) {
                        loadCartData();
                        loadCheckoutData();

                        $('.alert-message').text('Cart item remove successfully!');

                        $('#cookieConsentContainer').css('opacity', '1').fadeIn();

                        setTimeout(function() {
                            $('#cookieConsentContainer').fadeOut(); // Hide the div
                        }, 3000);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error adding product to cart:', error);
                        alert('There was an error adding the product to the cart.');
                    },
                    complete: function() {
                        $button.show();
                        $loader.hide();

                    }
                });
            });
        });
        // Search
        let searchTimeout;

        function fetchPcProducts() {
            let searchText = $('.search-main-products').val();

            $.ajax({
                url: '{{ route('search') }}',
                method: 'GET',
                data: {
                    search: searchText
                },
                success: function(response) {
                    console.log(response);

                    $('.search-loader').addClass('d-none');

                    if (response.html) {
                        // Update both search result containers
                        $('.search-result-grid').html(response.html);
                        $('.search-result-phone').html(response.html);
                        $('#message').html('<p style="color: green;">Products loaded successfully!</p>');
                    } else {
                        $('#message').html('<p style="color: red;">No products found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    $('.search-loader').addClass('d-none');
                    console.log('Error details:', xhr.responseText);
                    $('#message').html('<p style="color: red;">An error occurred: ' + xhr.responseText +
                        '</p>');
                }
            });
        }

        $(document).ready(function() {
            // Sync search input fields
            $('.search-main-products').on('input', function() {
                let searchText = $(this).val();
                $('.search-main-products').not(this).val(searchText);

                // Show loader and delay search request
                $('.search-loader').removeClass('d-none');
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(fetchPcProducts, 500); // 500ms delay
            });
        });
    </script>
    @yield('script')
</body>

</html>
