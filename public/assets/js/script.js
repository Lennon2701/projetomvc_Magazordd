$(document).ready(function () {
    var errorMessage = $('.alertMessage').attr('class')?.includes('d-none');
    if (!errorMessage) {
        setTimeout(function () { hide($('.alertMessage')); }, 3000);
        function hide(element) {
            if (element)
                element[0].style.display = "none";
        }
    }

    $(".datepicker").datepicker({
        defaultDate: "getDate()",
        language: "pt-BR",
        startDate: '+1',
        daysOfWeekDisabled: [0],
        format: 'dd/mm/yyyy',
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        changeMonth: false,
        numberOfMonths: 1,
        minDate: 0
    });

    $("#data").mask('00/00/0000');

    $('.timepicker').timepicker({
        timeFormat: 'H:mm:ss',
        interval: 5,
        minTime: '6pm',
        maxTime: '23:59pm',
        // defaultTime: '6pm',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });


    $('.tableTables').DataTable({
        scrollY: '50vh',
        // scrollCollapse: true,
        stateSave: true,
        ordering: false,
        language: {
            emptyTable: 'Nenhum registro encontrado',
            info: 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
            infoFiltered: '(Filtrados de _MAX_ registros)',
            infoThousands: '.',
            loadingRecords: 'Carregando...',
            infoEmpty: 'Mostrando 0 até 0 de 0 registro(s)',
            processing: 'Carregando...',
            searchPlaceholder: 'Buscar registros',
            lengthMenu: '_MENU_ resultados por página',
            zeroRecords: 'Nenhum registro encontrado',
            search: 'Pesquisar',
            paginate: {
                'next': 'Próximo',
                'previous': 'Anterior',
                'first': 'Primeiro',
                'last': 'Último'
            },
        }
    });

    $('.tableReservation').DataTable({
        scrollY: '50vh',
        // scrollCollapse: true,
        stateSave: true,
        ordering: false,
        language: {
            emptyTable: 'Nenhum registro encontrado',
            info: 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
            infoFiltered: '(Filtrados de _MAX_ registros)',
            infoThousands: '.',
            loadingRecords: 'Carregando...',
            infoEmpty: 'Mostrando 0 até 0 de 0 registro(s)',
            processing: 'Carregando...',
            searchPlaceholder: 'Buscar registros',
            lengthMenu: '_MENU_ resultados por página',
            zeroRecords: 'Nenhum registro encontrado',
            search: 'Pesquisar',
            paginate: {
                'next': 'Próximo',
                'previous': 'Anterior',
                'first': 'Primeiro',
                'last': 'Último'
            },
        }
    });

    $('.date').mask('00/00/0000', { placeholder: '__/__/____' });
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('00000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00', { reverse: false });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: false });
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.percent').mask('##0,00%', { reverse: true });

});