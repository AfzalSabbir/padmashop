<?php
namespace App\Helpers;

class ImageEncoder
{

  public static function upload($base64_image, $uploaded_path, $new_name="") 
  {
    // return json_encode(['test' => 1]);
    $img = $base64_image;

    //remove extra parts
    $exploded =  explode(",", $img);

    //Extension
    if (str_contains($exploded[0], 'gif')) {
      $ext = 'gif';
    } else if (str_contains($exploded[0], 'jpg')) {
      $ext = 'jpg';
    } else if (str_contains($exploded[0], 'png')) {
      $ext = 'png';
    } else if (str_contains($exploded[0], 'jpeg')) {
      $ext = 'jpeg';
    }

    // Decode
    $decoded_data = base64_decode($exploded[1]);

    if ($new_name != "" || $new_name != NULL) {
      $file_name = $new_name. ".".$ext;
    }else{
      $file_name = time(). ".".$ext;
    }
    

    // Local folder path
    $path = public_path() . "/". $uploaded_path .'/'.$file_name;

    // Upload
    if (file_put_contents($path, $decoded_data)) {
      return $file_name;
    }else{
      return NULL;
    }
    
  }


}
