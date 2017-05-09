<?php

namespace App\Repositories;

use App\Mail\ActivationLink;
use App\Mail\ResetPasswordLink;
use App\User;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    public function activateAccount($token)
    {
        $user = $this->findBy('activation_token', $token);
        $user->active = 1;
        $user->activation_token = null;
        $user->save();
    }

    public function registerAccount($userRequest, $activationToken = null)
    {
        $user = $this->findBy('email', $userRequest['email']);
        if(is_null($activationToken)){
            if(is_null($user) || is_null($user->activation_token)){
                $activationToken = $this->issueActivationToken();
            }else{
                $activationToken = $user->activation_token;
            }
        }
        if(!is_null($user) && $user->account_confirmed){
            throw new BadRequestHttpException('Your account is activated');
        }
        if(is_null($user)){
            $this->create(array_merge($userRequest, ['activation_token' => $activationToken]));
        }else{
            $user->activation_token = $activationToken;
            $user->save();
        }
        Mail::to($userRequest['email'])->queue(new ActivationLink($activationToken, $userRequest['first_name']));
    }


    public function sendResetPasswordLink($email, $token = null)
    {
        $user = $this->findBy('email', $email);
        if(is_null($token)){
            if(is_null($user->password_reset_token)){
                $token = $this->issuePasswordResetToken();
            }else{
                $token = $user->password_reset_token;
            }
        }
        $user->password_reset_token = $token;
        $user->save();

        Mail::to($email)->queue(new ResetPasswordLink($token, $user->first_name));
    }

    public function resetPassword($token, $newPassword)
    {
        $user = $this->findBy('password_reset_token', $token);
        $user->password = $newPassword;
        $user->password_reset_token = null;
        $user->save();
        return $user;
    }


    public function issueActivationToken()
    {
        return $this->issueUniqueToken('activation_token');
    }

    public function issuePasswordResetToken()
    {
        return $this->issueUniqueToken('password_reset_token');
    }

    private function issueUniqueToken($column)
    {
        do{
            $activationToken = str_random(32);
            $user = $this->findBy($column, $activationToken);
        }while(!is_null($user));
        return $activationToken;
    }
}