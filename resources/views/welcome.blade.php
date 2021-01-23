<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prova 1</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Llista d'elements
                </div>
                @foreach($elements as $element)
                    <div class="row">
                        <div class="col-sm-2">
                            <b>{{$element->titol}}</b>
                        </div>
                        <div class="col-sm-6">
                            <b>{{$element->descripcio}}</b>
                        </div>
                    </div>
            </div>

        </div>
    </body>
</html>
