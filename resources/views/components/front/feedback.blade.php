<div class="feedback">
    <div class="feedback-content">
        <div class="feedback__title">
            {{__('asd.Заявка')}}
        </div>
        <div class="feedback-wrap">
            <div class="feedback__text">
                {{__('asd.Оставьте свои контактные данные, и наш менеджер расскажет больше интересных деталей')}}
            </div>
            <div class="feedback-form">
                <input type="text" id="first_name" placeholder="Ваше имя" class="form_name">
                <input type="tel" id="phone" placeholder="Телефон" class="form_tel">
                <input id="token" value="{{ csrf_token() }}" type="hidden" required>
                <button class="btn" id="button" onclick="send1()" type="button">
                    {{__('asd.Отправить')}}
                </button>
            </div>
            <div class="feedback__advice">
                {{__('asd.Даю согласие на обработку моих персональных данных')}}
            </div>
        </div>
        <div class="feedback-done">
            <div class="feedback__img">
                <img src="issets/img/icons/done.svg" alt="ico">
            </div>
            <div class="feedback-done__text">
                {{__('asd.Ваш запрос получен. мы свяжемся с вами в ближайшее время')}}
            </div>
        </div>
    </div>
</div> 

<script>
    function send1() {

        let token = $("#token").val();
        let name = $('#first_name').val();
        let phone = $('#phone').val();
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