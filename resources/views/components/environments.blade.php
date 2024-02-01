@php
    $cardsJson = file_get_contents('enviroments_cards.json');

    $cards = json_decode($cardsJson, true);
@endphp

<div class="py-5 environments">
    <h2 class="text-center">Viva o Luxo Responsável no Residencial Verde Sereno</h2>
    <p class="text-center fs-5 ">Onde a Natureza e o Luxo Se Encontram.</p>
    <div class="environments__cards row justify-content-around px-5 mt-5 is-mobile">
        @foreach($cards as $card)
            <div class="card col-2 mb-3 border-none" style="width: 18rem;">
                    <img src="{{$card['image']}}" class="card-img-top" alt="{{$card['description']}}">
                <div class="card-body">
                    <p class="card-text text-center">{{ $card['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <a href="#form"><button href="#form" type="submit" class="btn btn-primary px-5 mx-auto text-center d-block">QUERO MAIS
            INFORMAÇÕES {!! config('images.icons.arrow-right') !!}</button></a>
</div>

<style>
    .border-none{
        border: none;
    }
    .bg-none{
        background: none;
    }
    .environments p, .environments h2{
        color: #314839;
        font-family: "Gotham", sans-serif;
    }
    .card-text{
        color: #4A5B3A !important;
    }
    .environments button[type='submit'] {
        height: 58px;
        font-size: 13px;
        white-space: nowrap;
        background: #AF5F48;
    }
</style>
