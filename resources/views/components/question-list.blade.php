<div class="container">
    <h1 class="m-4 text-4xl font-medium text-center">Preguntas del Usuario "{{ $userAuth->name }}"</h1>

    <form action="{{ route('questions.update', ['question' => '**QUESTION_ID**']) }}" method="POST" id="formQuestionList" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="hQuestion" name="hQuestion">
    </form>
    <div class="items-center">
        @foreach ($questions as $question)
            <div class="w-full py-1 px-3">
                <input class="w-full border-b-2 text-base text-gray-500 p-1 borde-focus" type="text" placeholder="Descripción..."
                    id="{{ 'question' . $question->id }}" value="{{ $question->question }}">
            </div>

            <div class="flex justify-end mr-3">
                @if (\Session::has('updateSuccess') and Session::get('idUpdated') == $question->id)
                    <div class="pr-3 text-gray-500 text-sm italic">
                        {!! \Session::get('updateSuccess') !!}
                    </div>
                @endif
                <button class="mr-2 text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                    onclick="updateQuestion('{{ $question->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </button>
                <button class="mr-2 text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                    onclick="destroyQuestion('{{ $question->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                    onclick="window.location.href = '{{ route('itemsQuestion.show', ['question' => $question->id]); }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <br>
        @endforeach
        <div class="flex justify-end mr-3">
            <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                onclick="window.location.href = '{{ route('itemsQuestion.show'); }}'">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <br>
        @if (\Session::has('destroySuccess'))
            <div class="pr-3 text-gray-500 text-sm italic">
                {!! \Session::get('destroySuccess') !!}
            </div>
        @endif
    </div>
</div>
