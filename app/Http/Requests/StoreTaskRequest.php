<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'status' => 'nullable|in:Pending,In Progress,Done',
            'due_date' => 'nullable|date',
        ];
    }
}
