<?php

namespace App\Http\Requests;

use App\Models\employee;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class storepostrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //  $post =  Post::find($this->route(''));
        //  echo ($post);
        //  return $post && $this->user()->can('update', $this->post);
        return true;
        //  print_r($this->post());
         
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'description' => 'required|max:500',
        ];
    }
}
