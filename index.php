<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rocket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
</head>
<body>

    <?php include_once('content.php') ?>

    <header id="head">
        <div class = " navbar navbar-expand-lg ">
            <div class = "container d-flex justify-content-between navbar-light  ">
                <!-- logo -->
                <div class="logo pr-4">
                    <img  src="img/logo.png" alt="logo">
                </div>
                <!-- Toggler/collapsibe Button -->
                <button
                    id="btnMenu"
                    class="navbar-toggler custom-toggler" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#collapsibleNavbar"       
                    onclick="hiddenHamburger()"
                >
                    <span class="navbar-toggler-icon"></span>
                    <i class="fas fa-times delete hidden mb-2"></i>
                </button>
                <!-- Navbar links -->
                <div 
                    class="collapse navbar-collapse " 
                    id="collapsibleNavbar"
                >
                    <ul 
                        class="navbar-nav w-75 justify-content-start bg-white"
                        open="true" 
                    >
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Услуги</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link " href="#">Портфолио</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Отзывы</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Вакансии</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Контакты</a>
                        </li>
                    </ul>
                </div>
                <!-- nav-info -->
                <div id="infoNav" >
                    <p id="infoNum" class="p-0 m-0 font-weight-bold ">8-900-300-34-34</p>
                    <p id="infoCity" class="pt-1 m-0 "> Rostov-on-Don </p>
                </div>
            </div>
        </div>
    </header>
    
    <section id="sectionBan">
        <div class="banner mw-100 h-100">
            <div class="bannerFilter mw-100 h-100 ">
                <div class=" container ">    
                    <div class="row d-flex flex-column ">
                        <h1 class="bannerHeader text-white">
                            Рекламно-информационное агентство
                        </h1>
                        <p class="bannerDescriptions text-white">
                            Будем рады, если Вы обратитесь в наше Агентство. Мы готовы предложить Вам передовые решения для продвижения Вашего бизнеса. 
                        </p>
                        <div class="input-group p-0 col-10 ">
                            <input type="text" class="form-control col-5 bannerInp " placeholder="Номер телефона" >
                            <input type="submit" class="btn btn-danger offset-1 col-5 bannerBtn" value="Обратный звонок">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="carouselNews" class="d-flex flex-column align-items-center mb-4" >
        <h3 class="headerNews font-weight-bold">Новости</h3>
        <div class="container ">
            <div class="mw-100" >
                <div id="carousel" class="carousel slide mw-100" data-ride="carousel">
                    <div class="colorDivLeft bg-danger m-0"></div>
                    <div class="colorDivRight bg-secondary m-0"></div>    
                    <ol class="carousel-indicators ">
                        <?php 
                            $news = News::getNews();
                            $qnt = ceil(count($news)/3);
                            
                            echo '<li data-target="#carousel" data-slide-to="0" class="active" >,
                                    <div class="rounded-circle bg-danger mx-2"></div>,
                                  </li>';

                            for( $i=1; $i<$qnt; $i++){
                                echo '<li data-target="#carousel" data-slide-to="'.$i.'" class="" >,
                                        <div class="rounded-circle bg-danger mx-2"></div>,
                                      </li>';
                            }
                            
                        ?>
                    </ol>    
                    
                    <div class="carousel-inner ml-3 " role="listbox">
                            <?php 
                                $news = News::getNews();
                                $qnt = ceil(count($news)/3);
                                
                                News::showNews($news, $qnt);
                            ?>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <footer id="footer">
        <div class="container d-flex h-100 align-items-center justify-content-center">
            <img  src="img/logo.png" alt="logo footer">
            <div class="w-50">
                <ul class="d-flex w-100  justify-content-around ">
                    <li ><a href="#" class="text-white">Услуги</a></li>
                    <li><a href="#" class="text-white">Портфолио</a></li>
                    <li><a href="#" class="text-white">Отывы</a></li>
                    <li><a href="#" class="text-white">Вакансии</a></li>
                    <li><a href="#" class="text-white">Контакты</a></li>
                </ul>
            </div>
        </div>
    </footer>

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/helpers.js"> </script>
</body>
</html>