<?php

namespace App\Http\Requests\Web\Recruit;

use App\Services\Recruits\Exceptions\RecruitPolicyException;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $recruit = $this->route('recruit');

        /**
         * @var User $user
         */
        $user = auth()->user();

        $result = $user->can('update', $recruit);

        if (!$result)
            throw new RecruitPolicyException('채용공고를 수정 할 권한이 없습니다');

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
