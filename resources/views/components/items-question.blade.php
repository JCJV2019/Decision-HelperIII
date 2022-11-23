<div class="container">
    <h1 class="m-4 text-4xl font-medium text-center">¿Que duda tienes?</h1>

    <form action="{{ route('itemQuestion.store') }}" method="POST" id="formItemQuestionStore" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="hUserId" name="hUserId" value={{ $userAuth->id }}>
        <input type="hidden" id="hIdQuestion" name="hIdQuestion" value={{ $question->id }}>
        <input type="hidden" id="hQuestion" name="hQuestion">
        <input type="hidden" id="hItemDesc" name="hItemDesc">
        <input type="hidden" id="hItemPoint" name="hItemPoint">
        <input type="hidden" id="hItemType" name="hItemType">
    </form>

    <form action="{{ route('itemQuestion.update',  ['item' => '**ITEM_ID**']) }}" method="POST" id="formItem" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="hhItemDesc" name="hhItemDesc">
        <input type="hidden" id="hhItemPoint" name="hhItemPoint">
    </form>

    <form action="{{ route('questions.destroy', ['question' => '**QUESTION_ID**']) }}" method="POST" id="formQuestionList" enctype="multipart/form-data">
        @csrf
    </form>

    <div class="w-full flex justify-center mt-16">
        <input class="w-3/4 text-sm text-gray-500 p-2 borde-focus {{is_null($question->id) ? '' : 'bg-gray-200'}}"
            type="text" name="question" id="question" placeholder="Pregunta..." {{is_null($question->id) ? '' : 'disabled'}}
            value="{{ is_null($question->question) ? old('hQuestion') : $question->question}}">

        <button class="text-white flex justify-center items-center w-9 h-9 outline-2 outline outline-amber-500 border-0 rounded-r {{is_null($question->id) ? 'bg-gray-200 outline-gray-100' : 'bg-amber-500' }}"
            onclick="destroyQuestion('{{ $question->id }}')" {{is_null($question->id) ? 'disabled' : ''}}>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        </button>
    </div>
    <br>
    <div class="w-full flex justify-center mt-4">
        @php $id = "1" @endphp
        <div class="w-11/12">
            <span>Descripción Aspecto:</span>
            @if ($errors->has('hQuestion') OR  $errors->has('hItemDesc') OR $errors->has('hItemPoint'))
                <div class="text-red-500 text-sm italic inline-block">TODOS LOS CAMPOS SON OBLIGATORIOS</div>
            @endif
            <input class="w-full my-3 text-sm text-gray-500 p-2 borde-focus"
                type="text" name="aspecto" id="aspecto" placeholder="Tu concepto...">
            <div class="min-w-max">
                <span class="ml-3">Asignar un valor</span>
                <label>
                    <input class="mx-1" type="radio" name="valorPuntos" value='1' id="valorPuntos01" checked
                        onchange="bindingPuntos(event)">
                </label>
                <label>
                    <input class="mx-1" type="radio" name="valorPuntos" value='2' id="valorPuntos02"
                        onchange="bindingPuntos(event)">
                </label>
                <label>
                    <input class="mx-1" type="radio" name="valorPuntos" value='3' id="valorPuntos03"
                        onchange="bindingPuntos(event)">
                </label>
                <label>
                    <input class="mx-1" type="radio" name="valorPuntos" value='4' id="valorPuntos04"
                        onchange="bindingPuntos(event)">
                </label>
                <span id="valorPuntos" class='m-1'>{{$id}}</span>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center">
        <div class="w-11/12 mt-4 inline-flex">
            <button class="p-2 w-full text-white bg-amber-500 mr-2 rounded"
                onclick="storeItemsQuestion('Positive')">
                Aspecto Positivo
            </button>
            <button class="p-2 w-full text-white bg-amber-500 ml-2 rounded"
                onclick="storeItemsQuestion('Negative')">
                Aspecto Negativo
            </button>
        </div>
    </div>
    <br>
    <div class="w-full flex justify-center">
        <div class="w-11/12 block text-center sm:flex sm:justify-around">
            <x-item-basic>
                <p class="mt-2 w-full text-3xl font-medium">Aspectos Positivos</p>
                @foreach ( $itemsPositives as $itemPositive )
                    <div class="flex justify-center">
                        <input class="w-full my-3 text-sm text-gray-500 p-2 mr-1 borde-focus" type="text"
                            id="{{ 'itemDescPositive' . $itemPositive->id }}" value="{{ $itemPositive->desc }}">
                        <input class="w-14 my-3 text-sm text-gray-500 p-2 borde-focus" type="number" min="1" max="4"
                            id="{{ 'itemPointPositive' . $itemPositive->id }}" value="{{ $itemPositive->point }}">
                    </div>
                    <div class="flex justify-end">
                        @if (\Session::has('updateSuccess') and Session::get('idUpdated') == $itemPositive->id)
                            <div class="pr-3 text-gray-500 text-sm italic">
                                {!! \Session::get('updateSuccess') !!}
                            </div>
                        @endif
                        <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10 mr-1"
                            onclick="updateItem('{{ $itemPositive->id }}', '{{ $itemPositive->type }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path
                                    d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                            </svg>
                        </button>
                        <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10 ml-1"
                            onclick="destroyItem('{{ $itemPositive->id }}', '{{ $itemPositive->type }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </x-item-basic>
            <x-item-basic>
                <p class="mt-4 w-full text-3xl font-medium">Aspectos Negativos</p>
                @foreach ( $itemsNegatives as $itemNegative)
                    <div class="flex justify-center">
                        <input class="w-full my-3 text-sm text-gray-500 p-2 mr-1 borde-focus" type="text"
                            id="{{ 'itemDescNegative' . $itemNegative->id }}" value="{{ $itemNegative->desc }}">
                        <input class="w-14 my-3 text-sm text-gray-500 p-2 borde-focus" type="number" min="1" max="4"
                            id="{{ 'itemPointNegative' . $itemNegative->id }}" value="{{ $itemNegative->point }}">
                    </div>
                    <div class="flex justify-end">
                        @if (\Session::has('updateSuccess') and Session::get('idUpdated') == $itemNegative->id)
                            <div class="pr-3 text-gray-500 text-sm italic">
                                {!! \Session::get('updateSuccess') !!}
                            </div>
                        @endif
                        <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10 mr-1"
                            onclick="updateItem('{{ $itemNegative->id }}', '{{ $itemNegative->type }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path
                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path
                                    d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                            </svg>
                        </button>
                        <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10 ml-1"
                            onclick="destroyItem('{{ $itemNegative->id }}', '{{ $itemNegative->type }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </x-item-basic>
        </div>
    </div>
    <br>
    @if (!is_null($question->id) AND (count(iterator_to_array($itemsPositives)) > 0 OR count(iterator_to_array($itemsNegatives)) > 0))
        <div class="w-full h-auto flex justify-center">
            <button class="text-white bg-amber-500 flex justify-center rounded h-10 px-2/5 w-2/5 text-3xl font-medium"
                onclick="window.location.href = '{{ route('questionTip.tip', ['question' => $question->id]); }}'">Consejo
            </button>
        </div>
    @endif
    <br>
</div>
