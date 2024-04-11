@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comboDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('mainContent')
    <div class="light-bg navbar-distance main-div">
        <p class="product-type-title type-title-mobile"> <a href="{{ url('/productos?categorySelector=' . App\Models\Admin\Category::COMBO) }}" class="product-type-title" style="text-decoration: underline; color: #404040">PLAZAS Y COMBOS</a> > {{$combo->name}}</p>
        <p class="product-name name-mobile">{{$combo->name}}</p>
        <div class="images-color">
            <div>
                <p class="product-type-title type-title-desktop"> <a href="{{ url('/productos?categorySelector=' . App\Models\Admin\Category::COMBO) }}" class="product-type-title" style="text-decoration: underline; color: #404040">PLAZAS Y COMBOS</a> > {{$combo->name}}</p>
                <div class="main-img-images">
                    <div class="main-img-info-div">

                        <div class="main-image-container">
                            @if ($combo->main_image)
                                <img class="main-img" id="mainImage" src="{{ asset('images/main-images/' . $combo->main_image) }}" alt="">
                            @else
                                <img class="main-img not-found" id="mainImage" src="{{ asset('admin/assets/images/ImageNotFound.svg') }}" alt="">
                            @endif
                        </div>
                        <div class="basic-info-desktop">
                            <div class="info-div info-left">
                                <div class="info-img">
                                    <img src="{{ asset('admin/assets/icons/product-detail/Hashtag.svg') }}" alt="">
                                </div>
                                <p class="info-title">{{ $combo->id }}</p>
                                <p class="info-text">Número de combo</p>
                            </div>
                            <div class="info-div info-middle">
                                <div class="info-img">
                                    <img src="{{ asset('admin/assets/icons/product-detail/Eye.svg') }}" alt="">
                                </div>
                                <p class="info-title">Normativas</p>
                                <p class="info-text">Utilizar bajo supervisión de un adulto</p>
                            </div>
                            <div class="info-div info-right">
                                <div class="info-img">
                                    <img src="{{ asset('admin/assets/icons/product-detail/House.svg') }}" alt="">
                                </div>
                                <p class="info-title">Uso</p>
                                <p class="info-text">Diseñado para interiores</p>
                            </div>
                        </div>
                    </div>
                    <div class="images">
                        @if ($images && $combo->main_image)
                            <div class="img-div">
                                <img class="img-icon" id="mainIcon{{$combo->id}}" src="{{ asset('images/main-images/' . $combo->main_image) }}" alt="" onclick="changeMainImage('mainIcon{{$combo->id}}')">
                            </div>
                        @endif
                        @foreach ($images as $image)
                            <div class="img-div">
                                <img class="img-icon" id="icon{{$image->id}}" src="{{ asset('images/products-images/' . $image->image) }}" alt="" onclick="changeMainImage('icon{{$image->id}}')">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="colors-details">
                <p class="product-name name-desktop">{{ $combo->name }}</p>
                <div class="product-colors">

                    @foreach ($colors as $color)
                        @if ($combo->color_id == $color->id)
                            <div class="color-type-div selected">
                                <img @if ($color->id == 2) class="without-color" @else class="with-color" @endif src="{{ asset('admin/assets/images/product-detail/' . $color->detail_logo_img) }}" alt="">
                                <p class="color-type-text">{{ $color->color }}</p>
                            </div>
                        @endif
                    @endforeach

                    {{-- <div class="color-type-div type-div-left @if ($combo->color_id == 2)selected @else not-selected @endif">
                        <img class="without-color" src="{{ asset('admin/assets/images/product-detail/ProductDetailWithoutColor.svg') }}" alt="">
                        <p class="color-type-text">Sin Pintar</p>
                    </div>
                    <div class="color-type-div type-div-right @if ($combo->color_id == 1)selected @else not-selected @endif">
                        <img class="with-color" src="{{ asset('admin/assets/images/product-detail/ProductDetailWithColor.svg') }}" alt="">
                        <p class="color-type-text">Arcoíris</p>
                    </div> --}}
                </div>
                <p class="price">AR$ {{ number_format($combo->price, 2, ',', '.') }}</p>
                <a class="anchor" href="">Ver medios de pago y promociones</a>
                <div class="add-to-cart">
                    <a class="add-to-cart-link" href="{{ url('agregar-carrito/' . $combo->category_id . '/' . $combo->id) }}">
                        <button class="button">Agregar al Carrito</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="basic-info">
            <div class="info-div info-left">
                <div class="info-img">
                    <img src="{{ asset('admin/assets/icons/product-detail/Hashtag.svg') }}" alt="">
                </div>
                <p class="info-title">{{ $combo->id }}</p>
                <p class="info-text">Número de combo</p>
            </div>
            <div class="info-div info-middle">
                <div class="info-img">
                    <img src="{{ asset('admin/assets/icons/product-detail/Eye.svg') }}" alt="">
                </div>
                <p class="info-title">Normativas</p>
                <p class="info-text">Utilizar bajo supervisión de un adulto</p>
            </div>
            <div class="info-div info-right">
                <div class="info-img">
                    <img src="{{ asset('admin/assets/icons/product-detail/House.svg') }}" alt="">
                </div>
                <p class="info-title">Uso</p>
                <p class="info-text">Diseñado para interiores</p>
            </div>
        </div>
    </div>

    <div class="about light-beige-bg">
        <div class="about-title-description">
            <p class="about-title">Sobre el producto</p>
            <p class="about-description description-desktop">{{ $combo->description }}</p>
        </div>
        <div class="about-img-container">
            @if ($combo->main_image)
                <img class="main-img about-img" src="{{ asset('images/main-images/' . $combo->main_image) }}" alt="">
                <img class="main-img not-found" src="{{ asset('admin/assets/images/product-detail/AboutBG.svg') }}" alt="">
            @else
                <img class="main-img about-img not-found" src="{{ asset('admin/assets/images/ImageNotFound.svg') }}" alt="">
            @endif
            <img class="desktop-plane" src="{{ asset('admin/assets/images/product-detail/DetailPlane.svg') }}" alt="">
        </div>
        <p class="about-description description-mobile">{{ $combo->description }}</p>
    </div>

    <div class="specs light-bg main-div">
        <img class="orange-icons left-cloud" src="{{ asset('admin/assets/images/product-detail/DetailOrangeLeftCloud.svg') }}" alt="">
        <img class="orange-icons right-cloud" src="{{ asset('admin/assets/images/product-detail/DetailOrangeRightCloud.svg') }}" alt="">
        <img class="orange-icons plane" src="{{ asset('admin/assets/images/product-detail/DetailOrangeRocket.svg') }}" alt="">
        <div class="specs-title-div">
        <img class="shine" src="{{ asset('admin/assets/images/HomeShineLeft.svg') }}" alt="">
        <p class="specs-title">Productos incluídos</p>
        <img class="shine" src="{{ asset('admin/assets/images/HomeShineRight.svg') }}" alt="">
        </div>

        {{-- SPECS FOR PRODUCT IN COMBO --}}
        <div class="specs-description">
            <div class="specs-container">
                <div class="specs-icon blue-bg">
                    <img src="{{ asset('admin/assets/icons/product-detail/ProductMaterial.svg') }}" alt="">
                </div>
                <p class="specs-text" id="specsMaterial"></p>
            </div>
            <div class="specs-container">
                <div class="specs-icon blue-bg">
                    <img src="{{ asset('admin/assets/icons/product-detail/ProductSize.svg') }}" alt="">
                </div>
                <p class="specs-text" id="specsSize"></p>
            </div>
            <div class="specs-container">
                <div class="specs-icon blue-bg">
                    <img src="{{ asset('admin/assets/icons/product-detail/ProductWeight.svg') }}" alt="">
                </div>
                <p class="specs-text" id="specsWeight"></p>
            </div>
        </div>

        <div class="carousel">
            <button class="carousel__button carousel__button--left active">
                <img src="{{ asset('admin/assets/icons/CombosArrowLeft.svg') }}" alt="">
            </button>
            <div class="carousel__track-container">
                <ul class="carousel__track">
                    @foreach ($products as $product)
                        <li class="carousel__slide @if ($product->id == reset($products)->id) current-slide @endif" id="{{ $product->id }}">

                            {{-- IMAGE FOR PORDUCT IN COMBO --}}
                            @if ($product->main_image)
                            <div class="carousel__image carousel_image_container carousel-img">
                                <img class="carousel__image" src="{{ asset('images/main-images/' . $product->main_image) }}" alt="">
                            </div>
                            @else
                                <img class="carousel__image" src="{{ asset('admin/assets/images/ImageNotFound.svg') }}" alt="">
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <button class="carousel__button carousel__button--right">
                <img src="{{ asset('admin/assets/icons/CombosArrowRight.svg') }}" alt="">
            </button>
            <div class="carousel__nav">
                @foreach ($products as $key => $product)
                    <button class="carousel__indicator @if ($key == array_key_first($products)) current-slide @endif"></button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="product-opinion light-beige-bg">
        <div class="title-reviews-div">
            <p class="opinion-title">QUÉ OPINAN NUESTROS CLIENTES</p>
            <a class="reviews-link link-desktop" href="https://search.google.com/local/reviews?placeid=ChIJ5dFdDXu4vJUR1qkMLngRwIM" target="_blank">Ver todas las reseñas</a>
        </div>
        <img class="opinion-mobile" src="{{ asset('admin/assets/images/product-detail/ProductOpinion.svg') }}" alt="">
        <img class="opinion-desktop" src="{{ asset('admin/assets/images/product-detail/ProductOpinionDesktop.svg') }}" alt="">
        <a class="reviews-link link-mobile" href="https://search.google.com/local/reviews?placeid=ChIJ5dFdDXu4vJUR1qkMLngRwIM" target="_blank">Ver todas las reseñas</a>
        <img class="bubble-fish" src="{{ asset('admin/assets/images/product-detail/ProductDetailBubbleFish.svg') }}" alt="">
    </div>

    <script type="module">
        import { main } from "{{ asset(mix('js/comboDetail.js')) }}";
        import { mainNavbar } from "{{ asset(mix('js/admin/navBar.js')) }}";
        import { mainFooter } from "{{ asset(mix('js/admin/footer.js')) }}";

        let url = {!! json_encode(url('/productos')) !!};
        let baseUrl = {!! json_encode(url('/')) !!};

        let products = {!! json_encode($products) !!};

        window.onload = function() {
            main({
                products: products
            })
            mainNavbar({
                url: url
            })
            mainFooter({
                url: baseUrl
            })
        }
    </script>
    <script type="text/javascript">
        let mainImage = $('#mainImage');

        function changeMainImage(iconId) {
            let selectedImage = $('#' + iconId);

            // selectedImage[0].classList.add('selected-main-img');
            mainImage[0].src = selectedImage[0].src;
        }
    </script>
@endsection
