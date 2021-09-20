<?php

namespace App\Http\Requests\Mypage\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $myEmail = Auth::user()->email;
        return [
            'avatar' => ['file', 'image'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique('users', 'email')->whereNot('email', $myEmail)],
        ];
    }
}
