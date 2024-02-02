@extends('layouts.hotsite')

@section('content')
    <main>
        @include('condominio-verde-serrano.partials.header')

        @component('condominio-verde-serrano.components.form-section')

        @endcomponent

        @component('condominio-verde-serrano.components.contact')
        @endcomponent

        @component('condominio-verde-serrano.components.description-section')
        @endcomponent

        @component('condominio-verde-serrano.components.environments')
        @endcomponent

        @component('condominio-verde-serrano.components.structure')
        @endcomponent

        @component('condominio-verde-serrano.components.house-plan')
        @endcomponent

        @component('condominio-verde-serrano.components.tourism')
        @endcomponent

        @component('condominio-verde-serrano.components.maps')
        @endcomponent
    </main>

    @include('condominio-verde-serrano.partials.footer')

@endsection
