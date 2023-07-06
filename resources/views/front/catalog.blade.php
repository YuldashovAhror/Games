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
	<title>{{$tag->catalog_name}}</title>

	<meta name="description" content="{!!$tag->catalog_discription!!}">
	
	<!-- Facebook -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="{{$tag->catalog_name}}">
    <meta property="og:description" content="{!!$tag->catalog_discription!!}">
    <meta property="og:url" content="">
    <meta property="og:image" content="{{$tag->catalog_photo}}">
    <meta property="og:type" content="website">

    <!-- Google Plus -->
    <meta itemprop="name" content="{{$tag->catalog_name}}">
    <meta itemprop="description" content="{!!$tag->catalog_discription!!}">
    <meta itemprop="image" content="{{$tag->catalog_photo}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$tag->catalog_name}}">
    <meta name="twitter:description" content="{!!$tag->catalog_discription!!}">
    <meta name="twitter:image" content="{{$tag->catalog_photo}}">
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
				{{__('asd.Каталог')}}
			</h1>
		</div>
	</section>

	<!-- CATEGORY -->
	<section class="category">
		<div class="container">
			@foreach ($categories as $key=>$category)
				<a href="{{route('catalog.show', $category)}}" class="category-item" >
					<div class="category-item__ico">
						<img src="{{$category->icon}}" alt="ico">
					</div>
					<div class="category-item__name">
						<p>{{$category['name_'.$lang]}}</p>
						<svg width="228" height="118" viewBox="0 0 228 118" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M214.735 54.3934C214.842 53.7143 214.928 53.0352 214.971 52.3348C215.832 39.5801 206.064 28.5656 193.133 27.7167C189.346 27.462 185.732 28.1411 182.461 29.4994C176.136 18.018 164.195 9.88971 150.016 8.95592C145.691 8.68003 141.474 9.08325 137.472 10.1019C133.557 4.45674 127.145 0.573006 119.701 0.084887C110.858 -0.488122 102.811 3.84128 98.3572 10.7386C94.549 9.23181 90.4395 8.25557 86.1149 7.97968C70.1073 6.91855 55.6704 15.3227 48.4197 28.3533C47.1503 28.0562 45.8378 27.8228 44.5038 27.7379C31.573 26.889 20.4065 36.524 19.5458 49.2788C19.5243 49.491 19.5458 49.7032 19.5458 49.9367C9.06778 51.6769 0.784299 60.2933 0.0527708 71.1805C-0.80785 83.9352 8.9602 94.9498 21.891 95.7987C24.645 95.9897 27.2914 95.6713 29.7872 94.971C32.7133 103.63 40.6741 110.124 50.4852 110.761C57.4347 111.227 63.8463 108.638 68.4506 104.182C75.142 111.418 84.5873 116.236 95.2805 116.936C105.565 117.615 115.204 114.39 122.691 108.553C126.263 111.312 130.695 113.074 135.558 113.392C143.346 113.902 150.468 110.591 155.115 105.115C158.945 106.749 163.14 107.768 167.551 108.065C178.933 108.808 189.475 104.5 196.92 97.0932C198.835 97.7511 200.857 98.1756 202.966 98.3242C215.897 99.173 227.063 89.538 227.924 76.7832C228.569 67.0633 223.061 58.3833 214.735 54.3934Z" fill="currentColor"/>
						</svg>
					</div>
				</a>
			@endforeach
		</div>
		<div class="category-balloons balloons">
			<img src="../../../issets/img/balloon.svg" alt="balloon">
			<img src="../../../issets/img/balloon.svg" alt="balloon">
		</div>
	</section>

	<!-- PRODUCTS -->
	
	<section class="products products-page">
		<div class="container">
			<div class="products-wrap">
					@foreach ($products as $product)
						<div class="products-item">
							<div class="products-item__wrap">
									<div class="products-item__img">
										<img src="{{$product->photos[0]}}" alt="product">
									</div>
									<div class="products-item__buttons">
										<button class="products-item__zoom">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M15.5819 12.0019C15.5819 13.9819 13.9819 15.5819 12.0019 15.5819C10.0219 15.5819 8.42188 13.9819 8.42188 12.0019C8.42188 10.0219 10.0219 8.42188 12.0019 8.42188C13.9819 8.42188 15.5819 10.0219 15.5819 12.0019Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M12.0037 20.2688C15.5337 20.2688 18.8238 18.1887 21.1138 14.5887C22.0138 13.1787 22.0138 10.8087 21.1138 9.39875C18.8238 5.79875 15.5337 3.71875 12.0037 3.71875C8.47375 3.71875 5.18375 5.79875 2.89375 9.39875C1.99375 10.8087 1.99375 13.1787 2.89375 14.5887C5.18375 18.1887 8.47375 20.2688 12.0037 20.2688Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</button>
										<button class="products-item__basket">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M8.39612 6.5H15.5961C18.9961 6.5 19.3361 8.09 19.5661 10.03L20.4661 17.53C20.7561 19.99 19.9961 22 16.4961 22H7.50612C3.99612 22 3.23612 19.99 3.53612 17.53L4.43612 10.03C4.65612 8.09 4.99612 6.5 8.39612 6.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8M20.41 17.03H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</button>
										<button class="products-item__like">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12.62 20.8116C12.28 20.9316 11.72 20.9316 11.38 20.8116C8.48 19.8216 2 15.6916 2 8.69156C2 5.60156 4.49 3.10156 7.56 3.10156C9.38 3.10156 10.99 3.98156 12 5.34156C12.5138 4.64744 13.183 4.08329 13.954 3.69431C14.725 3.30532 15.5764 3.10232 16.44 3.10156C19.51 3.10156 22 5.60156 22 8.69156C22 15.6916 15.52 19.8216 12.62 20.8116Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</button>
									</div>
							</div>
							<div class="products-item__name">
								{{$product['name_'.$lang]}}
							</div>
							<div class="products-item__mark">
								{{$product->star}}
								{{-- <img src="issets/img/icons/star.svg" alt="ico">
								<img src="issets/img/icons/star.svg" alt="ico">
								<img src="issets/img/icons/star.svg" alt="ico">
								<img src="issets/img/icons/star.svg" alt="ico">
								<img src="issets/img/icons/star.svg" alt="ico"> --}}
							</div>
							<a href="{{route('product.show', $product)}}" class="products-item__link"></a>
						</div>
					@endforeach
			</div>
			<div class="products-zoom">
				<div class="products-zoom__img">
					<img src="" alt="product">
				</div>
			</div>
		</div>
	</section>


	<!-- FOOTER -->

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