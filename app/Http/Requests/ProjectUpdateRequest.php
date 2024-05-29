<?php
  
namespace App\Http\Requests;
  
use Illuminate\Foundation\Http\FormRequest;
  
class ProjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
  
    public function rules(): array
    {
        return [
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'technology' => 'required|string|max:255',
            'status' => 'required|string|in:completed,not_completed',
            'link' => 'required|url',
        ];
    }
}
