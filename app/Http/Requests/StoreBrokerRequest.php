<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrokerRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'name' => ['required', 'max:255'],
      'address' => ['required', 'max:255'],
      'city' => ['required'],
      'zip_code' => ['required'],
      'phone_number' => ['required', 'numeric', 'digits:10'],
      'logo_path' => ['required']
    ];
  }
}
