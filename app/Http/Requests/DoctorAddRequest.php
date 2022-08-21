<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorAddRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function commonRules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'image' => ['required'],
        ];
    }

    protected function storeRules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'image' => ['required'],
        ];
    }

    protected function updateRules(): array
    {
        return [

        ];
    }

    public function rules(): array
    {
        $methodRules = $this->isMethod('POST') ? $this->storeRules() : $this->updateRules();
        return array_merge($this->commonRules(), $methodRules);
    }
}
