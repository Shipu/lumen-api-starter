<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Auth Service.
     *
     * @var \App\Services\AuthService
     */
    private $auth;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\AuthService $auth
     */
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Authenticate a user against email and password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $token = $this->auth->authenticate($request->only('email', 'password'));

        return response()->json(compact('token'));
    }

    /**
     * Refresh an expired token.
     *
     * @return \Illuminate\Http\Response
     */
    public function refresh()
    {
        $token = $this->auth->refresh();

        return response()->json(compact('token'));
    }

    /**
     * Invalidate a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $this->auth->invalidate();

        return response(null, 204);
    }

    /**
     * Get the current authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentUser()
    {
        $user = $this->auth->user();

        return response()->json($user);
    }
}
