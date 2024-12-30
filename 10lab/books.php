<?php require_once __DIR__ . "/incs/header.php"; $title = 'Книги'; ?> 

<section class="books__title"> 
    <div class="container"> 
        Книги для продажи 
    </div> 
</section>

<div class="books__books">
    <div class="container">
        <div class="books__cards">

            <div class="books__card">
                <div class="books__card-img">
                    <img src="img/main/451.jpg" alt="">
                </div>
                <div class="books__card-title">
                    451 градус по Фарингейту
                </div>
                <div class="books__card-price">
                    400 рублей
                </div>
                <div class="books__card-button">
                    <a onclick="showErrorMessage()">Смотреть</a>
                </div>
            </div>

            <div class="books__card">
                <div class="books__card-img">
                    <img src="img/main/prince.jpg" alt="">
                </div>
                <div class="books__card-title">
                    Маленький принц
                </div>
                <div class="books__card-price">
                    300 рублей
                </div>
                <div class="books__card-button">
                    <a onclick="showErrorMessage()">Смотреть</a>
                </div>
            </div>
            <div class="books__card">
                <div class="books__card-img">
                    <img src="img/main/idiot.jpg" alt="">
                </div>
                <div class="books__card-title">
                    Идиот
                </div>
                <div class="books__card-price">
                    630 рублей
                </div>
                <div class="books__card-button">
                    <a onclick="showErrorMessage()">Смотреть</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once __DIR__ . "/incs/footer.php"; ?> 

<script> 
    function showErrorMessage() { 
        alert("Только авторизованные пользователи могут получить доступ."); 
    } 
</script> 

</body> 
</html>

