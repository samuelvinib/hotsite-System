@php
    $cardsJson_firstSection = file_get_contents('structure1_cards.json');
    $cardsJson_secondSection = file_get_contents('structure2_cards.json');

    $cards_firstSection = json_decode($cardsJson_firstSection, true);
    $cards_secondSection = json_decode($cardsJson_secondSection, true);
@endphp

<div class="py-5 structure">
    <h2 class="text-center mb-2">ESTRUTURA DE RESORT COM TODOS OS SERVIÇOS<br>
        QUE VOCÊ PRECISA
    </h2>
    <p class="text-center fs-5 ">No Condomínio Verde Serrano você conhece o verdadeiro significado do bem-estar. São facilidades<br>para você viver com mais praticidade, conforto, segurança e qualidade de vida.</p>
    <div class="environments__cards row justify-content-around mt-5 px-5 align-items-stretch">
        @foreach($cards_firstSection as $card)
            <div class="card col-sm 2 mb-3 border-none bg-transparent">
                {!! file_get_contents(public_path($card['image']))!!}
                <div class="card-body">
                    <p class="card-text text-center">{{ $card['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <img class="image-fluid col-md-6 col-12 mb-3" src="{{config('images.images.image-structure')}}" alt="{{config('images.images.image-structure')}}">
        <div class="col-md-6 col-12 mb-3">
            <h2 class="text-center mb-4">AQUI A SUSTENTABILIDADE COM A<br>
                NATUREZA E COM O PRÓXIMO É<br>
                UM COMPROMISSO
            </h2>
            <p class="text-center fs-5">O Verde Serrano traz uma arquitetura incorporada na paisagem, num projeto que respeita a topografia original e preserva a vegetação nativa, além de cuidar do meio-ambiente com iniciativas sustentáveis.</p>
            <div class="row justify-content-around mt-5 px-5 align-items-stretch">
                @foreach($cards_secondSection as $card)
                    <div class="card col-sm col-md-4 col-3 mb-3 border-none bg-transparent">
                        {!! file_get_contents(public_path($card['image']))!!}
                        <div class="card-body">
                            <p class="card-text text-center">{{ $card['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .structure{
        background: #F5E8DF;
    }
    .structure .border-none{
        border: none;
    }
    .structure .bg-none{
        background: none;
    }
    .structure p, .structure h2{
        color: #AF5F48;
        font-family: "Gotham", sans-serif;
    }
    .structure .card-text{
        color: #4A5B3A !important;
         font-size: 11px;
    }
    .structure button[type='submit'] {
        height: 58px;
        font-size: 13px;
        white-space: nowrap;
        background: #AF5F48;
    }
    .structure .card-img-top{
        width: 40px;
        height: 45px;
    }
    .structure .card svg{
        width: 40px;
        margin: 0 auto;
    }
</style>
