@php
    $cardsJson = file_get_contents('tourism_cards.json');

    $cards = json_decode($cardsJson, true);
@endphp

<div class="tourism">
    <h2 class="text-center my-4 fw-bold">Na Rota dos Ipês, o novo circuito das Montanhas Capixabas,<br>
        a uma hora da capital.</h2>
    <div class="row align-items-center">
        <img class="image-fluid col-md-6 col-12 mb-3" src="{{config('images.images.tourism')}}"
             alt="{{config('images.images.tourism')}}">
        <div class="col-md-4 col-12 my-3">
            <p class="text-start fs-6">A nova rota do turismo nas montanhas de Domingos Martins contempla, além das
                belezas naturais de altitude, empreendimentos, serviços e atrativos durante o ano todo. Um verdadeiro
                roteiro para todos os gostos e ocasiões a apenas 50 km de Vitória, pela BR-262.</p>
        </div>
    </div>
    <div class="row px-5 mt-4 justify-content-center">
        @foreach($cards as $card)
            <div class="card col-md-1 col-12 mb-3 border-none">
                <img src="{{$card['image']}}" alt="{{$card['description']}}">
                <div class="card-body px-2">
                    <p class="text-center  m-0 p-0">{{ $card['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .tourism p,.tourism h2{
        font-family: 'Gotham', sans-serif;
    }
    .tourism h2{
        color: #314839;
    }
    .tourism p{
        color: #848D7B;
    }
    .tourism .card img{
        height: 50px;
        width: 50px;
        margin: 0 auto;
    }
    .tourism .card p{
        font-size: 12px;
    }
</style>
