$(function(){

    exibirItem();
    addLista();
    addItemLista();
    arrastarSoltarItem();
    deleteLista();
    deleteItem();
    editNomeLista();
    editItem();

})

//editar item
var editItem = function(){
    $('#areaLista').on('click','.lista .areaItem .itemLista .btsItem .btEditItem', function(){

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

        $('#modalEditItem > form').off('submit').submit(function(){
            
            $(alteracaoNome).html($('#nomeClienteEdit').val());
            $(alteracaoTel).html($('#telClienteEdit').val());
            $(alteracaoEnd).html($('#enderecoClienteEdit').val());
            $(alteracaoEmail).html($('#emailClienteEdit').val());

            $('#modalAddLista > form input[type=submit]').prop('disabled', true);

            $('#modalEditItem').fadeOut(200);

            return false;
        })
    })
}

//editar nome da lista
var editNomeLista = function(){
    $('#areaLista').on('click','.lista .containerNomeLista .btsLista .btEditNomeLista', function(){

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);
        
        $('#modalEditLista').fadeIn(200);

        $('#modalEditLista #nomeEditLista').focus();

        var alteracaoNome = $(this).parent().parent().children('.nomeLista');
        
        $('#nomeEditLista').val($(alteracaoNome).html());

        $('#modalEditLista > form').off('submit').submit(function(){

            $(alteracaoNome).html($('#nomeEditLista').val());

            $('#nomeEditLista').val('');

            $('#modalAddLista > form input[type=submit]').prop('disabled', true);

            $('#modalEditLista').fadeOut(200);

            return false;
        })
    })
}

//deletar lista
var deleteItem = function(){

    $('#areaLista').on('click','.lista .areaItem .itemLista .btsItem .btDeleteItem',function(){
        $(this).parent().parent().remove();
    })
}

//deletar lista
var deleteLista = function(){

    $('#areaLista').on('click','.lista .containerNomeLista .btsLista .btDeleteLista',function(){
        $(this).parent().parent().parent().remove();
    })
}

//exibir dados do item
var exibirItem = function(){

    $('#areaLista').on('click', '.lista .areaItem .itemLista',function(){

        if($(this).children().last().css('display') == 'none'){
            $(this).children().slice(1).css('display', 'block');
        }else{
            $(this).children().slice(1).css('display', 'none');
        }
    })

}

//adicionar lista
var addLista = function(){

    $('.containerBtAddLista').off('click').click(function(){

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);

        $('#modalAddLista').fadeIn(200);

        $('#modalAddLista #nomeLista').focus();

        $('#modalAddLista > form').off('submit').submit(function(){

            var nomeLista = $('#modalAddLista > form > #nomeLista').val();

            $('#containerListas #areaLista').append('<div class="lista" draggable="true"><div class="containerNomeLista"><span class="nomeLista">'+nomeLista+'</span><div class="btsLista"><span class="material-symbols-outlined btEditNomeLista">edit</span><span class="material-symbols-outlined btDeleteLista">delete</span></div></div><div class="areaItem"></div><div class="containerBtAddItem"><span class="material-symbols-outlined btAddItem">add</span></div></div>');

            $('#modalAddLista > form input[type=submit]').prop('disabled', true);

            $('#modalAddLista').fadeOut(200);

            $('#modalAddLista > form input[type=text]').val('');

            return false;
        })

    })
}

//adicionar item
var addItemLista = function(){

    var nomeCliente;
    var telCliente;
    var enderecoCliente;
    var emailCliente;


    $('#areaLista').on('click','.lista .containerBtAddItem .btAddItem',function(){

        var areaItem = $(this).parent().prev();

        $('#modalAddLista > form input[type=submit]').prop('disabled', false);

        $('#modalAddItem').fadeIn(200);

        $('#modalAddItem #nomeCliente').focus();

        $('#modalAddItem form').off('submit').submit(function(){

            nomeCliente = $('#modalAddItem #nomeCliente').val();
            telCliente = $('#modalAddItem #telCliente').val();
            enderecoCliente = $('#modalAddItem #enderecoCliente').val();
            emailCliente = $('#modalAddItem #emailCliente').val();

            $(areaItem).append('<div class="itemLista" draggable="true"> <div class="contNomeCliente">'+nomeCliente+'</div> <div class="contTelCliente">'+telCliente+'</div> <div class="contEndCliente">'+enderecoCliente+'</div> <div class="contEmailCliente">'+emailCliente+'</div> <div class="btsItem"> <span class="material-symbols-outlined btEditItem">edit</span> <span class="material-symbols-outlined btDeleteItem">delete</span> </div> </div>');

            $('#modalAddLista > form input[type=submit]').prop('disabled', true);

            $('#modalAddItem').fadeOut(200);

            $('#modalAddItem > form input:not([type=submit])').val('');

            return false;
        })
    })

}

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