@extends('property.layout')

@section('cabecalho')
    Listagem de Imóveis
@endsection

@section('conteudo')

<p><a href="{{ route('properties.create')}}" class="btn btn-primary"> Cadastrar novo imóvel</a></p>

    @if(!empty($properties))
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Valor Aluguel</th>
                    <th scope="col">Valor de Venda</th>
                    <th scope="col">Ações </th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <th scope="row"> {{$property->title}}</th>
                        <td>{{ number_format($property->rental_price, 2,  ',', '.')}}</td>
                        <td> {{ number_format($property->sale_price, 2,  ',', '.')}}</td>
                        <td>
                            <a href="{{route('properties.edit', $property->id)}}" class="btn btn-primary btn-sm .mr-3" > <i class="fas fa-external-link-alt mr-3 ."></i>Editar</a>

                            <a href="javascript:deleteProperty({{$property->id}})"   class="btn btn-danger btn-sm" type ="submit">
                                    <i class="fas fa-trash-alt"></i>Excluir
                            </a>
                            
                            <form method="post"  id="delete-{{$property->id}}" action="{{route('properties.delete', $property->id)}}" style= "display:none">
                                @csrf
                                @method('DELETE') 
                                
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
@push('js')
    <script>
        function deleteProperty(id){
            document.getElementById('delete-'+ id).submit();
        }
    </script>

@endpush

