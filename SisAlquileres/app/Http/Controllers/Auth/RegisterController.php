<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'apellidoP' => 'required|string|max:255',
            'apellidoM' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tu_modelos,email', // Ajusta 'tu_modelos' al nombre de tu tabla
            'ci' => 'required|string|max:20|unique:tu_modelos,ci', // Ajusta 'tu_modelos' al nombre de tu tabla
            'estado' => 'required|in:activo,inactivo,pendiente',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $request->name,
            'apellidoP' => $request->apellidoP,
            'apellidoM' => $request->apellidoM,
            'email' => $request->email,
            'ci' => $request->ci,
            'estado' => $request->estado,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'password' => Hash::make($request->password), // Hash de la contraseña antes de guardar
        ]);
    }
}
