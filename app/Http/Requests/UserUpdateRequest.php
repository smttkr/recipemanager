<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
      'name' => 'filled|string|max:6',
      'profile_image' => 'filled|image'
    ];
  }

  public function message()
  {
    return [
      'name.filled' => '名前を入力してください',
      'name.string' => '名前には、文字を入力してください',
      'name.max' => '名前は６文字以内で入力してください',
      'profile_image.filled' => '画像を選択してください',
      'profile_image.image' => '画像ファイルを選択してください',
    ];
  }
}
