<?php

namespace App\Helper ;

class Photo {

    public static function create($request , $folderName){
        if($request->has('photo')){
            $photo = $request->file('photo');
            $path = $photo->store($folderName , ['disk' => 'public']);
            return $path;
        }
    }



}
