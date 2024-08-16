$.ajax({
    url: './ClientesJSON.php',
    method: 'GET',
    dataType: 'JSON',
    success: (clientes) => {
        clientesDados(clientes);
        dadosFinais(clientes);
    },
    error: (error) => {
        console.log(error);
    }
});

function clientesDados(clientes) {
    clientes.forEach(cliente => {
        $(`
            <main class="container" id="main-container">
                <div class="card mt-3">
                    <div class="card-body">
                        <img src="${cliente.avatar}" class="img-thumbnail rounded-circle">
                        <h5 class="card-title d-inline-block ms-2"> ${cliente.nome} </h5>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item text-primary"> +<b>Receitas</b>: R$ ${somaReceitas(cliente.receitas)} </li>
                            <li class="list-group-item text-danger"> -<b>Despesas</b>: R$ ${somaDespesas(cliente.despesas)} </li>
                            <li class="list-group-item text-dark"> <b>Balanço</b>: R$ ${resultBalanco(cliente.receitas, cliente.despesas)} </li>
                        </ul>
                    </div>
                </div>
            </main>
        `).appendTo('body');
    });
}

function dadosFinais(clientes) {
    if (clientes.length > 0 && !document.getElementById('footer-container')) {
        const listNews = document.createElement('footer');
        listNews.className = 'container';
        listNews.id = 'footer-container';

        const maiorReceitaObj = maiorReceita(clientes);
        const maiorDespesaObj = maiorDespesa(clientes);

        listNews.innerHTML = `
            <div class="card mt-3">
                <h5 class="card-title d-inline-block ms-3 mb-2 mt-3">Totalizadores</h5>
                <div class="card-body">
                    <h6> ${maiorReceitaObj.nome} </h6>
                    <p class="text-primary"><b>Maior Receita</b>: R$ ${maiorReceitaObj.valor}</p>
                    <h6> ${maiorDespesaObj.nome} </h6>
                    <p class="text-danger"><b>Maior Despesa</b>: R$ ${maiorDespesaObj.valor}</p>
                </div>
            </div>   
        `;
        document.body.appendChild(listNews);
    }
}

function somaReceitas(receitas) {
    let sum = receitas.reduce((acc, receita) => acc + receita, 0);
    return sum.toFixed(2);
}

function somaDespesas(despesas) {
    let sum = despesas.reduce((acc, despesa) => acc + despesa, 0);
    return sum.toFixed(2);
}

function resultBalanco(receitas, despesas) {
    let receita = somaReceitas(receitas);
    let despesa = somaDespesas(despesas);
    let balanco = receita - despesa;
    return balanco.toFixed(2);
}

function maiorReceita(clientes) {
    let maxValor = 0;
    let nomeCliente = '';

    clientes.forEach(cliente => {
        const somaReceita = parseFloat(somaReceitas(cliente.receitas));
        if (somaReceita > maxValor) {
            maxValor = somaReceita;
            nomeCliente = cliente.nome;
        }
    });

    return { nome: nomeCliente, valor: maxValor.toFixed(2) };
}

function maiorDespesa(clientes) {
    let maxValor = 0;
    let nomeCliente = '';

    clientes.forEach(cliente => {
        const somaDespesa = parseFloat(somaDespesas(cliente.despesas));
        if (somaDespesa > maxValor) {
            maxValor = somaDespesa;
            nomeCliente = cliente.nome;
        }
    });

    return { nome: nomeCliente, valor: maxValor.toFixed(2) };
}
