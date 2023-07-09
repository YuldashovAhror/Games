<header class="header">
    <div class="header-top">
        <div class="container">
            <a href="/" class="header__logo">
                <img src="../../../issets/img/logo.svg" alt="Amin">
            </a>
        </div>
    </div>
    <div class="header-bot">
        <div class="container">
            <div class="header-mobile">
                <img src="../../../issets/img/icons/menu.svg" alt="ico">
            </div>
            <ul class="header-menu">
                <li class="header-menu__item">
                    <a href="/about" class="header-menu__link">
                        {{__('asd.О компании')}}
                    </a>
                </li>
                <li class="header-menu__item">
                    <a href="/catalog" class="header-menu__link">
                        {{__('asd.Каталог')}}
                    </a>
                </li>
                <li class="header-menu__item header-menu__dropdown">
					<div class="header-menu__name">
						<span>{{__('asd.Клиентам')}}</span> <img src="../../../issets/img/icons/chevron-down.svg" alt="ico">
					</div>
					<div class="header-lang__list">
                        @foreach (App\Models\Client::orderBy('id', 'desc')->get() as $client)
						<a href="{{$client->photo}}" download >{{$client['name_'.$lang]}}</a>
                        @endforeach
					</div>
				</li>
				</li>
                <li class="header-menu__item">
                    <a href="#contact" class="header-menu__link">
                        {{__('asd.Контакты')}}
                    </a>
                </li>
            </ul>
            <div class="header-wrap">
                <div class="header-lang">
                    
                    <div class="header-lang__btn">
                        <img src="../../../issets/img/rus.png" alt="ico">
                        <div>
                            @if($lang == 'uz') O’zbek @elseif($lang == 'ru') Русский @elseif($lang == 'en') English @endif
                        </div>
                        <img src="../../../issets/img/icons/chevron-down.svg" alt="ico">
                    </div>
                    
                    <div class="header-lang__list">
                        @if($lang != 'ru')<a href="/languages/ru" class="current">Русский</a>@endif
                        @if($lang != 'uz')<a href="/languages/uz" class="current">O’zbek</a>@endif
                        @if($lang != 'en')<a href="/languages/en" class="current">English</a>@endif
                    </div>
                </div>
                <ul class="header-social">
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 10.5C20.5 5 16 0.5 10.5 0.5C5 0.5 0.5 5 0.5 10.5C0.5 15.5 4.125 19.625 8.875 20.375V13.375H6.375V10.5H8.875V8.25C8.875 5.75 10.375 4.375 12.625 4.375C13.75 4.375 14.875 4.625 14.875 4.625V7.125H13.625C12.375 7.125 12 7.875 12 8.625V10.5H14.75L14.25 13.375H11.875V20.5C16.875 19.75 20.5 15.5 20.5 10.5Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.8749 7.13537C7.24359 4.79631 10.8236 3.25426 12.6148 2.50922C17.7292 0.381975 18.7919 0.0124503 19.4846 0.000118295C19.6369 -0.00243528 19.9776 0.0353203 20.1982 0.214361C20.3845 0.36554 20.4358 0.569761 20.4603 0.713095C20.4848 0.856429 20.5154 1.18295 20.4911 1.43808C20.214 4.35012 19.0147 11.4169 18.4046 14.6784C18.1465 16.0585 17.6382 16.5212 17.1461 16.5665C16.0766 16.6649 15.2645 15.8597 14.2287 15.1807C12.6078 14.1182 11.6921 13.4568 10.1188 12.42C8.30053 11.2218 9.47923 10.5633 10.5154 9.48699C10.7866 9.20533 15.4987 4.91933 15.5899 4.53052C15.6013 4.48189 15.6119 4.30063 15.5042 4.20492C15.3965 4.10921 15.2376 4.14194 15.1229 4.16797C14.9604 4.20487 12.371 5.91634 7.35486 9.30237C6.61988 9.80707 5.95416 10.053 5.3577 10.0401C4.70015 10.0259 3.43528 9.66829 2.49498 9.36264C1.34166 8.98774 0.425027 8.78953 0.504845 8.15284C0.546419 7.82121 1.0031 7.48205 1.8749 7.13537Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.875 2.125C13.625 2.125 14 2.125 15.125 2.125C16.125 2.125 16.625 2.375 17 2.5C17.5 2.75 17.875 2.875 18.25 3.25C18.625 3.625 18.875 4 19 4.5C19.125 4.875 19.25 5.375 19.375 6.375C19.375 7.5 19.375 7.75 19.375 10.625C19.375 13.5 19.375 13.75 19.375 14.875C19.375 15.875 19.125 16.375 19 16.75C18.75 17.25 18.625 17.625 18.25 18C17.875 18.375 17.5 18.625 17 18.75C16.625 18.875 16.125 19 15.125 19.125C14 19.125 13.75 19.125 10.875 19.125C8 19.125 7.75 19.125 6.625 19.125C5.625 19.125 5.125 18.875 4.75 18.75C4.25 18.5 3.875 18.375 3.5 18C3.125 17.625 2.875 17.25 2.75 16.75C2.625 16.375 2.5 15.875 2.375 14.875C2.375 13.75 2.375 13.5 2.375 10.625C2.375 7.75 2.375 7.5 2.375 6.375C2.375 5.375 2.625 4.875 2.75 4.5C3 4 3.125 3.625 3.5 3.25C3.875 2.875 4.25 2.625 4.75 2.5C5.125 2.375 5.625 2.25 6.625 2.125C7.75 2.125 8.125 2.125 10.875 2.125ZM10.875 0.25C8 0.25 7.75 0.25 6.625 0.25C5.5 0.25 4.75 0.500001 4.125 0.750001C3.5 1 2.875 1.375 2.25 2C1.625 2.625 1.375 3.125 1 3.875C0.750001 4.5 0.625 5.25 0.5 6.375C0.5 7.5 0.5 7.875 0.5 10.625C0.5 13.5 0.5 13.75 0.5 14.875C0.5 16 0.750001 16.75 1 17.375C1.25 18 1.625 18.625 2.25 19.25C2.875 19.875 3.375 20.125 4.125 20.5C4.75 20.75 5.5 20.875 6.625 21C7.75 21 8.125 21 10.875 21C13.625 21 14 21 15.125 21C16.25 21 17 20.75 17.625 20.5C18.25 20.25 18.875 19.875 19.5 19.25C20.125 18.625 20.375 18.125 20.75 17.375C21 16.75 21.125 16 21.25 14.875C21.25 13.75 21.25 13.375 21.25 10.625C21.25 7.875 21.25 7.5 21.25 6.375C21.25 5.25 21 4.5 20.75 3.875C20.5 3.25 20.125 2.625 19.5 2C18.875 1.375 18.375 1.125 17.625 0.750001C17 0.500001 16.25 0.375 15.125 0.25C14 0.25 13.75 0.25 10.875 0.25Z" fill="currentColor"/>
                                <path d="M10.875 5.25C7.875 5.25 5.5 7.625 5.5 10.625C5.5 13.625 7.875 16 10.875 16C13.875 16 16.25 13.625 16.25 10.625C16.25 7.625 13.875 5.25 10.875 5.25ZM10.875 14.125C9 14.125 7.375 12.625 7.375 10.625C7.375 8.75 8.875 7.125 10.875 7.125C12.75 7.125 14.375 8.625 14.375 10.625C14.375 12.5 12.75 14.125 10.875 14.125Z" fill="currentColor"/>
                                <path d="M16.375 6.375C17.0654 6.375 17.625 5.81536 17.625 5.125C17.625 4.43464 17.0654 3.875 16.375 3.875C15.6846 3.875 15.125 4.43464 15.125 5.125C15.125 5.81536 15.6846 6.375 16.375 6.375Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <a href="tel:+9999" class="header-call">
                    <div class="header-call__img">
                        <img src="../../../issets/img/icons/call.svg" alt="ico">
                    </div>
                    <div class="header-call__text">
                        <div>{{__('asd.Позвоните нам')}}</div>
                        <p>
                            {{__('asd.+ 998 90 123 45 67')}}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="header-clouds">
        <div class="container">
            <img src="../../../issets/img/cloud1.png" alt="clouds">
        </div>
    </div>
</header>