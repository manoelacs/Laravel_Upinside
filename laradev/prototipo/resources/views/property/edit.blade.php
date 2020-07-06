@extends('property.layout')

@section('cabecalho')
    Editar Imóvel
@endsection

@section('conteudo')
    <form method="post" action="{{route('properties.update', $property)}}">
        @csrf
        @method('PUT')

        <div class="row">
            <div  class="col col">
                <label for="nome" >Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $property->title }}">

            </div>
            <div  class="col col-4">
                <label for="nome" >Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$property->description}}</textarea>

            </div>
            <div  class="col col-4">
                <label for="nome" >Valor Aluguel</label>
                <input type="decimal" name="rental_price" id="rental_price" class="form-control" value = "{{$property->rental_price}}">

            </div>
            <div  class="col col-4">
                <label for="nome" >Valor de Venda</label>
                <input type="decimal" name="sale_price" id="sale_price" class="form-control"  value = "{{$property->sale_price}}">

            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-lg">Atualizar</button>
    </form>
@endsection
