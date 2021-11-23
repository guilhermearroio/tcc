$(document).ready(function(){

    $(".owl-carousel").owlCarousel();

    var inputPergunta = $('.perguntaGroup input');
    $('.perguntaGroup button').click(function(){
        var codCliente = $('.perguntaGroup').attr('data-codCliente');
        var codOng = $('.perguntaGroup').attr('data-codOng');
        var pergunta = $('.perguntaGroup input').val();
        enviarPergunta(codCliente, codOng, pergunta);
    });

    $('.perguntaGroup input').keydown(function(event){
        if(event.which == 13){
            var codCliente = $('.perguntaGroup').attr('data-codCliente');
            var codOng = $('.perguntaGroup').attr('data-codOng');
            var pergunta = $('.perguntaGroup input').val();
            enviarPergunta(codCliente, codOng, pergunta);
        }
    });

    function enviarPergunta(codCliente, codOng, pergunta){
        $.ajax({
            method: "POST",
            url: "Controllers/PerguntaController.php",
            data : {
                codCliente : codCliente,
                codOng : codOng,
                pergunta: pergunta
            },
        }).done(function(){
            var html = '<div class="boxPergunta my-4"><span class="pergunta">' + pergunta + '</span><span class="semResposta">*Está pergunta ainda não foi respondida*</span></div>';
            var numero = $('.titlePerguntas').html().split('(');
            numero = parseInt(numero[1].substring(0, numero[1].length - 1)) + 1;
            console.log(numero);
            $('.titlePerguntas').html('Últimas perguntas feitas (' + numero + ')');
            $('.titlePerguntas').after(html);
        }).fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });
    }
});
