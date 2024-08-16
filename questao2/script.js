fetch('ColorLib.php')
    .then(response => response.json())
    .then(colors => {
        const container = document.getElementById('container');

        // Loop para criar 100 divs com as cores recebidas
        colors.forEach(color => {
            const newDiv = document.createElement('div');
            newDiv.className = 'dynamic-div';
            newDiv.style.background = color;
            container.appendChild(newDiv);
        });
    })
    .catch(error => console.error('Erro ao buscar as cores:', error));