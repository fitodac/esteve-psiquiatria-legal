<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait SaveFileTrait {

    public function saveImage($image, $folder) {
        $img = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $image));
        $type = explode(';', $image)[0];
        $type = explode('/', $type)[1];
        $imageName = Str::random(10).'.'.$type;
        $path = storage_path('/app/public/'.$folder.'/');

        file_put_contents($path.$imageName, $img);

        return asset(Storage::disk('public')->url($folder.'/'.$imageName));
    }

    public function saveFile($file, $folder) {
        $img = base64_decode(preg_replace('/^data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+);base64,/', '', $file));
        $type = explode(';', $file)[0];
        $type = explode('/', $type)[1];
        $name = Str::random(10).'.'.$type;
        $path = storage_path('/app/public/'.$folder.'/');

        file_put_contents($path.$name, $img);

        return asset(Storage::disk('public')->url($folder.'/'.$name));
    }

    public function saveFileStorage($file, $folder) {
        $img = base64_decode(preg_replace('/^data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+);base64,/', '', $file));
        $type = explode(';', $file)[0];
        $type = explode('/', $type)[1];
        $name = Str::random(10).'.'.$type;
        $path = storage_path('/app/'.$folder.'/');

        file_put_contents($path.$name, $img);

        return $path.$name;
    }
}
