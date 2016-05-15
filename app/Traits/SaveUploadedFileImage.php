<?php
namespace App\Traits;

trait SaveUploadedFileImage
{

    private function isAUploadedFile($value){ return is_a($value,'Illuminate\Http\UploadedFile'); }

    public function setFileAttribute($file)
    {
        if ( $this->isAUploadedFile($file) ) {
            $extension = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $file->move('uploads', $fileName);
            $this->attributes['file'] = $fileName;
        }
    }
}

