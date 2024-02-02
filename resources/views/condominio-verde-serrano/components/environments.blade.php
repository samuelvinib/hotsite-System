@php
    $cardsJson = file_get_contents('environments_cards.json');

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
    <a href="#form" class="text-decoration-none"><button href="#form" type="submit" class="btn btn-primary px-5 mx-auto text-center d-block">QUERO MAIS
            INFORMAÇÕES {!! config('images.icons.arrow-right') !!}</button></a>
</div>
