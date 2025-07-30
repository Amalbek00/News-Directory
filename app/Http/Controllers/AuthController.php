<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $service;
    public function __construct(AuthService $service) {
        $this->service = $service;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->service->login(
            $request->input('email'),
            $request->input('password'));
     }

}
