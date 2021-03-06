<?php

namespace App\Http\Requests\Web\Mypage\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\User\Exceptions\UserPolicyException;

class RestoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $routeUser = User::onlyTrashed()->findOrFail($this->route('user'));

        /**
         * @var User
         */
        $user = auth()->user();
        $result = $user->can('restore', $routeUser);

        if (! $result) {
            throw new UserPolicyException('사용자를 복구 할 권한이 없습니다');
        }

        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
