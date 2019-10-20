$(document).ready(function(){
    function carregar() {
        $.ajax({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: 'GET',
            url: "register/category/show'",
            enctype: 'multipart/form-data',
            success: function(dados) {
                var tbody = $('#listDynamic').html("");
                var obj = jQuery.parseJSON(dados);
                $(obj).each(function (i) {
                    var container = "<tr>";
                    container += "<td>+ obj[i].id +</td>";
                    container += "<td>+ obj[i].name +</td>";
                    container += "</tr>";
                    tbody.append(container);
                });
            },
            error: function(){
                console.log('Erro no ajax');
            }
        });
        setTimeout(carregar, 15000);
    }

    setTimeout(carregar, 2000);
});
