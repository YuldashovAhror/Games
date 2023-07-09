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

    <meta name="description" content="{{ $tag->discription }}">

    <!-- Facebook -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="{{ $tag->name }}">
    <meta property="og:description" content="{{ $tag->discription }}">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{ $tag->photo }}">
    <meta property="og:type" content="website">

    <!-- Google Plus -->
    <meta itemprop="name" content="{{ $tag->name }}">
    <meta itemprop="description" content="{{ $tag->discription }}">
    <meta itemprop="image" content="{{ $tag->photo }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $tag->name }}">
    <meta name="twitter:description" content="{{ $tag->discription }}">
    <meta name="twitter:image" content="{{ $tag->photo }}">
</head>

<body>



    <!-- FEEDBACK -->

    @include('components.front.feedback')

    <!-- MOBILE-MENU -->

    @include('components.front.mobile')


    <!-- HEADER -->

    @include('components.front.header')
    <!-- OFFER -->

    <section class="offer clouds">
        <div class="container">
            <h1 class="offer__title">
                {{ __('asd.О компании') }}
            </h1>
        </div>
    </section>


    <!-- ABOUT -->


    <section class="about">
        <div class="about-balloons balloons">
            <img src="issets/img/balloon.svg" alt="balloon">
            <img src="issets/img/balloon.svg" alt="balloon">
        </div>
        <div class="container">
            <div class="about__text">
                {{ __('asd.На сегодняшний день, СП ООО «KIDDY TOYS GROUP» является одним из лидирующих производителей детских игрушек в Республике Узбекистан. С 2008 года наша компания успешно поставляет производимую продукцию на рынки Узбекистана, Казахстана, Таджикистана, Кыргызстана и других странах СНГ. Наша компания использует самые высококачественные сырьё как JV Uz-Kor Gas Chemical LLC, Shurtan Gas Chemical Complex. Производственные мощности СП ООО «KIDDY TOYS GROUP», оснащенные современным оборудованием ведущих мировых компаний - HAITIAN, SANSHUN, BORCHE, GRANTWAY и др. и имеем возможность предоставить своим партнерам широкий спектр высококачественной продукции, среди которой, наиболее распространенными являются игрушки следующих типов:') }}
                {{-- На сегодняшний день, <strong>СП ООО «KIDDY TOYS GROUP»</strong> является одним из лидирующих производителей детских игрушек в Республике Узбекистан. С 2008 года наша компания успешно поставляет производимую продукцию на рынки <strong>Узбекистана, Казахстана, Таджикистана, Кыргызстана</strong> и других странах <strong>СНГ</strong>. Наша компания использует самые высококачественные сырьё как JV Uz-Kor Gas Chemical LLC, Shurtan Gas Chemical Complex.  Производственные мощности СП ООО «KIDDY TOYS GROUP», оснащенные современным оборудованием ведущих мировых компаний - <strong>HAITIAN, SANSHUN, BORCHE, GRANTWAY</strong> и др. и имеем возможность предоставить своим партнерам широкий спектр высококачественной продукции, среди которой, наиболее распространенными являются игрушки следующих типов: --}}
            </div>
            <div class="about__img">
                <img src="issets/img/about.jpg" alt="about">
            </div>
        </div>


        <!-- CATEGORY -->

        <section class="category">
            <div class="container">
                @foreach ($categories as $category)
                    <div class="category-item">
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
                        <a href="{{ route('catalog.show', $category) }}" class="category-item__link"></a>
                        <div class="category-item__dropdown">
                            <ul>
                                @foreach ($category->padcategories as $padcategory)
                                    <li>
                                        <a href="{{ route('padcategory.show', $padcategory->id) }}">{{ $padcategory['name_' . $lang] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="category-balloons balloons">
                <img src="issets/img/balloon.svg" alt="balloon">
                <img src="issets/img/balloon.svg" alt="balloon">
            </div>
        </section>
    </section>


    <!-- FOOTER -->

    <div class="footer-pattern"></div>
    @include('components.front.footer')
    <script src="issets/js/jquery-3.4.1.min.js"></script>
    <script src="issets/js/jquery.inputmask.min.js"></script>
    <script src="issets/js/owl.carousel.js"></script>
    <script src="issets/js/wow.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="issets/js/main.js"></script>
</body>

</html>
