<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApprovalStagesRequest extends FormRequest
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
        return [
            'approver_id' => 'required|exists:approvers,id',
        ];
    }

    public function messages()
    {
        return [
            'approver_id' => 'The approver_id field is required'
        ];
    }

    public function approve()
    {
        return [
            'approver_id' => $this->approver_id
        ];
    }
}
