@extends('layout.app')
@section('title')
    Lista de categoria
@endsection
@section('content')
    <div class="container-fluid mt-lg-5">
        <h1>Lista de categorias</h1>
        <div class="container mt-4">
            <a class="btn btn-success" href="{{route("category.modal")}}">Adicionar</a>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                    </tr>
                </thead>
                <tbody id="listDynamic">
                    <tr class="dynamicItems">
                        <td>1</td>
                        <td>teste</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript">


        $(document).ready(function(){
            function carregar() {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    },
                    type: 'GET',
                    url: "{{route('category.show')}}",
                    enctype: 'multipart/form-data',
                    success: function(dados) {
                        var tbody = $('#listDynamic').html("");
                        var obj = jQuery.parseJSON(dados);
                        $(obj).each(function (i) {
                            var container = "<tr class='dynamicItems'>";
                            container += "<td>"+ obj[i].id +"</td>";
                            container += "<td>"+ obj[i].name +"</td>";
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
    </script>
@endsection


