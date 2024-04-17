@include('layouts/app')
<!DOCTYPE html>
<html style="font-size: 16px;" lang="ru">

<head>

    <title>Магазин</title>
</head>

<body data-path-to-root="../" data-include-products="true" class="u-body u-xl-mode" data-lang="ru">
    <section class="u-align-center u-clearfix u-container-align-center u-lightbox u-palette-5-light-2 u-section-1"
        id="sec-1c88">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!--category_item-->
                        <div class="u-align-left u-container-align-center u-container-style u-products-item u-repeater-item u-white u-repeater-item-1"
                            data-product-id="4">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1 p-3">
                                <!--category_image-->
                                <a class="u-product-title-link" href="../products/cameras.html"><img alt=""
                                        class="u-expanded-width u-image u-image-contain u-image-default u-product-control img-fluid"
                                        style="height: 200px;"
                                        src="https://img.freepik.com/premium-photo/retro-camera-wooden-background-with-lens-flaregenerative-ai_391052-25242.jpg"></a>
                                <!--/category_image--><!--category_title-->
                                <h4 class="u-align-center u-product-control u-text u-text-default u-text-1"
                                    style="margin-left:auto;margin-right:auto;">
                                    <a class="u-product-title-link" href="{{ url('cameras/shop') }}"> Фотоаппараты </a>
                                </h4>
                                <!--/category_title-->
                                <!--category_description-->
                                <p class="u-align-center u-product-control u-text u-text-default u-text-2">
                                    В нашем интернет-магазине вы можете найти широкий ассортимент фотоаппаратов от
                                    ведущих производителей. Мы предлагаем компактные камеры для повседневной съемки,
                                    профессиональные зеркальные камеры для сложных съемок, а также многое другое.
                                </p>
                                <!--/category_description-->
                                <!--category_button-->
                                <a href="{{ url('cameras/shop') }}"
                                    class="u-align-center u-btn u-btn-rectangle u-button-style u-product-control u-btn-1 u-buy-link  ">
                                    Перейти к товарам
                                </a>
                                <!--/category_button-->
                            </div>
                        </div>
                        <!--/category_item-->
                    </div>
                    <div class="col-md-4">
                        <!--category_item-->
                        <div class="u-align-left u-container-align-center u-container-style u-products-item u-repeater-item u-white u-repeater-item-2"
                            data-product-id="5">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2 p-3">
                                <!--category_image-->
                                <a class="u-product-title-link" href="../products/video_cameras.html"><img
                                        alt=""
                                        class="u-expanded-width u-image u-image-contain u-image-default u-product-control img-fluid"
                                        style="height: 200px;"
                                        src="https://i1.adis.ws/i/canon/xf605_ambient_part3_5_c671c112fc164697bbcab28c4dd9fca9?$media-collection-full-dt-jpg$"></a>
                                <!--/category_image--><!--category_title-->
                                <h4 class="u-align-center u-product-control u-text u-text-default u-text-2"style="margin-left:auto;margin-right:auto;>
                                    <a class="u-product-title-link" href="{{ url('videocameras/shop') }}"> Видеокамеры
                                    </a>
                                </h4>
                                <!--/category_title-->
                                <!--category_description-->
                                <p class="u-align-center u-product-control u-text u-text-default u-text-3">
                                   <br> В нашем интернет-магазине вы можете найти широкий ассортимент видеокамер от ведущих производителей. Мы предлагаем компактные камеры для повседневной съемки, профессиональные камеры для сложных съемок, а также многое другое.
                                 </p>
                                    <!--/category_description-->
                                    <!--category_button-->
                                    <a href="{{ url('videocameras/shop') }}"
                                        class="u-align-center u-btn u-btn-rectangle u-button-style u-product-control u-btn-2 u-buy-link">
                                        Перейти к товарам
                                    </a>
                                    <!--/category_button-->
                            </div>
                        </div>
                        <!--/category_item-->
                    </div>
                    <div class="col-md-4">
                        <!--category_item-->
                        <div class="u-align-left u-container-align-center u-container-style u-products-item u-repeater-item u-white u-repeater-item-3"
                            data-product-id="6">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3 p-3">
                                <!--category_image-->
                                <a class="u-product-title-link" href="../products/accessories.html"><img alt=""
                                        class="u-expanded-width u-image u-image-contain u-image-default u-product-control img-fluid"
                                        style="height: 200px;"
                                        src="https://fotogora.ru/img/blog/or/2018/7/18/12081.jpg"></a>
                                <!--/category_image--><!--category_title-->
                                <h4 class="u-align-center u-product-control u-text u-text-default u-text-3"
                                    style="margin-left:auto;margin-right:auto;>
                                    <a class="u-product-title-link"
                                    href="{{ url('accessories/shop') }}"> Аксессуары </a>
                                </h4>
                                <!--/category_title-->
                                <!--category_description-->
                                <p class="u-align-center u-product-control u-text u-text-default u-text-4">
                                    В нашем интернет-магазине вы можете найти широкий ассортимент аксессуаров для
                                    фотоаппаратов и видеокамер от ведущих производителей. Мы предлагаем широкий выбор
                                    аксессуаров, включая сумки, штативы, зарядные устройства и многое другое.
                                </p>
                                <!--/category_description-->
                                <!--category_button-->
                                <a href="{{ url('accessories/shop') }}"
                                    class="u-align-center u-btn u-btn-rectangle u-button-style u-product-control u-btn-3 u-buy-link">
                                    Перейти к товарам
                                </a>
                                <!--/category_button-->
                            </div>
                        </div>
                        <!--/category_item-->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="u-align-center u-clearfix u-footer u-palette-1-base u-footer" id="sec-6d3f">
        <div class="u-clearfix u-sheet u-valign-middle-xs u-sheet-1">
            <p class="u-small-text u-text u-text-variant u-text-1" style="">Фотоаппараты, Видеокамеры и
                Акссесуары от компании "Новый
                Взгляд" </p>
        </div>
    </footer>

</body>

</html>
<style>
    .u-align-center.u-btn {
        display: block;
        margin: 0 auto;
        margin-top: 20px;
    }
</style>
