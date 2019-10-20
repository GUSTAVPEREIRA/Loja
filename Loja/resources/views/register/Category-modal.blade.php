@extends('layout.app')
@section('title')
    Cadastro de categoria
@endsection
@section('content')
<div class="container-fluid mt-lg-5">
    <div class="container">
        <form action="{{route('category.add')}}">
            @csrf
            <div class="">
                <div class="form-group d-flex align-items-center">
                    <label class="col-form-label" for="Categoryname">Nome:</label>
                    <div class="input-group-prepend">
                        <input id="Categoryname" type="text" name="name" class="form-control ml-2">
                    </div>
                </div>
                <button class="btn btn-success col-sm-1">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection
