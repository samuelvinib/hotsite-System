@php
    use Illuminate\Support\Facades\Http;
    $estados = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/')->json();
@endphp

<div class="form-section" id="form">
    @if(session('message'))
        <div class="alert alert-warning alert-success fade show position-fixed" role="alert" style="top:20px;z-index: 6; right: 20px">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="form-section__background-black-container w-100 h-100">
        <div class="form-section__background-black"></div>
        <div class="position-absolute d-flex justify-content-center align-items-center w-100 h-100 row">
            <div class="form__text-container col-md-12">
                <h2 class="form__h2 fw-bold">Bem-vindo ao Residencial<br>Verde Sereno - Oásis<br>Ecológico de Luxo
                </h2>
                <p class="form__p">No coração da natureza exuberante, ergue-se o Residencial Verde Sereno, um
                    condomínio de luxo que
                    redefine o conceito de harmonia entre o homem e o meio ambiente. Cada detalhe foi meticulosamente
                    projetado para oferecer uma experiência única de viver em equilíbrio com a natureza, sem comprometer
                    o conforto e o luxo.</p>
            </div>
            <div class="form__formulario ms-4 p-3 mt-5 col-md-12">
                <form class="pb-3" method="POST" action="{{ route('form.store') }}">
                    @csrf
                    <h2 class="text-light fs-5 text-center mb-3">Cadastre-se para falar<br>
                        com um especialista.</h2>
                    <div class="mb-2">
                        <input required type="text" class="form-control w-100 fs-5" id="name" aria-describedby="name"
                               name="name"
                               placeholder="NOME">
                    </div>
                    <div class="mb-2 d-flex">
                        <input name="email" required type="email" class="form-control me-1" id="email"
                               aria-describedby="email" placeholder="E-MAIL">
                        <input required type="text" class="form-control ms-1" id="tel"
                               aria-describedby="tel" placeholder="TELEFONE">
                    </div>
                    <div class="mb-2 d-flex">
                        <select name="state" required id="estado" class="form-select me-1" aria-label="ESTADO" style="color:#595c5f;" >
                            <option value="" disabled selected>ESTADO</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado['sigla'] }}">{{ $estado['nome'] }}</option>
                            @endforeach
                        </select>
                        <select name="city" required disabled id="cidade" class="form-select ms-1" aria-label="CIDADE" style="color:#595c5f;">
                            <option value="" disabled selected>CIDADE</option>
                        </select>
                    </div>
                    <div class="mb-2 d-flex">
                        <textarea name="message" required type="text" class="form-control form__text" id="exampleInputEmail1" rows="5"
                                  aria-describedby="emailHelp" placeholder="MENSAGEM"></textarea>
                    </div>
                    <div class="mb-2 d-flex pb-5 align-items-stretch">
                        <div class="position-relative d-none d-sm-none d-md-block">
                            <div class="g-recaptcha position-absolute" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-theme="light"  style="transform:scale(0.8);transform-origin:0 0;" ></div>
                        </div>
                        <button type="submit" class="btn btn-primary d-flex align-items-center px-3 ms-auto">QUERO MAIS
                            INFORMAÇÕES {!! config('images.icons.arrow-right') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-section {
        background-image: url("{{url('/').config('images.images.background-form')}}");
        height: 100vh;
        background-size: auto 100vh;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
    }
</style>
