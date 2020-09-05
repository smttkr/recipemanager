<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\Category;

class RecipeUpdateRequest extends FormRequest
{
  public function __construct()
  {
    $this->user = Auth::user();
    $this->shop = $this->user->shopUser->shop;
  }
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
      "name" => ["required", "string", "max:20", Rule::unique("recipes", "name")
        ->ignore($this->recipe)
        ->where(function ($query) {
          $query->where("shop_id", $this->user->shopUser->id);
        })],
      "category" => ["required", new Category],
      "image" => "file|max:4000|image",
      "description" => "required|max:2000",
    ];
  }
  public function messages()
  {
    return [
      "name.required" => "料理名は必須です。",
      "name.string" => "料理名は文字列を入力してください。",
      "name.unique" => "その料理名はすでに存在します。",
      "name.max" => "料理名は20文字以内で入力してください。",
    ];
  }
}
