<!DOCTYPE html>
<html>
<head>
    <title>Certificado</title>
</head>
<body>
    <center>
        <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
            <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
               <span style="font-size:50px; font-weight:bold">Certificado de Conclusão</span>
               <img src="{{$userDesafio->desafio->imagem}}" alt="Medalha" style="
               display: block;
               margin-left: auto;
               margin-right: auto;
               max-height:150px;
               max-width: 150px;
               ">
               <br><br>
               <span style="font-size:15px">Certifico que o Atleta</span>
               <br>

               <span style="font-size:20px"><b>{{$nome}}</b></span><br/><br/>
               <span style="font-size:15px">completou o desafio </span> <br/><br/>
               <span style="font-size:18px">{{$userDesafio->desafio->nome}}</span> <br/><br/>
               <br>
               <span style="font-size:15px"><i>Data</i></span><br>
               <span style="font-size:15px"><i>{{$userDesafio->updated_at}}</i></span><br>

           </div>
       </div>
   </center>
</body>
</html>


