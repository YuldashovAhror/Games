<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="issets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="issets/css/normalize.css">
    <link rel="stylesheet" href="issets/css/owl.carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="issets/css/animate.css">
    <link rel="stylesheet" href="issets/css/main.css">
    <title>{{ $tag->name }}</title>

    <meta name="description" content="{!! $tag->discription !!}">

    <!-- Facebook -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="{{ $tag->name }}">
    <meta property="og:description" content="{!! $tag->discription !!}">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{ $tag->photo }}">
    <meta property="og:type" content="website">

    <!-- Google Plus -->
    <meta itemprop="name" content="{{ $tag->name }}">
    <meta itemprop="description" content="{!! $tag->discription !!}">
    <meta itemprop="image" content="{{ $tag->photo }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $tag->name }}">
    <meta name="twitter:description" content="{!! $tag->discription !!}">
    <meta name="twitter:image" content="{{ $tag->photo }}">
</head>

<body>

    <!-- FORM-DONE-->

    {{-- @dd($sliders) --}}
    <div class="form-done">
        <div class="feedback-content">
            <div class="feedback__title">
                {{ __('asd.Заявка') }}
            </div>
            <div class="feedback-done">
                <div class="feedback__img">
                    <img src="issets/img/icons/done.svg" alt="ico">
                </div>
                <div class="feedback-done__text">
                    {{ __('asd.Ваш запрос получен. мы свяжемся с вами в ближайшее время') }}
                </div>
            </div>
        </div>
    </div>


    <!-- PRELOADER -->

    <div class="preloader">
        <div class="preloader__logo">
            <lottie-player class="preloader__player" src="issets/js/loader.json" background="transparent" speed="1"
                loop autoplay></lottie-player>
        </div>
    </div>

    <!-- FEEDBACK -->

    @include('components.front.feedback')

    <!-- MOBILE-MENU -->

    @include('components.front.mobile')


    <!-- HEADER -->

    @include('components.front.header')

    <!-- MAIN -->

    <section class="main clouds">
        <div class="container">
            <div class="main-content">
                <h1 class="main__title">
                    {{ __('asd.Создай счастье') }}<br>{{ __('asd.с помощью игрушек') }}
                </h1>
                <div class="main-btns">
                    <a href="/catalog" class="btn">
                        {{ __('asd.Перейти в каталог') }}
                    </a>
                    <a href="#" class="btn btn-yellow feedback-open">
                        {{ __('asd.Связаться с нами') }}
                    </a>
                </div>
            </div>
            <div class="main-carousel">
                <div class="main-carousel__circle">
                    @foreach ($sliders as $slider)
                        <img src="{{ $slider->photo }}" alt="toy">
                    @endforeach
                </div>
                <div class="main-carousel__img">
                    <img src="" alt="toy">
                    <img src="" alt="toy">
                </div>
                <div class="main-carousel__arrows arrows">
                    <span class="arrow-left">
                        <img src="issets/img/icons/chevron-left.svg" alt="ico">
                    </span>
                    <span class="arrow-right">
                        <img src="issets/img/icons/chevron-right.svg" alt="ico">
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORY -->

    <section class="category">
        <div class="container">
            {{-- @dd($categories) --}}
            @foreach ($categories as $category)
                    <div class="category-item wow fadeInUp" data-wow-delay=".3s">
                        <div class="category-item__ico">
                            <img src="{{ $category->icon }}" alt="ico">
                        </div>
                        <div class="category-item__name">
                            <p>{{ $category['name_' . $lang] }}</p>
                            <svg width="228" height="118" viewBox="0 0 228 118" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M214.735 54.3934C214.842 53.7143 214.928 53.0352 214.971 52.3348C215.832 39.5801 206.064 28.5656 193.133 27.7167C189.346 27.462 185.732 28.1411 182.461 29.4994C176.136 18.018 164.195 9.88971 150.016 8.95592C145.691 8.68003 141.474 9.08325 137.472 10.1019C133.557 4.45674 127.145 0.573006 119.701 0.084887C110.858 -0.488122 102.811 3.84128 98.3572 10.7386C94.549 9.23181 90.4395 8.25557 86.1149 7.97968C70.1073 6.91855 55.6704 15.3227 48.4197 28.3533C47.1503 28.0562 45.8378 27.8228 44.5038 27.7379C31.573 26.889 20.4065 36.524 19.5458 49.2788C19.5243 49.491 19.5458 49.7032 19.5458 49.9367C9.06778 51.6769 0.784299 60.2933 0.0527708 71.1805C-0.80785 83.9352 8.9602 94.9498 21.891 95.7987C24.645 95.9897 27.2914 95.6713 29.7872 94.971C32.7133 103.63 40.6741 110.124 50.4852 110.761C57.4347 111.227 63.8463 108.638 68.4506 104.182C75.142 111.418 84.5873 116.236 95.2805 116.936C105.565 117.615 115.204 114.39 122.691 108.553C126.263 111.312 130.695 113.074 135.558 113.392C143.346 113.902 150.468 110.591 155.115 105.115C158.945 106.749 163.14 107.768 167.551 108.065C178.933 108.808 189.475 104.5 196.92 97.0932C198.835 97.7511 200.857 98.1756 202.966 98.3242C215.897 99.173 227.063 89.538 227.924 76.7832C228.569 67.0633 223.061 58.3833 214.735 54.3934Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <a href="{{ route('catalog.show', $category->slug) }}" class="category-item__link"></a>
                        @if(count($category->padcategories) != 0)
                        <div class="category-item__dropdown">
                            <ul>
                                @foreach ($category->padcategories as $padcategory)
                                    <li>
                                        <a href="{{route('padcategory.show', $padcategory->slug)}}">{{$padcategory['name_'.$lang]}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
            @endforeach
        </div>
        <div class="category-balloons balloons">
            <img src="issets/img/balloon.svg" alt="balloon">
            <img src="issets/img/balloon.svg" alt="balloon">
        </div>
    </section>



    <!-- PRODUCTS -->

    <section class="products">
        <div class="container">
            <h2 class="products__title section-title">
                {{ __('asd.Популярное сегодня') }}
            </h2>
            <div class="products-wrap">
                @foreach ($products as $product)
                    <div class="products-item wow fadeInUp" data-wow-delay=".3s">
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
                                <img src="../../../issets/img/icons/star-grey.svg" alt="ico">
                                <img src="../../../issets/img/icons/star-grey.svg" alt="ico">
                                <img src="../../../issets/img/icons/star-grey.svg" alt="ico">
                                <img src="../../../issets/img/icons/star-grey.svg" alt="ico">
                            @endif
                            @if ($product->star == 2)
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                            @endif
                            @if ($product->star == 3)
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
                            @endif
                            @if ($product->star == 4)
                                <img src="../../../issets/img/icons/star.svg" alt="ico">
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
                        <a href="{{ route('product.show', $product->slug) }}" class="products-item__link"></a>
                    </div>
                @endforeach
            </div>
            <div class="products-all">
                <a href="/catalog" class="btn">
                    {{ __('asd.Весь каталог') }}
                </a>
            </div>
            <div class="products-balloon balloons">
                <img src="issets/img/balloon.svg" alt="balloon">
                <img src="issets/img/balloon.svg" alt="balloon">
            </div>
            <div class="products-zoom">
                <div class="products-zoom__img">
                    <img src="" alt="product">
                </div>
            </div>
        </div>
    </section>


    <!-- SHOP -->

    <section class="shop">
        <div class="container">
            <h2 class="shop__title section-title">
                {{ __('asd.Магазин по категориям') }}
            </h2>
            <div class="shop-content">
                <div class="shop-carousel owl-carousel">
                    @foreach ($categories as $category)
                        @if ($category->ok != 0)
                            <a href="{{ route('catalog.show', $category->slug) }}" class="shop-carousel__item shop-carousel__item-blue">
                                <div class="shop-carousel__name">
                                    {{ $category['name_' . $lang] }}
                                </div>
                                <div class="shop-carousel__img">
                                    <img src="{{ $category->photo }}" alt="shop">
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="shop-arrows arrows">
                    <span class="arrow-left">
                        <img src="/issets/img/icons/chevron-left.svg" alt="ico">
                    </span>
                    <span class="arrow-right">
                        <img src="/issets/img/icons/chevron-right.svg" alt="ico">
                    </span>
                </div>
            </div>
            <div class="shop-balloon balloons">
                <img src="/issets/img/balloon.svg" alt="balloon">
            </div>
        </div>
    </section>

    <!-- WAR -->

    <section class="war">
        <div class="container">
            <div class="war-content">
                <h2 class="war__title section-title">
                    {{ $second_slider['name_' . $lang] }}
                </h2>
                <a href="/catalog" class="war__btn btn btn-white">
                    {{ __('asd.Посмотреть в каталоге') }}
                </a>
            </div>
            <div class="war__img wow fadeIn" data-wow-delay=".4s">
                <img src="{{ $second_slider->photo }}" alt="toy">
            </div>

            <div class="war-helicopters">
                <img src="{{ $second_slider->photo2 }}" alt="helicopter" id="helicopter1">
                <img src="{{ $second_slider->photo3 }}" alt="helicopter" id="helicopter2">
            </div>
        </div>
    </section>

    <!-- GIFT -->

    <section class="gift">
        <div class="gift-wrap">
            <h2 class="gift__title section-title">
                {{ __('asd.Подарите своему ребенку развитие и удовольствие') }}
            </h2>
            <form action="#" class="gift-form">
                <div class="gift-form__wrap">
                    <input type="text" placeholder="Ваше имя" id="first_name1" class="form_name wow fadeInUp"
                        data-wow-delay=".4s">
                    <input type="tel" placeholder="Телефон" id="phone1" class="form_tel wow fadeInUp"
                        data-wow-delay=".6s">
                    <input id="token" value="{{ csrf_token() }}" type="hidden" required>
                    <button class="btn wow fadeInUp" id="button" onclick="send2()" type="button"
                        data-wow-delay=".8s">
                        {{ __('asd.Отправить') }}
                    </button>
                </div>
                <label for="check" class="gift-form__check">
                    <input type="checkbox" id="check">
                    <span>{{ __('asd.Я согласен на обработку персональных данных') }}</span>
                </label>
            </form>
        </div>
    </section>

    <!-- INSTAGRAM -->

    <section class="instagram">
        <div class="container">
            <h2 class="instagram__title section-title">
                {{ __('asd.Подписывайтесь на наш инстаграм') }}
            </h2>
            <div class="instagram-wrap">
                @foreach ($instagram_sliders as $instagram_slider)
                    <a href="{{ $instagram_slider->link }}}" class="instagram-item wow fadeInUp" target="_blank"
                        rel="nofollow" data-wow-delay=".3s">
                        <img src="{{ $instagram_slider->photo }}" alt="instagram">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FOOTER -->

    <div class="footer-pattern"></div>
    @include('components.front.footer')
    <script>
        function send2() {
            let token = $("#token").val();
            let name = $('#first_name1').val();
            let phone = $('#phone1').val();
            console.log(name)
            $.ajax({
                token: token,
                type: "get",
                url: "/feedback",
                data: {
                    name: name,
                    phone: phone,
                },
                contentType: "application/json; charset=utf-8",
                dataType: "json",
            });
            // setTimeout(() => {
            // 	$('.feedback-wrap').hide()
            // 	$('.feedback-done').show()
            // 	$("#first_name").val('');
            // 	$("#phone").val('');
            // }, 1000)
            // setTimeout(() => {
            // 	$('.feedback-wrap').show()
            // 	$('.feedback-done').hide()
            // 	$('.feedback').hide()
            // }, 3000)
        }
    </script>
    <script src="issets/js/jquery-3.4.1.min.js"></script>
    <script src="issets/js/jquery.inputmask.min.js"></script>
    <script src="issets/js/owl.carousel.js"></script>
    <script src="issets/js/wow.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="issets/js/main.js"></script>
</body>

</html>
