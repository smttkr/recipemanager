<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\category;

class RecipeRequest extends FormRequest
{
  public function __construct()
  {
    $this->user = Auth::user();
    $this->shop = $this->user->shopUser->shop;
  }

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
      'name' => ['filled', 'string', 'max:20', Rule::unique('recipes', 'name')
        ->where(function ($query) {
          $query->where('shop_id', 1);
        })],
      'category' => ['filled', new Category],
      'image' => 'required|image',
      'description' => 'filled',
    ];
  }

  public function messages()
  {
    return [
      'name.filled' => '料理名を入力されていません',
      'name.string' => '料理名は文字で入力されていません',
      'name.unique' => 'その料理名はすでに存在します',
      'name.max' => '料理名は最大20文字で入力されていません',
      'category.filled' => 'カテゴリを選択されていません',
      'image.required' => '画像を選択されていません',
      'image.image' => '画像には画像ファイルを選択されていません',
      'description.filled' => '内容を入力されていません',
    ];
  }
}
