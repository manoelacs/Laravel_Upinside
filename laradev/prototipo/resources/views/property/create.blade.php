@extends('property.layout')

@section('cabecalho')
    Cadastrar Imóvel
@endsection

@section('conteudo')
    <form method="post" action="{{route('properties.store')}}">
        @csrf
        <div class="row">
            <div  class="col col">
                <label for="nome" >Título</label>
                <input type="text" name="title" id="title" class="form-control">

            </div>
            <div  class="col col-4">
                <label for="nome" >Descrição</label>
                <input type="text" name="description" id="description" class="form-control">

            </div>
            <div  class="col col-4">
                <label for="nome" >Valor Aluguel</label>
                <input type="decimal" name="rental_price" id="rental_price" class="form-control">

            </div>
            <div  class="col col-4">
                <label for="nome" >Valor de Venda</label>
                <input type="decimal" name="sale_price" id="sale_price" class="form-control">

            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-lg">Adicionar</button>
    </form>
@endsection
