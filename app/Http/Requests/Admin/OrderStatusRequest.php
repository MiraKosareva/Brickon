<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->is_admin;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:pending,processing,completed,cancelled',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Статус обязателен',
            'status.in' => 'Недопустимый статус заказа',
        ];
    }
}
