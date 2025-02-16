@extends('site.partials.head')
@section('title', $title)
@section('content')

@include('site.partials.header')

<div class="conteudo-destaque">

    <div class="esquerda">
        <div class="informacoes">
            <h1>Sistema NexGestao</h1>
            <p>Software para gestão empresarial ideal para sua empresa.
            <p>
            <div class="chamada">
                <img src="/img/check.png">
                <span class="texto-branco">Gestão completa e descomplicada</span>
            </div>
            <div class="chamada">
                <img src="img/check.png">
                <span class="texto-branco">Sua empresa na nuvem</span>
            </div>
        </div>

        <div class="video">
            <img src="img/player_video.jpg">
        </div>
    </div>

    <div class="direita">
        <div class="contato">
            <h1>Contato</h1>
            <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.
            <p>
                @component('site.components.form_contato', ['contactReasons' => $contactReasons])
                @endcomponent
        </div>
    </div>
</div>
@endsection