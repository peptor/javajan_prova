@extends('viewbase')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 align="center">lista d'elements</h1>
            <div>
                <a href="{{ route('element.create')}}" class="btn btn-primary">Nou element</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Titol</td></b>
                    <td>Descripció</td></b>
                </tr>
                </thead>
                <tbody>
                @foreach($elements as $element)
                    <tr>
                        <td>{{$element->titol_element}}</td>
                        <td>{{$element->desc_element}}</td>
                        <td>
                            <a href="{{ route('element.edit',$element->id_mst_element)}}" class="btn btn-primary">Modificar</a>
                        </td>
                        <td>
                            <form action="{{ route('element.destroy', $element->id_mst_element)}}" method="post">
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
