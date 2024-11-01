<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\UserProvider as UserProviderContract;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomUserProvider extends EloquentUserProvider implements UserProviderContract{
    public function retrieveById($identifier) {
        $model = $this->createModel();

        return $model->newQuery()->where($model->getAuthIdentifierName(), $identifier)->first();
    }

    public function retrieveByToken($identifier, $token) {
        $model = $this->createModel();

        $model = $model->where($model->getAuthIdentifierName(), $identifier)->first();

        if(! $model){
            return null;
        }

        $rememberToken = $model->getRememberToken();

        return $rememberToken && hash_equals($rememberToken, $token) ? $model : null;
    }

    public function updateRememberToken(UserContract $user, $token) {
        $user->setRememberToken($token);
        $timestamps = $user->timestamps;
        $user->timestamps = false;
        $user->save();
        $user->timestamps = $timestamps;
    }

    public function retrieveByCredentials(array $credentials) {
        if(empty($credentials) || (count($credentials) == 1) && array_key_exists("kh_matkhau", $credentials)) {
            return;
        }
        $query = $this->createModel()->newQuery();
        foreach($credentials as $key => $value) {
            if(!Str::contains($key, 'kh_matkhau')) {
                $query->where($key, $value);
            }
        }
        return $query->first();
    }

    public function validateCredentials(UserContract $user, array $credentials){
        $plain = $credentials['kh_matkhau'];
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
