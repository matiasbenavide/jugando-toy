@extends('layouts.infoSections')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('mainContent')
    <div class="main-container" style="height: auto; padding-right: 0; padding-left: 0;">
        <p class="main-title title-mobile">Sobre nosotros</p>
        <div class="about-us-container">
            <div class="text-container">
                <p class="main-title title-desktop">Sobre nosotros</p>
                <p class="main-text">Somos una familia que desde la formación profesional del diseño y la docencia, crea y fabrica para los más pequeños, elementos inspirados en las pedagogías Pikler / Montessori con el fin de brindarles herramientas para aprender y divertirse. Con un diseño funcional y con amor por el detalle, nuestros productos potencian la imaginación, el aprendizaje y todos los sentidos del niño a través del juego libre, donde los niños aprenden a explorar de forma autónoma el entorno al tiempo que desarrollan sus capacidades sensoriales y sus habilidades corporales. Nuestro compromiso es ofrecer productos de calidad que potencien la ergonomía, la estética y la perdurabilidad en el tiempo. Los acabados redondeados, los elementos metálicos ocultos, la ausencia de astillas y la utilización de materiales cuidadosamente seleccionados, contribuyen a lograrlo.</p>
            </div>
            <div class="text-container img-container">
                <img class="image" src="{{ asset('admin/assets/images/aboutUsImg.png') }}" alt="">
            </div>
        </div>

        <div class="cloud-container">
            <img class="cloud cloud-bottom" src="{{ asset('admin/assets/images/home-cloud-bottom.png') }}" alt="">
        </div>

        <div class="flyer-container">
            <div class="flyer-div">
                <div class="flyer">
                    <img class="w-100" src="{{ asset('admin/assets/images/HomeSlider.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <script type="module">

        import { showSuccess, showErrors } from "{{ asset(mix('js/module/sweetAlert.js')) }}";
        import { mainNavbar } from "{{ asset(mix('js/admin/navBar.js')) }}";
        import { mainFooter } from "{{ asset(mix('js/admin/footer.js')) }}";

        let url = {!! json_encode(url('/productos')) !!};
        let baseUrl = {!! json_encode(url('/')) !!};

        window.onload = function() {
            mainNavbar({
                url: url
            })
            mainFooter({
                url: baseUrl
            })
        }
    </script>
@endsection
