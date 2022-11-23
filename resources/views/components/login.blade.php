<div class="w-52 h-auto mt-14 mx-auto border border-gray-200 rounded shadow-lg">
    <h1 class="text-xl font-medium mt-5 ml-8">Login Page</h1>

    <form action="{{ route('users.acceso') }}" method="post">
        @csrf

        <div class="w-full py-1 px-3">
            <label class="tracking-wide text-amber-500 text-xs font-medium pl-1" for="email">
              Email
            </label>
            <input class="w-full border-b-2 text-sm text-gray-500 p-1 borde-focus" id="email" name="email" type="email" autofocus placeholder="Email"
                value="{{ old('email') }}">
            @error('email')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
        </div>


        <div class="w-full py-1 px-3">
            <label class="tracking-wide text-amber-500 text-xs font-medium pl-1" for="password">
              Password
            </label>
            <input class="w-full text-sm border-b-2 text-gray-500 p-1 borde-focus" id="password" name="password" type="password" placeholder="Password">
            @error('password')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
        </div>

        <label class="tracking-wide text-amber-500 text-xs font-medium pl-2" for="remember">
            <input type="checkbox" name="remember">
            Recuerda sesión
        </label>

        @if (\Session::has('error'))
            <div class="py-1 px-3 text-red-500 text-xs italic">
                {!! \Session::get('error') !!}
            </div>
        @endif

        <div class="my-2 grid place-content-end">
            <div class="w-full px-3">
              <button type="submit" class="bg-amber-500 font-medium text-sm text-white py-2 px-4 border-gray-500 rounded borde-focus">
                Login
              </button>
        </div>
    </form>
</div>
