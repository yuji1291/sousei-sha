<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class TestRequest extends FormRequest
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
        'title' => ['required' ,'max:20'],
        'start_date' => ['required'],
        'start_time' => ['required'],
        'end_date' => ['required'],
        'end_time' => ['required',function($attribute, $value, $fail) {
        $start_datetime = Carbon::parse($this->start_date.' '.$this->start_time);
        $end_datetime = Carbon::parse($this->end_date.' '.$this->end_time);
        if ($end_datetime <= $start_datetime) {
          $fail('終了日時は開始日時より後にしてください');
        }
      },
    ],
        'place' => ['required' ,'max:20'],
        'content' => ['required' ,'max:191'],
        ];
    }
    public function messages()
{
    return [
        
        'title.required' => 'タイトルは必須です',
        'title.max:20' => 'タイトルは20字以内で入力して下さい',
        'start_date.required' => '開始日を指定下さい',
        'start_time.required' => '開始時間を指定下さい',
        'end_date.required'  => '終了日を指定下さい',
        'end_time.required' => '終了時間を指定下さい',
        'place.required' => '場所は必須です',
        'place.max:20' => '場所は20字以内で入力して下さい',
        'content.required' => 'タスクは必須です',
        'content.max:191' => 'タスク内容は191字以内で入力して下さい',
        
    ];
}
}
