<?php
//Если форма отправлена
if(isset($_POST['submit'])) {

	//Проверка Поля ИМЯ
	if(trim($_POST['name']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	//Проверка поля ТЕМА
	if(trim($_POST['tel']) == '') {
		$hasError = true;
	} else {
		$tel = trim($_POST['tel']);
	}

	//Проверка наличия ТЕКСТА сообщения
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//Если ошибок нет, отправить email
	if(!isset($hasError)) {
		$emailTo = 'hello@easyagency.ru'; //Сюда введите Ваш email
		$body = "Name: $name \n\nEmail: $email \n\nTel: $tel \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $tel, $body, $headers);
		$emailSent = true;
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Оставить заявку</title>
  <!-- Styles -->
  <link href="../css/style.css" rel="stylesheet">
  <!-- Favicons -->
  <link rel="icon" href="../img/favicon.webp">
</head>
<body>


  <?php if(isset($hasError)) { //Если найдены ошибки ?>
    <div class="modal-over">
      <div class="modal-plus">
        <div class="container">
          <p class="modal-plus__text">пожалуйста, проверьте<br> правильность заполнения всех полей</p>
        </div>
      </div>
    </div>
	<?php } ?>

  <?php if(isset($emailSent) && $emailSent == true) { //Если письмо отправлено ?>
    <div class="modal-over">
      <div class="modal-plus">
        <div class="container">
          <p class="modal-plus__text">спасибо!<br> мы с вами свяжемся</p>
        </div>
      </div>
    </div>
	<?php } ?>
 
  <header>
    <nav id="nav" class="nav">
      <div class="container">
        <div class="nav__content">
          <div class="nav__content__img">
            <a href="/"><img src="../img/header/logo.svg" alt=""></a>
          </div>
          <a href="/" class="nav__content__menu__link">
            <div class="link">
              <div data-hover="Вернуться назад">Вернуться назад</div>
            </div>
          </a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="modal" class="modal">
      <div class="container">
      <div class="modal__content">
        <div class="modal__content__header">
          <div class="modal__content__header__title">расскажите нам о задаче</div>
          <!-- <div class="modal__content__header__cross"></div> -->
          
        </div>
       
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform" class="modal__content__form">

          <div class="modal__content__form__inputs">
            <input type="text" name="name" placeholder="Ваше имя *">
            <input type="tel" name="tel" placeholder="Ваш телефон *">
            <input type="email" name="email" placeholder="Ваш e-mail *">
            <input type="text" name="message" placeholder="Коротко о проекте или ссылка на описание">
          </div>


          <!-- <div class="modal__content__form__radio">
            <div class="modal__content__form__radio__title">Бюджет</div>
            <div class="radio">
              <input type="radio" name="sum" id="1">
              <label for="1">Менее 100 т.р.</label>
            </div>
            <div class="radio">
              <input type="radio" name="sum" id="2">
              <label for="2">От 100 до 500 т.р.</label>
            </div>
            <div class="radio">
              <input type="radio" name="sum" id="3">
              <label for="3">От 500 т.р.</label>
            </div>
          </div> -->

          <div class="modal__content__form__button">
            <div class="button hover">
                <input data-hover="Отправить" type="submit" name="submit" value="Отправить">
            </div>
            <div class="modal__content__form__button__check">
              <input type="checkbox" name="agree" id="agree">
              <label for="agree"><a href="/agreement.pdf" target="_blank">Я согласен на <br> <span> обработку моих персональных данных</span></a></label>
            </div>
          </div>

      </form>



      </div>
      </div>
    </div>
  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="footer__content">
          <div class="footer__content__cr">ИЗИ®, 5 - 20©</div>
          <div class="footer__content__tagline">Легко понять, невозможно игнорировать. ™</div>
          <a href="/policy.pdf" class="footer__content__terms" target="_blank">
            <div class="link">
              <div data-hover="TERMS, PRIVACY POLICY">TERMS, PRIVACY POLICY</div>
            </div>
          </a>
      </div>
    </div>
  </footer>

<script src="/js/jquery.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>