@extends('layouts.user')
@section('styles')

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
    <div class="card-header">História</div>

    <div class="card-body">
        <p>Oi! Sou o Edu (<a href="https://www.instagram.com/eucorrietofeliz/" target="_blank">@eucorrietofeliz</a>) e criei em 2015 o Desafio 300 Dias (<a href="https://www.instagram.com/Desafio300Brasil/" target="_blank">@Desafio300Brasil</a>) que &eacute; um projeto motivacional baseado na minha hist&oacute;ria de mudan&ccedil;a de vida, onde emagreci 41kg, sem ajuda de ningu&eacute;m, sem rem&eacute;dio e sem cirurgia. Agora quero ajudar VOC&Ecirc;.</p>

        <p>Voc&ecirc; precisa acreditar que &eacute; poss&iacute;vel MUDAR e ter uma vida extraordin&aacute;ria. Depois de diversas dietas radicais que n&atilde;o eram sustent&aacute;veis, criei um m&eacute;todo que transformou meu corpo e principalmente minha mente.</p>

        <p>A ess&ecirc;ncia &eacute; motivar voc&ecirc; a sair do sedentarismo e ajudar criar uma nova rotina mais saud&aacute;vel.</p>

        <p>Mais de 14.000 pessoas j&aacute; participaram e sa&iacute;ram do sof&aacute;. N&atilde;o fique fora dessa! Juntos vamos transformar a vida de muitas outras pessoas.</p>

        <p>Maiores informa&ccedil;&otilde;es acesse nosso site: <a href="https://www.desafio300brasil.com.br" target="_blank">www.desafio300brasil.com.br</a></p>

        <p>Viva uma vida extraordin&aacute;ria. Aquele abra&ccedil;o! Edu #desafio300brasil #desafio300dias</p>
        <img src="{{asset('/img/historia.jpg')}}" class="img-fluid" alt="Imagem responsiva">
    </div>
</div>

@endsection
@section('scripts')

@endsection