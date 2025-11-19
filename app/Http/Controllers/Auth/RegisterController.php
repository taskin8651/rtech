<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * VALIDATION RULES
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number'       => ['nullable', 'string', 'max:20'],
            'address'      => ['nullable', 'string', 'max:255'],
            'education'    => ['nullable', 'string', 'max:255'],
            'locale'       => ['nullable', 'string', 'max:10'],
            'bio'          => ['nullable', 'string', 'max:1000'],

            'profile_photo' => ['nullable', 'image', 'max:2048'], // 2MB limit

            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * CREATE USER + UPLOAD PROFILE PHOTO
     */
    protected function create(array $data)
    {
        // Step 1: Create User
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'number'    => $data['number'] ?? null,
            'address'   => $data['address'] ?? null,
            'education' => $data['education'] ?? null,
            'locale'    => $data['locale'] ?? null,
            'bio'       => $data['bio'] ?? null,
            'password'  => Hash::make($data['password']),
        ]);

        // Step 2: Upload Profile Photo (if exists)
        if (request()->hasFile('profile_photo')) {
            $user->addMedia(request()->file('profile_photo'))
                 ->toMediaCollection('user_profile_photo');
        }

        return $user;
    }
}
