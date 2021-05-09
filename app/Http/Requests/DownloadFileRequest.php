<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class DownloadFileRequest extends FormRequest
{
    public function downloadFile($path)
    {
        $fileName = "$id.pdf";
        if (Storage::disk('restrict_files')->missing($fileName)) {
            // 如果沒找到那個檔案做甚麼
            return abort(404);
        } else {
            return Storage::idsk('restrict_files')->download($fileName);
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //改成true才驗證成功
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
