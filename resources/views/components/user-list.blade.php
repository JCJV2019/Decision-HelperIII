<div class="container">
    <h1 class="m-4 text-4xl font-medium text-center">Mantenimiento de Usuarios</h1>

    <form action="{{ route('users.update', ['user' => '**USER_ID**']) }}" method="POST" id="formUserList" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="hEmail" name="hEmail">
        <input type="hidden" id="hName" name="hName">
    </form>

    <div class="items-center">
        @foreach ($users as $user)
            <div class="w-full py-1 px-3">
                <input class="w-full border-b-2 text-base text-gray-500 p-1 borde-focus" type="text" placeholder="Email"
                    id="{{ 'email' . $user->id }}" value="{{ $user->email }}">
            </div>

            <div class="w-full py-1 px-3">
                <input class="w-full border-b-2 text-base text-gray-500 p-1 borde-focus" type="text" placeholder="Name"
                    id="{{ 'name' . $user->id }}" value="{{ $user->name }}">

            </div>

            <div class="flex justify-end mr-3">
                @if (\Session::has('updateSuccess') and Session::get('idUpdated') == $user->id)
                    <div class="pr-3 text-gray-500 text-sm italic">
                        {!! \Session::get('updateSuccess') !!}
                    </div>
                @endif
                <button class="text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                    onclick="updateUser('{{ $user->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg>
                </button>
                @if ($user->id <> 1)
                    <button class="ml-2 text-white bg-amber-500 flex justify-center items-center rounded w-10 h-10"
                        onclick="destroyUser('{{ $user->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif
            </div>
            <br>
        @endforeach
        @if (\Session::has('destroySuccess'))
            <div class="pr-3 text-gray-500 text-sm italic">
                {!! \Session::get('destroySuccess') !!}
            </div>
        @endif
    </div>
</div>
