document.getElementById('estado').addEventListener('change', function () {
    let estadoSelecionado = this.value;

    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/microrregioes`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            return response.json(); // Retorna a Promise que resolve para o objeto JSON
        })
        .then(data => {

            let selectCidade = document.getElementById('cidade');
            selectCidade.disabled = false;
            let childNodes = Array.from(selectCidade.children);

            childNodes.forEach(child => {
                if (child.tagName === 'OPTION' && !child.disabled && !child.selected) {
                    selectCidade.removeChild(child);
                }
            });
            data.forEach((cidade) => {
                let option = document.createElement('option');
                option.value = cidade.id; // Supondo que cada cidade tenha um ID
                option.text = cidade.nome; // Nome da cidade
                selectCidade.appendChild(option);
            });
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });

});
