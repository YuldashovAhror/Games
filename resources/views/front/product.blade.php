<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../../issets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../issets/css/normalize.css">
    <link rel="stylesheet" href="../../../issets/css/owl.carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../issets/css/animate.css">
    <link rel="stylesheet" href="../../../issets/css/main.css">
    <title>Amin|{{ $product['name_' . $lang] }}</title>

    <meta name="description" content="{!! $product['discription_' . $lang] !!}">

    <!-- Facebook -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="{!! $product['discription_' . $lang] !!} ">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{ $product->photos[0] }}">
    <meta property="og:type" content="website">

    <!-- Google Plus -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="{!! $product['discription_' . $lang] !!}">
    <meta itemprop="image" content="{{ $product->photos[0] }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="{!! $product['discription_' . $lang] !!}">
    <meta name="twitter:image" content="{{ $product->photos[0] }}">
</head>

<body>



    <!-- FEEDBACK -->


    <div class="feedback">
        <div class="feedback-content">
            <div class="feedback__title">
                {{ __('asd.Заявка') }}
            </div>
            <div class="feedback-wrap">
                <div class="feedback__text">
                    {{ __('asd.Оставьте свои контактные данные, и наш менеджер расскажет больше интересных деталей') }}
                </div>
                <div class="feedback-form">
                    <input type="hidden" value="{{ $product->id }}" id="product_id">
                    <input type="text" id="first_name" placeholder="Ваше имя" class="form_name">
                    <input type="tel" id="phone" placeholder="Телефон" class="form_tel">
                    <input id="token" value="{{ csrf_token() }}" type="hidden" required>
                    <button class="btn" id="button" onclick="send1()" type="button">
                        {{ __('asd.Отправить') }}
                    </button>
                </div>
                <div class="feedback__advice">
                    {{ __('asd.Даю согласие на обработку моих персональных данных') }}
                </div>
            </div>
            <div class="feedback-done">
                <div class="feedback__img">
                    <img src="../../../issets/img/icons/done.svg" alt="ico">
                </div>
                <div class="feedback-done__text">
                    {{ __('asd.Ваш запрос получен. мы свяжемся с вами в ближайшее время') }}
                </div>
            </div>
        </div>
    </div>
    <!-- MOBILE-MENU -->

    @include('components.front.mobile')


    <!-- HEADER -->

    @include('components.front.header')

    <!-- OFFER -->

    <section class="offer clouds offer-product">
        <div class="container">
            <h1 class="offer__title">
                {{ $product['name_' . $lang] }}
            </h1>
        </div>
    </section>

    <!-- PRODUCT -->

    <section class="product">
        <div class="about-balloons balloons">
            <img src="../../../issets/img/balloon.svg" alt="balloon">
            <img src="../../../issets/img/balloon.svg" alt="balloon">
        </div>
        <div class="container">
            <div class="product-wrap">
                <div class="product-main">
                    <div class="product-gallery">
                        <div class="product-gallery__thumbs">
                            @foreach ($product->photos as $photo)
                                <div class="product-gallery__thumb">
                                    <img src="{{ $photo }}" alt="product">
                                </div>
                            @endforeach
                        </div>
                        <div class="product-gallery__img">
                            <img src="" alt="product">
                        </div>
                    </div>
                    <div class="product-desc">
                        <div class="product-desc__btn">
                            <span>{{ __('asd.Описание') }}</span>
                            <svg width="42" height="42" viewBox="0 0 42 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="21" cy="21" r="21"
                                    transform="matrix(-1 0 0 1 42 0)" fill="white" />
                                <path
                                    d="M28.9181 24.0508L22.3981 17.5308C21.6281 16.7608 20.3681 16.7608 19.5981 17.5308L13.0781 24.0508"
                                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="product-desc__main">
                            <div class="product-desc__item">
                                <div>{{ __('asd.Названия игрушек') }}</div>
                                <div>{{ $product['name_' . $lang] }}</div>
                            </div>
                            <div class="product-desc__item">
                                <div>{{ __('asd.Артикул') }}</div>
                                <div>{{ $product->article }}</div>
                            </div>
                            <div class="product-desc__text">
                                {!! $product['discription_' . $lang] !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info__title">
                        {{ $product['name_' . $lang] }}
                    </div>
                    <ul class="product-info__list">
                        @foreach ($product->atributes as $atribute)
                            <li class="product-info__item">
                                <div>
                                    {{ $atribute['name_' . $lang] }}
                                </div>
                                <div>
                                    {{ $atribute['size_' . $lang] }}
                                </div>
                            </li>
                        @endforeach
                        <li class="product-info__item">
                            <div>
                                {{ __('asd.Сертификат производства') }}
                            </div>
                            <div>
                                <a href="{{ $product->sertificat }}" download class="btn">
                                    <img src="../../../issets/img/icons/download.svg" alt="ico">
                                    <span>{{ __('asd.Скачать') }}</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="product-info__text">
                        {{ __('asd.Технические характеристики и цвета могу быть изменены без предварительного уведомления') }}
                    </div>
                    <div class="product-info__btn">
                        <a href="" class="btn popup__on">
                            <img src="../../../issets/img/icons/basket.svg" alt="ico">
                            <span>{{ __('asd.Оформить заказ') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="product-more">
                <div class="product-more__title">
                    {{ __('asd.Похожие товары') }}
                </div>
                <div class="product-carousel owl-carousel">
                    @foreach ($products as $product)
                        <div class="products-item">
                            <div class="products-item__wrap">
                                <div class="products-item__img">
                                    <img src="{{ $product->photos[0] }}" alt="product">
                                </div>
                                <div class="products-item__buttons">
                                    <button class="products-item__zoom">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.5819 12.0019C15.5819 13.9819 13.9819 15.5819 12.0019 15.5819C10.0219 15.5819 8.42188 13.9819 8.42188 12.0019C8.42188 10.0219 10.0219 8.42188 12.0019 8.42188C13.9819 8.42188 15.5819 10.0219 15.5819 12.0019Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M12.0037 20.2688C15.5337 20.2688 18.8238 18.1887 21.1138 14.5887C22.0138 13.1787 22.0138 10.8087 21.1138 9.39875C18.8238 5.79875 15.5337 3.71875 12.0037 3.71875C8.47375 3.71875 5.18375 5.79875 2.89375 9.39875C1.99375 10.8087 1.99375 13.1787 2.89375 14.5887C5.18375 18.1887 8.47375 20.2688 12.0037 20.2688Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button class="products-item__basket">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.39612 6.5H15.5961C18.9961 6.5 19.3361 8.09 19.5661 10.03L20.4661 17.53C20.7561 19.99 19.9961 22 16.4961 22H7.50612C3.99612 22 3.23612 19.99 3.53612 17.53L4.43612 10.03C4.65612 8.09 4.99612 6.5 8.39612 6.5Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8M20.41 17.03H8"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button class="products-item__like">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.62 20.8116C12.28 20.9316 11.72 20.9316 11.38 20.8116C8.48 19.8216 2 15.6916 2 8.69156C2 5.60156 4.49 3.10156 7.56 3.10156C9.38 3.10156 10.99 3.98156 12 5.34156C12.5138 4.64744 13.183 4.08329 13.954 3.69431C14.725 3.30532 15.5764 3.10232 16.44 3.10156C19.51 3.10156 22 5.60156 22 8.69156C22 15.6916 15.52 19.8216 12.62 20.8116Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="products-item__name">
                                {{ $product['name_' . $lang] }}
                            </div>
                            <div class="products-item__mark">
                                @if ($product->star == 1)
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                @endif
                                @if ($product->star == 2)
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                @endif
                                @if ($product->star == 3)
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                @endif
                                @if ($product->star == 4)
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                @endif
                                @if ($product->star == 5)
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                    <img src="../../../issets/img/icons/star.svg" alt="ico">
                                @endif
                            </div>
                            <a href="{{ route('product.show', $product) }}" class="products-item__link"></a>
                        </div>
                    @endforeach


                </div>
                <div class="product-arrows arrows">
                    <span class="arrow-left">
                        <img src="../../../issets/img/icons/chevron-left.svg" alt="ico">
                    </span>
                    <span class="arrow-right">
                        <img src="../../../issets/img/icons/chevron-right.svg" alt="ico">
                    </span>
                </div>
            </div>
            <div class="products-zoom">
                <div class="products-zoom__img">
                    <img src="" alt="product">
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <script>
        function send1() {

            let token = $("#token").val();
            let product_id = $('#product_id').val();
            let name = $('#first_name').val();
            let phone = $('#phone').val();
            $.ajax({
                token: token,
                type: "get",
                url: "/feedback",
                data: {
                    name: name,
                    phone: phone,
                    product_id: product_id,
                },
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            });
            setTimeout(() => {
                $('.feedback-wrap').hide()
                $('.feedback-done').show()
                $("#first_name").val('');
                $("#phone").val('');
            }, 1000)
            setTimeout(() => {
                $('.feedback-wrap').show()
                $('.feedback-done').hide()
                $('.feedback').hide()
            }, 3000)
        }
    </script>
    <div class="footer-pattern"></div>
    @include('components.front.footer')
    <script src="../../../issets/js/jquery-3.4.1.min.js"></script>
    <script src="../../../issets/js/jquery.inputmask.min.js"></script>
    <script src="../../../issets/js/owl.carousel.js"></script>
    <script src="../../../issets/js/wow.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="../../../issets/js/main.js"></script>
</body>

</html>
