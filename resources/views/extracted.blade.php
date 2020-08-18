<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="css/main.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    War League Random Extractor
                </div>

                <div class="subtitle m-b-md">
                    Le medaglie vanno a...
                </div>

                <div class="">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($extracted as $member)
                        @php
                            $i +=1;
                        @endphp
                        <div class="input block">{{$i. ". ". $member}}</div>
                    @endforeach
                    </div>
                
                <form class="inline-block" action="/extract" method="post">
                    @csrf
                    <button class="submit padding-10 inline-block" onClick="window.location.reload();"><img src="/img/estraidinuovo.png" width=auto height="60" alt="submit" /> </button>
                    @foreach($members as $member)
                    <input type="hidden" name="members[]" value="{{$member}}"/>
                    @endforeach
                    <input type="hidden" name="number" value="{{$quantity}}"/>
                </form>
                
                <form class="inline-block" action="/" method="get">
                    @csrf
                    <button type="submit" class="submit padding-10 inline-block"><img src="/img/tornaindietro.png" width=auto height="60" alt="submit" /></button>
                </form>
            </div>
        </div>
    </body>
</html>
