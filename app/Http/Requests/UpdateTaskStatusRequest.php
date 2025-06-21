<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:Pending,In Progress,Done',
        ];
    }
}
