<?php
    require __DIR__.'/src/Database/ClienteDatabase.class.php';    
    use AvaliacaoPW\Database\ClienteDatabase;

    header('Content-Type: application/json; charset=utf-8');
    
    $clienteDatabase = new ClienteDatabase();
    $clienteDatabase->lerArquivo();     
 
    $clienteDatabase->getClientes();
    
    echo json_encode($clienteDatabase->getClientes());
    /*
        Como pode ser visto acima, o método "getClientes()" da classe "ClienteDatabase" retorna um array de objetos.
        Cada objeto representa um cliente com seus respectivos dados: 
        - _id: Identificador
        - nome: Nome do cliente
        - avatar: Endereço para sua foto
        - receitas: Array contendo um conjunto de valores relacionados as receitas
        - despesas: Array contendo um conjunto de valores relacionados as despesas

        Você deverá escrever acima a(s) instrução(ões) que permita(m) que qualquer requisição
        realizada para este aquivo tenha como resposta um JSON contendo contendo o array de clientes.         

        Ao término, você deverá remover o comentário da linha 5 para que a resposta seja 
        corretamente estruturada no cabeçalho de resposta.
    */
    
    
?>