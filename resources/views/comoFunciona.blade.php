@extends('layouts.user')
@section('styles')
<link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
<style type="text/css">

.card{margin-top:12px;margin-bottom:12px}.feed-entry .entry-block,.feed-entry .entry-header,.feed-entry .entry-body,.feed-entry .entry-media,.feed-entry .entry-footer{margin-top:8px;margin-bottom:8px}.feed-entry .entry-block:first-of-type,.feed-entry .entry-header:first-of-type,.feed-entry .entry-body:first-of-type,.feed-entry .entry-media:first-of-type,.feed-entry .entry-footer:first-of-type{padding-top:16px;margin-top:0;}.feed-entry .entry-block:last-of-type,.feed-entry .entry-header:last-of-type,.feed-entry .entry-body:last-of-type,.feed-entry .entry-media:last-of-type,.feed-entry .entry-footer:last-of-type{padding-bottom:16px;margin-bottom:0}@media (max-width: 480px){.feed-entry .entry-block:first-of-type,.feed-entry .entry-header:first-of-type,.feed-entry .entry-body:first-of-type,.feed-entry .entry-media:first-of-type,.feed-entry .entry-footer:first-of-type{padding-top:12px}.feed-entry .entry-block:last-of-type,.feed-entry .entry-header:last-of-type,.feed-entry .entry-body:last-of-type,.feed-entry .entry-media:last-of-type,.feed-entry .entry-footer:last-of-type{padding-bottom:12px}}.feed-entry .entry-body{padding-right:88px;margin-bottom:16px}.feed h3{margin-bottom:8px}.images-1-up .activity-map .entry-image-wrapper{height:181.33px}.feed .group-activity .group-activity-map{height:181.33px}.feed-entry .list-entries>li{margin-top:0;margin-bottom:0}.feed-entry .child-entry .entry-header{margin-bottom:0;padding-top:12px}
.list-stats {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    list-style: none;
    margin-bottom: 0;
    padding-left: 0;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
}
.list-stats li {
    margin-left: 0;
    margin-right: 16px;
    padding-right: 16px;
    position: relative;
    margin-bottom: 0.75em;
    display: flex;
    box-sizing: border-box;
}
.list-stats .stat:last-child {
    margin-right: 0;
}
.list-stats .stat{
    margin-right: 0;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;

}
.atividade{
    padding: 0.5rem!important;
}
</style>
@endsection
@section('content')


<div class="card">
    <div class="card-header">Como funciona o desafio?</div>

    <div class="card-body">
        <p>Agora voc&ecirc; j&aacute; pode controlar quantos dias de atividade voc&ecirc; faz no ano!</p>

        <p>N&atilde;o importa se voc&ecirc; j&aacute; faz atividade f&iacute;sica a muito tempo ou se est&aacute; come&ccedil;ando, o aplicativo Desafio 300 Dias vai ajudar voc&ecirc; a controlar os dias que voc&ecirc; pratica atividade f&iacute;sica.</p>

        <p>Assim, ajudaremos a criar uma rotina saud&aacute;vel e positiva. E voc&ecirc; saber&aacute; quantos dias voce se exercitou em um ano!</p>

        <p>- voc&ecirc; lan&ccedil;a a sua atividade e automaticamente os dias v&atilde;o ser contados</p>

        <p>- voc&ecirc; tamb&eacute;m pode sincronizar nosso App direto com o Strava e o dia &eacute; contado automaticamente </p>

        <p>- op&ccedil;&atilde;o de lan&ccedil;ar o local onde se exercitou. </p>

        <p>- op&ccedil;&atilde;o de lan&ccedil;ar a dist&acirc;ncia</p>

        <p>- op&ccedil;&atilde;o de lan&ccedil;ar o tempo que durou sua atividade</p>

        <p>- possibilidade de compartilhar nas Redes Sociais</p>

        <p>A ess&ecirc;ncia do #desafio300dias &eacute; motivar pessoas a sa&iacute;rem do sof&aacute;, e ahudar a criar uma nova rotina positiva, saud&aacute;vel!</p>

        <p>N&atilde;o importa se &eacute; muito ou pouco e nem se &eacute; r&aacute;pido ou devagar, o importante &eacute; se movimentar. </p>

        <p>E no final n&atilde;o importa se v&atilde;o ser 30, 80, 100, 200 ou 300 dias, o importante &eacute; participar e sair do sof&aacute;. O que &eacute; simples para alguns pode ser transformador para muitas outras pessoas.</p>

        <p>Por isso aqui n&atilde;o tem campe&atilde;o, no #desafio300dias todos s&atilde;o vencedores!</p>
    </div>
</div>

@endsection
@section('scripts')

@endsection