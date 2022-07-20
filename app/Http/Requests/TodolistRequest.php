<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodolistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == "/")
        {
            return true;
        }
        else if($this->path() == "add")
        {
            return true;
        }
        else if($this->path() == "update")
        {
            return true;
        }
        else if($this->path() == "remove")
        {
            return true;
        }
        else if($this->path() == "find")
        {
            return true;
        }
        /*else if(strpos($this->path(),"todo") == 0)
        {
            if($this->path() == "todo/find")
            {
                return true;
            }
            else if($this->path() == "todo/search")
            {
                return true;
            }
            else if($this->path() == "todo/update")
            {
                return true;
            }
            else if($this->path() == "todo/remove")
            {
                return true;
            }
        }*/
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'todo_memo' => 'string| max:40 |required'
        ];
    }
}
