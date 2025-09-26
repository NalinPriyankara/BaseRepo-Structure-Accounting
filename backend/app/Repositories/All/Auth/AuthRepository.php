<?php

namespace App\Repositories\All\Auth;

use App\Models\UserManagement;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository extends BaseRepository implements AuthInterface
{
    public function __construct(UserManagement $model)
    {
        parent::__construct($model);
    }

    public function login(array $credentials): ?array
    {
        $user = $this->model->where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if ($user->status !== 'active') {
            return [
                'error' => true,
                'message' => 'Your account is not active',
                'status' => 403
            ];
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function logout(UserManagement $user): bool
    {
        $user->tokens()->delete();
        return true;
    }
}