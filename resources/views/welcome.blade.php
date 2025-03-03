@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('mainContent')
<div class="home relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="navbar-distance new-product">
        <div class="new-product-image-div">
            <img class="image-to-overlap home-rocket" src="{{ asset('admin/assets/images/HomeRocket.svg') }}" alt="">
            @isset($newProduct)
                <img class="new-product-image" src="{{ asset('images/main-images/' . $newProduct->main_image) }}" alt="">
                <div class="new-product-text-div">
                    <p class="new-product-title">NOVEDAD</p>
                    <p class="new-product-name">{{ $newProduct->name }}</p>
                    <a href="{{ url('productos/detalle/' . $newProduct->category_id . '/' . $newProduct->id) }}" class="button new-product-button">Ver Producto</a>
                </div>
            @endisset
        </div>
        <div class="images-overlap boat-and-line">
            <img class="image-to-overlap home-boat" src="{{ asset('admin/assets/images/HomeBoat.svg') }}" alt="">
            <img class="image-width home-wave" src="{{ asset('admin/assets/images/HomeBoatBottomLine.svg') }}" alt="">
            <img class="image-to-overlap home-sun" src="{{ asset('admin/assets/images/HomeSun.svg') }}" alt="">
        </div>
    </div>

    <div class="container categories-container">
        <div class="categories-title-div">
            <p class="title main-text">Categorías</p>
            <a href="{{ url('/productos') }}" class="anchor" id="categoriesAnchorDesktop" style="display: none;">Ver todos los productos</a>
        </div>
        <div class="categories-div">
            <div class="images-overlap categories-plaza-div">
                <img class="plaza-image" src="{{ asset('admin/assets/images/HomeCategoriesPlaza.png') }}" alt="">
                <p class="categories-name main-text image-to-overlap">Plaza</p>
                <a href="{{ url('/productos?categorySelector=' . App\Models\Admin\Category::COMBO) }}">
                    <button id="plazaCategory" class="image-to-overlap categories-button button-2 w-100">Ver Categoría</button>
                </a>
            </div>
            <div class="images-overlap categories-singles-div">
                <img class="singles-image" src="{{ asset('admin/assets/images/HomeCategoriesSingles.svg') }}" alt="">
                <p class="categories-name main-text image-to-overlap">Individuales</p>
                <a href="{{ url('/productos?categorySelector=' . App\Models\Admin\Category::INDIVIDUAL) }}">
                    <button id="singlesCategory" class="image-to-overlap categories-button button-2 w-100">Ver Categoría</button>
                </a>
            </div>
        </div>
        <a href="{{ url('/productos') }}" class="anchor" id="categoriesAnchorMobile">Ver todos los productos</a>
    </div>

    <div class="container noted-products-container">
        <div class="title-div">
            <img class="shine" src="{{ asset('admin/assets/images/HomeShineLeft.svg') }}" alt="">
            <p class="title main-text">Productos Destacados</p>
            <img class="shine" src="{{ asset('admin/assets/images/HomeShineRight.svg') }}" alt="">
        </div>
        <div class="noted-products-div">
            @foreach ($notedProducts as $noted)
                <a href="{{ url('/productos/detalle/' . $noted->category_id . '/' . $noted->id) }}" class="noted-products" style="margin-bottom: 15px">
                    <div class="images-overlap product">
                        @if ($noted->color_id == 1 || $noted->color_id == 3)
                            <p class="image-to-overlap noted with-color">Pintada</p>
                        @else
                            <p class="image-to-overlap noted without-color">Sin Pintar</p>
                        @endif
                        @if ($noted->main_image)
                            <img class="image-to-overlap noted-image" src="{{ asset('images/main-images/' . $noted->main_image) }}" alt="">
                        @else
                            <img class="image-to-overlap noted-image-not-found" src="{{ asset('admin/assets/images/ImageNotFound.svg') }}" alt="">
                        @endif
                        <div class="image-to-overlap cart-bag-div">
                            <img class="cart-bag" src="{{ asset('admin/assets/images/HomeCartBag.svg') }}" alt="">
                        </div>
                    </div>
                    <p class="product-name">{{ $noted->name }}</p>
                    <p class="product-price">AR$ {{ number_format($noted->price, 2, ',', '.') }}</p>
                </a>
            @endforeach
        </div>
        <a href="{{ url('/productos') }}" class="anchor">Ver todos los productos</a>
    </div>

    <div class="container know-what-section">
        <img class="img-width" src="{{ asset('admin/assets/images/HomeKnowWhatWave.svg') }}" alt="">
        <div class="container know-what-div">
            <img class="know-what-img" src="{{ asset('admin/assets/images/HomeKnowWhatImage.svg') }}" alt="">
            <div class="know-what-text-div">
                <p class="know-what-title">¿SABÍAS QUE?</p>
                <p class="text know-what-text">Los combos incluidos en las Plazas son modificables, para que puedas armar el combo a tu gusto.</p>
            </div>
        </div>
    </div>


    <div class="container about-us-section" id="aboutUs">
        <img class="about-us-img" src="{{ asset('admin/assets/images/HomeAboutImage.png') }}" alt="">
        <div class="about-us-text-div">
            <p class="title main-text about-us-title">Sobre Jugando Toy</p>
            <p class="about-us-text">Somos una familia que desde la formación profesional del diseño y la docencia, crea y fabrica para los más pequeños, elementos inspirados en las pedagogías Pikler / Montessori con el fin de brindarles herramientas para aprender y divertirse.</p>
            <p class="about-us-text">Con un diseño funcional y con amor por el detalle, nuestros productos potencian la imaginación, el aprendizaje y todos los sentidos del niño a través del juego libre,  donde los niños aprenden a explorar de forma autónoma el entorno al tiempo que desarrollan sus capacidades sensoriales y sus habilidades corporales.</p>
            <p class="about-us-text">Nuestro compromiso es ofrecer productos de calidad que potencien la ergonomía, la estética y la perdurabilidad en el tiempo. Los acabados redondeados, los elementos metálicos ocultos, la ausencia de astillas y la utilización de materiales cuidadosamente seleccionados,  contribuyen a lograrlo.</p>
        </div>
    </div>

    <div class="container blue-bg images-overlap w-100" style="padding-left: 0; padding-right: 0;">
        <div class="cloud-container">
            <img class="cloud cloud-top" src="{{ asset('admin/assets/images/home-cloud-bottom.png') }}" alt="">
        </div>
        <img class="image-to-overlap opinions-fish" src="{{ asset('admin/assets/images/HomeOpinionsFish.svg') }}" alt="">
        <img class="image-to-overlap opinions-fish-bubbles" src="{{ asset('admin/assets/images/HomeOpinionsFishBubbles.svg') }}" alt="">
        <p class="opinions-title">Qué opinan nuestros compradores</p>
        <div class="opinions-container">
            <img class="opinions-images" id="homeOpinion1" src="{{ asset('admin/assets/images/HomeOpinionsChat1.svg') }}" alt="">
            <img class="opinions-images middle" id="homeOpinion2" src="{{ asset('admin/assets/images/HomeOpinionsChat2.svg') }}" alt="">
            <img class="opinions-images" id="homeOpinion3" src="{{ asset('admin/assets/images/HomeOpinionsChat3.svg') }}" alt="">
        </div>
        <a class="reviews-link" href="https://search.google.com/local/reviews?placeid=ChIJ5dFdDXu4vJUR1qkMLngRwIM" target="_blank">Ver todas las reseñas</a>
        <div class="cloud-container">
            <img class="cloud cloud-bottom" src="{{ asset('admin/assets/images/home-cloud-bottom.png') }}" alt="">
        </div>
    </div>

    <div class="flyer-container">
        <div class="flyer">
            <img src="{{ asset('admin/assets/images/HomeSlider.svg') }}" alt="">
            <img src="{{ asset('admin/assets/images/HomeSlider.svg') }}" alt="">
        </div>
    </div>

    <div class="flyer-container">
        <div class="flyer">

            @php
                $photosLinks = [
                    '',
                    'https://www.instagram.com/decorelieve/p/C8VZpqHvCtP/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C9i8OtHtNiC/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C8xodhZvE5e/?hl=es&img_index=1',
                    'https://www.instagram.com/decorelieve/p/C8sdd38vWyQ/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C7SXzfVP1AD/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C33f6WwvR9A/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C7ASyhkv9bC/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C9_NTYfNdAx/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C-GzLvKMDGf/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C9f5vEJPK_k/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C6e2Tq4v-R3/?hl=es',
                    'https://www.instagram.com/decorelieve/p/C9Qse73Mp5l/?hl=es ',
                ];
            @endphp

            @for ($i = 1; $i < 13; $i++)
                <a href="{{ $photosLinks[$i] }}" target="_blank"><img style="width: 300px; height: 300px;" src="{{ asset('admin/assets/ig-images/' . $i . '.jpg') }}" alt=""></a>
            @endfor
            @for ($i = 1; $i < 13; $i++)
                <a href="{{ $photosLinks[$i] }}" target="_blank"><img style="width: 300px; height: 300px;" src="{{ asset('admin/assets/ig-images/' . $i . '.jpg') }}" alt=""></a>
            @endfor
        </div>
    </div>
</div>

<script type="module">

    import { showSuccess, showErrors } from "{{ asset(mix('js/module/sweetAlert.js')) }}";
    import { mainHome } from "{{ asset(mix('js/home.js')) }}";
    import { mainNavbar } from "{{ asset(mix('js/admin/navBar.js')) }}";
    import { mainFooter } from "{{ asset(mix('js/admin/footer.js')) }}";

    let url = {!! json_encode(url('/productos')) !!};
    let baseUrl = {!! json_encode(url('/')) !!};

    window.onload = function() {
        mainHome();
        mainNavbar({
            url: url
        })
        mainFooter({
            url: baseUrl
        })
    }
</script>
@endsection
