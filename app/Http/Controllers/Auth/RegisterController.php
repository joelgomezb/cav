<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use App\User;
use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'documento_identidad' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fecha_nacimiento' => 'required|string|max:255',
            'genero' => 'required|string|max:5',
            'telefono' => 'required|string|max:15',
            'celular' => 'required|string|max:15',
            'grado_instruccion' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'cod_empresa' => 'required|string|max:255',
            'contacto_facturacion' => 'required|string|max:255',
            'correo_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:15',
            'g-recaptcha-response' => 'required|captcha'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $fecha_nacimiento = new \DateTime($data['fecha_nacimiento']);
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'nacionalidad' => $data['nacionalidad'],
            'documento_identidad' => $data['documento_identidad'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'fecha_nacimiento' => $fecha_nacimiento->format('Y-m-d H:i:s'),
            'genero' => $data['genero'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'grado_instruccion' => $data['grado_instruccion'],
            'cargo' => $data['cargo'],
            'cod_empresa' => $data['cod_empresa'],
            'contacto_facturacion' => $data['contacto_facturacion'],
            'correo_contacto' => $data['correo_contacto'],
            'telefono_contacto' => $data['telefono_contacto'],
            'estatus' => '1',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function register(Request $request)
    {
      $input = $request->all();
      $validator = $this->validator($input);

      if ($validator->passes()) {

        $user = $this->create($input)->toArray();
        $user['link'] = str_random(30);

        DB::table('user_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);

        Mail::send('emails.activation', $user, function($message) use ($user){
            $message->to($user['email']);
            $message->subject('CAV - Activation Code');
        });

        return redirect()->to('login')->with('success', 'Hemos enviado el código de activación. Por favor revise su correo');
      }


      return back()->with('errors', $validator->errors());
    }

    public function activationCode($token)
    {
      $check = DB::table('user_activations')->where('token', $token)->first();

      if (!is_null($check)){
        $user = User::find($check->id_user);

        if ($user->is_activated == 1 ){
          return redirect()->to('login')->with('success', 'Usuario Actualmente Activo');
        }

        $user->update(['is_activated' => 1]);
        DB::table('user_activations')->where('token', $token)->delete();
        return redirect()->to('login')->with('success','Usuario Activo Correctamente');
      }
      return redirect()->to('login')->with('warning','Su Código de Confirmación en Inválido');
    }

    /*public function showRegistrationForm(Request $request){
      dd(User::find(1)->empresa);
    }*/

    public function empresas(Request $request)
    {
      $input = $request->all();
      return response()->json(Empresa::where('tipo', $input['cod_empresa'])->get()->toArray());
    }
}
