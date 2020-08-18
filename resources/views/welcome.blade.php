<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <!-- Styles -->
    </head>
    <body>
        <div class="position-ref full-height">

            <div class="content">
                <div class="title margin m-b-md">
                    War League Random Extractor
                </div>

                <div class="subtitle m-b-md">
                    Seleziona i membri che partecipano all'estrazione:
                </div>

                <div class="members">
                    <form id="extract" method="post" action="/extract">
                        @csrf
                    @foreach($members as $member)
                           <div class="block">
                            <div class="input">{{$member}}</div>
                            <input type="checkbox" id="{{ $member }}" name="members[]" value="{{ $member }}" checked>
                            <label class="" for="{{ $member }}"></label><br>
                           </div>
                    @endforeach
                    </form>
                    </div>
                <div class="padding-30">
                        <label class="input" for="number">Quanti membri vuoi estrarre?</label>
                        <input id="number" min="1" name="number" class="padding-10 borders-3" form="extract" type="number" value="1" required><br>
                        <button form="extract" class="submit" type="submit" name="submit"><img src="/img/estrai.png" width=auto height="60" alt="submit" /> </button>
                </div>
            </div>
        </div>
    </body>
</html>
