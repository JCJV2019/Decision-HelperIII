<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function login()
    {
        return view('loginPage');
    }

    public function acceso(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:35',
            'password' => 'required|string|min:5|max:10'
        ]);

        $credentials = $request->only('email', 'password');
        // retorna booleano si esta este parametro y como está
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        } else {
            return back()->with("error", "Error en el Login!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = Auth::user();
        if ($userAuth->id == 1) {
            $users = User::all();
            return view('userListPage', ['users' => $users]);
        } else {
            return to_route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:35|unique:users',
            'password' => 'required|string|min:5|max:10'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'hEmail' => ['required', 'string', 'email', 'max:35', Rule::unique('users','email')->ignore($user->id, 'id')],
            'hName' => ['required', 'string', 'max:20', Rule::unique('users','name')->ignore($user->id, 'id')]
        ]);

        $campos = $request->only('hEmail','hName');
        $user->email = $campos['hEmail'];
        $user->name = $campos['hName'];

        $user->save();

        return back()->with(["updateSuccess" => "Registro modificado", "idUpdated" => $user->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with("destroySuccess", "Registro borrado");
    }
}
