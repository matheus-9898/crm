$(function(){
    //pegar listas e itens do BD
    function getDados(){
        $.ajax({
            type: "post",
            dataType: "json",
            url: "index.php/?ajax=getDados",
            data: $(this).serialize()
        }).done(function(data){
            var dados = Object.entries(data.dados);

            /* obter dados dos itens
             var i = 0;
            while(value[1][i] != null){
                console.log(value[1][i]['nomeItem']);
                i++;
            } */
            //nome da lista: value[1]['nomeLista']
            //id da lista: value[1]['idLista']

            $('#areaLista').html('');

            $.each(dados, function (index, value) {

                var html = '<div class="lista"><div class="containerNomeLista"><span class="nomeLista">'+value[1]['nomeLista']+'</span><div class="btsLista"><span class="material-symbols-outlined btEditNomeLista" id-lista="'+value[1]['idLista']+'">edit</span><span class="material-symbols-outlined btDeleteLista" id-lista="'+value[1]['idLista']+'">delete</span></div></div><div class="areaItem">';

                var i = 0;
                while(value[1][i] != null){

                    html += '<div class="itemLista" draggable="true"><div class="contNomeCliente">'+value[1][i]['nomeItem']+'</div><div class="contTelCliente">'+value[1][i]['telefone']+'</div><div class="contEndCliente">'+value[1][i]['endereco']+'</div><div class="contEmailCliente">'+value[1][i]['email']+'</div><div class="btsItem"> <span class="material-symbols-outlined btEditItem" id-item="'+value[1][i]['idItem']+'">edit</span> <span class="material-symbols-outlined btDeleteItem" id-item="'+value[1][i]['idItem']+'">delete</span> </div></div>';

                    i++;
                }

                html += '</div><div class="containerBtAddItem"><span class="material-symbols-outlined btAddItem" id-lista="'+value[1]['idLista']+'">add</span></div></div>';

                $(html).appendTo('#areaLista');
            });
        });
    }
    getDados();

    //exibir modal add lista
    $('.containerBtAddLista').off('click').click(function(){

        $('#modalEditLista').fadeOut(200);
        $('#modalAddLista').fadeOut(200);
        $('#modalEditItem').fadeOut(200);
        $('#modalAddItem').fadeOut(200);

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);
        $('#modalAddLista').fadeIn(200);
        $('#modalAddLista #nomeLista').focus();
    })

    //add Lista
    $('#modalAddLista > form').off('submit').submit(function(){

        $.ajax({
            type: "post",
            url: "index.php/?ajax=addLista",
            data: $(this).serialize(),
            dataType: "json"
        }).done(function(data){
            getDados();
        });

        $('#modalAddLista').fadeOut(200);

        return false;
    })

    //abrir modal e editar nome da lista
    $('#areaLista').on('click','.lista .containerNomeLista .btsLista .btEditNomeLista', function(){

        $('#modalEditLista').fadeOut(200);
        $('#modalAddLista').fadeOut(200);
        $('#modalEditItem').fadeOut(200);
        $('#modalAddItem').fadeOut(200);

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);
        $('#modalEditLista').fadeIn(200);
        $('#modalEditLista #nomeEditLista').focus();

        var alteracaoNome = $(this).parent().parent().children('.nomeLista');
        
        $('#nomeEditLista').val($(alteracaoNome).html());


        //editar nome da lista
        var idLista = parseInt(this.getAttribute('id-lista'));

        $('#modalEditLista > form').off('submit').submit(function(){

            var novoNome = $('#nomeEditLista').val();

            $.ajax({
                type: "post",
                url: "index.php/?ajax=editLista",
                data: {idLista : idLista,novoNome : novoNome},
                dataType: "json"
            }).done(function(data){
                getDados();
            });

            $('#modalEditLista').fadeOut(200);

            return false;
        })

    })

    //exibir dados do item
    $('#areaLista').on('click', '.lista .areaItem .itemLista',function(){

        if($(this).children().last().css('display') == 'none'){
            $(this).children().slice(1).css('display', 'block');
        }else{
            $(this).children().slice(1).css('display', 'none');
        }
    })
    
    //deletar lista
    $('#areaLista').on('click','.lista .containerNomeLista .btsLista .btDeleteLista',function(){
        var idLista = parseInt(this.getAttribute('id-lista'));

        $.ajax({
            type: "post",
            url: "index.php/?ajax=deleteLista",
            data: {idLista : idLista},
            dataType: "json",
            success: function (data) {
                getDados();
            }
        });
    })

    //adicionar item nas listas
    $('#areaLista').on('click','.lista .containerBtAddItem .btAddItem',function(){

        $('#modalEditLista').fadeOut(200);
        $('#modalAddLista').fadeOut(200);
        $('#modalEditItem').fadeOut(200);
        $('#modalAddItem').fadeOut(200);

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);
        $('#modalAddItem').fadeIn(200);
        $('#modalAddItem #nomeCliente').focus();

        var idLista = parseInt(this.getAttribute('id-lista'));
        $('#modalAddItem form').off('submit').submit(function(){

            var nome = $('#nomeCliente').val();
            var tel = $('#telCliente').val();
            var end = $('#enderecoCliente').val();
            var email = $('#emailCliente').val();

            $.ajax({
                type: "post",
                url: "index.php/?ajax=addItem",
                data: {
                    idLista : idLista,
                    nome : nome,
                    tel : tel,
                    end : end,
                    email : email
                },
                dataType: "json"
            }).done(function(data){
                getDados();
            });

            $('#modalAddItem').fadeOut(200);
            $('#modalAddItem > form input:not([type=submit])').val('');

            return false;
        })
    })

    //deletar itens das listas
    $('#areaLista').on('click','.lista .areaItem .itemLista .btsItem .btDeleteItem',function(){
        var idItem = parseInt(this.getAttribute('id-item'));

        $.ajax({
            type: "post",
            url: "index.php/?ajax=deleteItem",
            data: {idItem : idItem},
            dataType: "json",
            success: function (data) {
                getDados();
            }
        });
    })

    //editar itens
    $('#areaLista').on('click','.lista .areaItem .itemLista .btsItem .btEditItem', function(){

        $('#modalEditLista').fadeOut(200);
        $('#modalAddLista').fadeOut(200);
        $('#modalEditItem').fadeOut(200);
        $('#modalAddItem').fadeOut(200);

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);
        $('#modalEditItem').fadeIn(200);
        $('#modalEditItem #nomeClienteEdit').focus();

        var alteracaoNome = $(this).parent().parent().children('.contNomeCliente');
        var alteracaoTel = $(this).parent().parent().children('.contTelCliente');
        var alteracaoEnd = $(this).parent().parent().children('.contEndCliente');
        var alteracaoEmail = $(this).parent().parent().children('.contEmailCliente');
        $('#nomeClienteEdit').val($(alteracaoNome).html());
        $('#telClienteEdit').val($(alteracaoTel).html());
        $('#enderecoClienteEdit').val($(alteracaoEnd).html());
        $('#emailClienteEdit').val($(alteracaoEmail).html());

        var idItem = parseInt(this.getAttribute('id-item'));
        $('#modalEditItem > form').off('submit').submit(function(){
            
            var novoNome = $('#nomeClienteEdit').val();
            var novoTel = $('#telClienteEdit').val();
            var novoEnd = $('#enderecoClienteEdit').val();
            var novoEmail = $('#emailClienteEdit').val();

            $.ajax({
                type: "post",
                url: "index.php/?ajax=editItem",
                data: {
                    idItem : idItem,
                    novoNome : novoNome,
                    novoTel : novoTel,
                    novoEnd : novoEnd,
                    novoEmail : novoEmail
                },
                dataType: "json"
            }).done(function(data){
                getDados();
            });

            $('#modalAddLista > form input[type=submit]').prop('disabled', true);
            $('#modalEditItem').fadeOut(200);

            return false;
        })
    })

})

//ATENÇÃO
//APENAS SUBSTITUIR ESTAS FUNÇÕES POR FUNÇÕES PHP REALIZANDO CRUD
/*    
    arrastarSoltarItem();
*/

//arrastar e soltar item
var arrastarSoltarItem = function(){

    //Quando começa a arrastar
    $('#areaLista').on('dragstart','.lista .areaItem .itemLista',function(event){
        $('.itemLista').removeAttr('id');//Removendo o id de todos os itens de todas as listas
        $(this).attr('id','elementoArrastado');

        event.originalEvent.dataTransfer.setData('item-lista', event.target.id);
    })

    //quando está arrastando
    $('#areaLista').on('dragover','.lista .areaItem', function(event) {
        event.preventDefault();
    });

    //quando solta
    $('#areaLista').on('drop','.lista .areaItem',function(event){

        event.preventDefault();

        var data = event.originalEvent.dataTransfer.getData('item-lista');

        var elementoArrastado = $('#' + data);

        if($('#' + data).parent().is($(this))){
            return false;
        }

        if (elementoArrastado.length > 0) {

            elementoArrastado.prependTo($(this));
        }

    })
}