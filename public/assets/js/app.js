$('#estado').change(function () {
    let estadoSelecionado = $(this).val();

    $.get(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoSelecionado}/microrregioes`)
        .done(function (data) {
            let selectCidade = $('#cidade');
            selectCidade.prop('disabled', false).prop('selectedIndex', 0);
            selectCidade.find('option').not(':disabled').remove();

            $.each(data, function (index, cidade) {
                let option = $('<option></option>').val(cidade.nome).text(cidade.nome);
                selectCidade.append(option);
            });
        })
        .fail(function (error) {
            console.error('There was a problem with the fetch operation:', error);
        });
});


$(document).ready(function(){
    $('#tel').mask('(00) 00000-0000')
});
