<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="views/css/crm.css">
</head>

<body>

    <div id="modalAddItem">
        <form>
            <input type="text" placeholder="Nome" id="nomeCliente" autocomplete="off">
            <input type="tel" placeholder="Telefone" id="telCliente" autocomplete="off">
            <input type="text" placeholder="Endereço" id="enderecoCliente" autocomplete="off">
            <input type="email" placeholder="Email" id="emailCliente" autocomplete="off">
            <input type="submit">
        </form>
    </div>

    <div id="modalEditItem">
        <form>
            <input type="text" placeholder="Nome" id="nomeClienteEdit" autocomplete="off">
            <input type="tel" placeholder="Telefone" id="telClienteEdit" autocomplete="off">
            <input type="text" placeholder="Endereço" id="enderecoClienteEdit" autocomplete="off">
            <input type="email" placeholder="Email" id="emailClienteEdit" autocomplete="off">
            <input type="submit">
        </form>
    </div>

    <div id="modalAddLista">
        <form>
            <input type="text" placeholder="Nome da lista" id="nomeLista" autocomplete="off" name="nomeLista">
            <input type="submit">
        </form>
    </div>

    <div id="modalEditLista">
        <form>
            <input type="text" id="nomeEditLista" autocomplete="off">
            <input type="submit">
        </form>
    </div>

    <header>
        <div id="containerCabecalho">
            <div id="containerLogo">LOGO</div>
            <div><a href="<?= ROOT_PATH ?>?sair">Sair</a></div>
            <div id="containerAutor">Desenvolvido por Matheus Machado</div>
        </div>
    </header>


    <main id="containerListas">
        <div id="areaLista">
<!--                 <div class="lista">
                    <div class="containerNomeLista">
                        <span class="nomeLista">nome Lista</span>
                        <div class="btsLista">
                            <span class="material-symbols-outlined btEditNomeLista">edit</span>
                            <span class="material-symbols-outlined btDeleteLista">delete</span>
                        </div>
                    </div>
                    <div class="areaItem">
                        <div class="itemLista" draggable="true">
                            <div class="contNomeCliente">nome</div>
                            <div class="contTelCliente">telefone</div>
                            <div class="contEndCliente">endereço</div>
                            <div class="contEmailCliente">email</div>
                            <div class="btsItem"> <span class="material-symbols-outlined btEditItem">edit</span> <span class="material-symbols-outlined btDeleteItem">delete</span> </div>
                        </div>
                    </div>
                    <div class="containerBtAddItem">
                        <span class="material-symbols-outlined btAddItem">add</span>
                    </div>
                </div> -->
        </div>

        <div class="containerBtAddLista">
            <span id="btAddLista"><span class="material-symbols-outlined">add</span>Adicionar Lista</span>
        </div>

    </main>

    <script src="views/js/jquery.js"></script>
    <script src="views/js/notify.min.js"></script>
    <script src="views/js/script.js"></script>
</body>

</html>