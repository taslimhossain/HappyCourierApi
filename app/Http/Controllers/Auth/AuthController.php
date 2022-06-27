<?php

namespace App\Http\Controllers\Auth;

use App\Http\Traits\Helpers\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RecoverRequest;
use App\Http\Requests\Auth\ResetRequest;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Str;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request)
    {
        $request->validated();

        $loginType = $request->loginFieldType();

        if( $loginType === 'email' ){
            $credentials = [
                'email' => $request->get('login'),
                'password' => $request->get('password'),
            ];
        } else {
            $credentials = [
                'mobile_no' => $request->get('login'),
                'password' => $request->get('password'),
            ];
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;
            return response()->json(['token' => $token, 'user' => new UserResource($user)]);
        }
        return $this->errorResponse('These credentials do not match our records, or the user is disabled', Response::HTTP_NOT_ACCEPTABLE );
    }

    public function register(RegisterRequest $request)
    {

        $request->validated();
        $user            = new User();
        $user->name      = $request->get('name');
        $user->mobile_no = $request->get('mobile_no');
        $user->email     = $request->get('email');
        $user->password  = bcrypt($request->get('password'));
        $user->save();

        $token = $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;
        return response()->json(['token' => $token, 'user' => new UserResource($user)]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->currentAccessToken()->delete();
            return response()->json(['message' => __('You have been successfully logged out!')]);
        }
        return response()->json(['message' => __('You have to login first')]);
    }

    public function user(Request $request)
    {
        return $this->successResponse( new UserResource(Auth::user()));
    }

    public function recover(RecoverRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->get('email'))->first();
        if (!$user) {
            return $this->errorResponse('The email entered is not registered', Response::HTTP_NOT_ACCEPTABLE);
        }

        $token = Str::random(60);
        DB::table('password_resets')->where('email', $request->get('email'))->delete();
        DB::table('password_resets')->insert(['email' => $request->get('email'), 'token' => $token, 'created_at' => Carbon::now()]);
        // send email or sms
        return $this->successResponse('An email has been sent with a link to reset the password');
    }

    public function reset(ResetRequest $request)
    {
        $request->validated();

        $tokenData = DB::table('password_resets')->where('token', $request->get('token'))->first();
        if ($tokenData) {

            $user = User::where('email', $tokenData->email)->first();
            if (!$user) {
                return $this->errorResponse('The email entered is not registered', Response::HTTP_NOT_ACCEPTABLE);
            }
            $user->password = bcrypt($request->get('password'));
            if (is_null($user->email_verified_at)) {
                $user->email_verified_at = Carbon::now();
            }
            $user->save();

            DB::table('password_resets')->where('email', $user->email)->delete();
            $user = Auth::loginUsingId($user->id);
            $token = $user->createToken(Str::slug(config('app.name').'_auth_token', '_'))->plainTextToken;
            return response()->json(['token' => $token, 'user' => new UserResource($user)]);
        }

        return $this->errorResponse('Sorry invalid Token!', Response::HTTP_NOT_ACCEPTABLE);
        # code...
    }

    public function show(Request $request)
    {
    
        if( $request->get('email') ){
            $user = User::where('email', $request->get('email'))->first();
            $responseData = ['users' => new UserResource($user)];
            return $this->successResponse($responseData);
        }
        
        $user = User::all();
        $responseData = ['users' => UserResource::collection($user)];
        return $this->successResponse($responseData);
    }

    public function db(Request $request)
    {

        // $token = Str::random(60);
        // dd($token);

        //$userTable = \Illuminate\Support\Facades\DB::table('users')->get()->all();
        //$userTable = \Illuminate\Support\Facades\DB::table('personal_access_tokens')->get()->all();
        $userTable = \Illuminate\Support\Facades\DB::table('password_resets')->get()->all();
        //$userTable = \Illuminate\Support\Facades\DB::table('failed_jobs')->get()->all();
        dd($userTable);

        $user = Auth::user();
        dd($user->tokens);
        foreach ($user->tokens as $token) {
            //
        }

    }
}
