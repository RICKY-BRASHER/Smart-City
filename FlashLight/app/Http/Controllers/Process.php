<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
class Process extends Controller
{
    public function inscription(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:9,12|unique:users,telephone', // On vérifie l'unique ici !
            'ville' => 'required',
            'password' => 'required|min:8|confirmed', // 'confirmed' cherche 'password_confirmation'
        ], [
            'required' => 'Ce champ est obligatoire',
            'email.unique' => 'Cet email est déjà utilisé',
            'phone.unique' => 'Ce téléphone est déjà utilisé',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'phone.numeric' => 'Le numéro de téléphone doit être numérique',
            'phone.digits_between' => 'Le numéro de téléphone doit comporter entre 9 et 12 chiffres',
            'password.confirmed' => 'Les mots de passe ne correspondent pas',
        ]);

        $code = rand(100000, 999999);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->adresse = $request->input('ville');
        $user->telephone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->verification_code = $code;
        $user->code_expires_at = now()->addMinutes(5); // Le code expire dans  minutes   
        $user->save();
        session(['email_attente' => $user->email]); // Stocker l'email dans la session pour l'utiliser lors de la vérification du code
        Mail::to($user->email)->send(new VerificationCodeMail($code));
        return response()->json([
            'success' => true,
            'redirect' => route('verif_code'),
        ]);
    }

    public function connexion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'required' => 'Ce champ est obligatoire',
            'email.email' => 'Veuillez entrer une adresse email valide',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'redirect' => route('welcome'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email ou mot de passe incorrect',
            ], 401);
        }
    }
    public function verifycode(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ], [
            'required' => 'Ce champ est obligatoire',
            'code.digits' => 'Le code doit comporter 6 chiffres',
        ]);
        $email = session('email_attente');
        $user = User::where('email', $email)->where('verification_code', $request->input('code'))->first();
        if ($user) {
            if($user->code_expires_at > now()) {
                $user->email_verified_at = now();
                $user->verification_code = null;
                $user->code_expires_at = null;
                $user->save();
                session()->forget('email_attente');
                return response()->json([
                    'success' => true,
                    'redirect' => route('connexion'),
                ]);
            } else {
                $user->verification_code = null;
            $user->code_expires_at = null;
                return response()->json([
                    'success' => false,
                    'message' => 'Le code a expiré, veuillez demander un nouveau code',
                ], 400);
            }
        } else if(User::where('email', $email)->where('code_expires_at', '<', now())->exists()) {
            $user->verification_code = null;
            $user->code_expires_at = null;
            return response()->json([
                'success' => false,
                'message' => 'Le code a expiré, veuillez demander un nouveau code',
            ], 400);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Code de vérification incorrect',
            ], 400);
            
        }
    }

    public function renvoyercode(Request $request)
    {
        $email = session('email_attente');
        $user = User::where('email', $email)->first();
        if ($user) {
            $code = rand(100000, 999999);
            $user->verification_code = $code;
            $user->code_expires_at = now()->addMinutes(5);
            $user->save();
            Mail::to($user->email)->send(new VerificationCodeMail($code));
            return response()->json([
                'success' => true,
                'message' => 'Code de vérification renvoyé',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non trouvé',
            ], 404);
        }
    }
}
