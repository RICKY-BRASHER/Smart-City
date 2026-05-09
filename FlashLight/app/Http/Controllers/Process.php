<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\signalement;
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
        if (Auth::attempt($credentials, $remember)) { // Authentification réussie
            $request->session()->regenerate(); // Prévenir les attaques de session fixation
            $user = Auth::user();// Récupérer l'utilisateur connecté
            if ($user->role === 'admin') {
                return response()->json(['success' => true, 'redirect' => route('accueil')]);
            } else {
                return response()->json(['success' => true, 'redirect' => route('home')]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email ou mot de passe incorrect',
            ], 401);
        }
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
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
    public function offcode(Request $request)
    {
        $email = session('email_attente');
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->verification_code = null;
            $user->code_expires_at = null;
            $user->save();
            return response()->json([
                'success' => true,
                'message' => 'Code de vérification désactivé',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non trouvé',
            ], 404);
        }
    }

    public function sendsignalement(Request $request)
    {
        $request->validate([
            'categorie' => 'required',
            'description' => 'required',
            'title' => 'required',
            'quartier' => 'required',
            'adresse' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', // Validation pour les photos
        ], [
            'required' => 'remplissez tous les champs obligatoires',
            'photos.*.image' => 'Chaque fichier doit être une image',
            'photos.*.mimes' => 'Les photos doivent être au format jpeg, png, jpg ou gif',
            'photos.*.max' => 'Chaque photo ne doit pas dépasser 5MB',
        ]);

        $photopack = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $pack  = $photo->store('signalement_photos', 'public');// Stockage dans le dossier public/signalement_photos
                $photopack[] = $pack; // Ajouter le chemin de la photo au tableau photopack
            }
        }

        $signalement = new signalement();
        $signalement->id_categorie = $request->input('categorie');
        $signalement->titre = $request->input('title');
        $signalement->description = $request->input('description');
        $signalement->quartier = $request->input('quartier');
        $signalement->adresse = $request->input('adresse');
        $signalement->latitude = $request->input('latitude');
        $signalement->longitude = $request->input('longitude');
        $signalement->type_urgence = $request->input('urgence');
        $signalement->photo = $photopack; // Stocker le tableau de chemins dans la base de données
        $signalement->id_user = Auth::id()?? 1; // Utiliser l'ID de l'utilisateur connecté ou 1 par défaut pour les tests
        $signalement->save();
        return response()->json([
            'success' => true,
            'message' => 'Signalement envoyé avec succès',
        ]);
    }

    public function editprofil(Request $request)
    {
        $user = auth()->user();

        // 1. Vérifier si au moins un champ a changé
        if (
            $request->input('name') == $user->name &&
            $request->input('ville') == $user->adresse &&
            $request->input('telephone') == $user->telephone
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune modification n\'a été détectée.'
            ], 422); // On renvoie une erreur 422 (Unprocessable Entity)
        }
        $request->validate([
            'name' => 'required',
            'telephone' => 'required|numeric|digits_between:9,12|unique:users,telephone,' . auth()->id(),
            'ville' => 'required',
        ], [
            'required' => 'Ce champ est obligatoire',
            'telephone.unique' => 'Ce téléphone est déjà utilisé',
            'email.email' => 'Veuillez entrer une adresse email valide',
            'telephone.numeric' => 'Le numéro de téléphone doit être numérique',
            'telephone.digits_between' => 'Le numéro de téléphone doit comporter entre 9 et 12 chiffres',
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->adresse = $request->input('ville');
        $user->telephone = $request->input('telephone');
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour avec succès',
        ]);
    }
}
