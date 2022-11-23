<div class="container">
    <br>
    <div class="w-auto h-auto flex-col text-xl">
        <p class="text-3xl text-center">CONSEJO</p>
        <br>
        <p class="text-center">Coeficiente Positivos: {{$puntuacionP}}</p>
        <p class="text-center">Coeficiente Negativos: {{$puntuacionN}}</p>
    </div>
    <br>
    <div class="w-auto h-auto flex justify-center text-center">
        @switch($semaforo)
            @case("1")
                <div>
                    <img src={{asset('storage/img/dontdoit.gif')}} alt="Hazlo">
                    <p>Don't do it!</p>
                </div>
                @break
            @case("2")
                <div>
                    <img src={{asset('storage/img/idontnow.gif')}} alt="Hazlo">
                    <p>I don't know!</p>
                </div>
                @break
            @case("3")
                <div>
                    <img src={{asset('storage/img/justdoit.gif')}} alt="Hazlo">
                    <p>Just do it!</p>
                </div>
        @endswitch
    </div>
    <div class="inline-flex">
        <button class="text-white flex justify-center items-center w-9 h-9 outline-2 outline outline-amber-500 border-0 rounded bg-amber-500"
            onclick="window.location.href = '{{ route('itemsQuestion.show', ['question' => $question->id]); }}'">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
        </button>
    </div>
</div>
