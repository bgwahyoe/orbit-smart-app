<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\MataKuliah;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Mata kuliah default
        $mataKuliahDefault = [
            [
                'nama' => 'Cyber Security',
                'kode' => 'CS101',
                'sks' => 3,
            ],
            [
                'nama' => 'Data Mining',
                'kode' => 'DM102',
                'sks' => 3,
            ],
            [
                'nama' => 'Struktur Data',
                'kode' => 'SD103',
                'sks' => 3,
            ],
            [
                'nama' => 'Sistem Operasi',
                'kode' => 'SO104',
                'sks' => 3,
            ],
            [
                'nama' => 'Jaringan Komputer',
                'kode' => 'JK105',
                'sks' => 3,
            ],
        ];

        foreach ($mataKuliahDefault as $mk) {
            MataKuliah::create([
                'user_id' => $user->id,
                'nama' => $mk['nama'],
                'kode' => $mk['kode'],
                'sks' => $mk['sks'],
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
