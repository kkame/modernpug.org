<?php

namespace App\Http\Requests\Web\Mypage\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\User\Exceptions\UserPolicyException;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        /**
         * @var User
         */
        $user = auth()->user();

        $result = $user->can('view', User::class);

        if (! $result) {
            throw new UserPolicyException('사용자를 조회 할 권한이 없습니다');
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
            //
        ];
    }
}
