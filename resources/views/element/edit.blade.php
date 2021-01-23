
<script type="text/javascript">

    function uploadImatge()
    {
        var id_mst_element = 13;
        var fileInput = document.getElementById('imatgeUpload');
        var file = fileInput.files[0];
        var formData = new FormData();
        formData.append('uploadImage', file);
        $.ajax({url: "changeImage", type: 'POST', data: formData, processData: false,
            success: function(result){
                $("#div1").html(result);
            }
        });
    }


</script>

@extends('viewbase')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1>Modificar Element</h1>
            <form method="post" action="{{ route('element.update', $element->id_mst_element) }}">
                @csrf
                <div class="form-group">
                    <label for="titol_element">Titol:</label>
                    <input type="text" class="form-control" name="titol_element" value={{ $element->titol_element }} />
                </div>
                <div class="form-group">
                    <label for="desc_element">Descripció:</label>
                    <input type="text" class="form-control" name="desc_element" value={{ $element->desc_element }} />
                </div>
                <div class="form-group">
                    <label for="html_element">Cos HTML:</label>
                    <textarea id="ckeditor" class="ckeditor form-control" rows="5" name="html_element">{!! $element->html_element!!}</textarea>
                </div>
                <div class="form-group">
                    <label for="date_element">Data:</label>
                    <input type="date" name="date_element"
                           value={{ $element->date_element }} >
                </div>
                <div class="form-group">
                    <div class="thumbnail">
                        <img id="imatge" src="{{ $element->path_imatge_element }}" alt="">
                        <div>
                            <label for="imatgeUpload" class="btn-xs btn btn-primary btn-block btn-outlined textmin">Canviar imatge</label>
                            <input type="file" id="imatgeUpload" name="imatge" accept="image/*" onchange="uploadImatge()" style="display: none">
                            <a href="{{ url("api/element/esborrarImatge/$element->id_mst_element") }}">Eliminar</a>
                        </div>
                    </div>
                </div>

                {{ method_field('PUT') }}
                <button type="submit" class="btn btn-primary">Modificar</button>
                <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
