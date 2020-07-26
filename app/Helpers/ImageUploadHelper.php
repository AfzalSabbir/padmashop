<?php

namespace App\Helpers;

use Image;
use Request;
use File;

class ImageUploadHelper
{

  /**
  * [smartSingleImageUpload description]
  * @param  [type] $request         [Full Request]
  * @param  [type] $target_location [Upload Location]
  * @param  [type] $input_name      [Input Name]
  * @return [type] $real_name       [File Name]
  */
  public static function smartSingleImageUpload($request, $target_location, $input_name='image')
  {

    if (request::isMethod('post')) {
      $request->validate([
        "$input_name" => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
      ]);

      $random = rand(1111,9999);

      if ($random%2 == 0) {
        $base_name = $random.'_'.time();
      } else {
        $base_name = time().'_'.$random;
      }
      $file_name = preg_replace('/\s+/', '_', pathinfo($request->$input_name->getClientOriginalName(), PATHINFO_FILENAME));
      $file_extension = $request->$input_name->getClientOriginalExtension();
      $real_name = $base_name.'_'.$file_name.'.'.$file_extension;

      request()->$input_name->move($target_location, $real_name);

      return $real_name;
    }

  }
  public static function smartSingleImageUpdate($request, $target_location, $input_name='image', $old_file)
  {

    if (request::isMethod('post')) {
      $request->validate([
        "$input_name" => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
      ]);

      $random = rand(1111,9999);

      if ($random%2 == 0) {
        $base_name = $random.'_'.time();
      } else {
        $base_name = time().'_'.$random;
      }
      $file_name = preg_replace('/\s+/', '_', pathinfo($request->$input_name->getClientOriginalName(), PATHINFO_FILENAME));
      $file_extension = $request->$input_name->getClientOriginalExtension();
      $real_name = $base_name.'_'.$file_name.'.'.$file_extension;

      request()->$input_name->move($target_location, $real_name);
      
      if (file_exists($old_file)) {
        unlink($old_file);
      }
      return $real_name;
    }

  }

  /**
  * [upload description]
  * @param  [type] $image           [description]
  * @param  [type] $file            [description]
  * @param  [type] $slug            [description]
  * @param  [type] $target_location [description]
  * @return [type]                  [description]
  */
  public static function upload($image, $file, $name, $target_location, $width=500, $height=null)
  {
    if(Request::hasFile($image)){
      $filename = $name . '.' . $file->getClientOriginalExtension();
      $location = ($target_location.'/'.$filename);
      Image::make($file)->resize($width, $height)->save($location);
      return $filename;
    }
  }


  public static function update($image, $file, $name, $target_location, $old_location, $width=500, $height=null)
  {
    if(Request::hasFile($image)){
      $filename = $name. '.'.$file->getClientOriginalExtension();
      File::delete($old_location);
      $location = ($target_location.'/'.$filename);

      if($height === null){
        list($oldWidth, $oldHeight) = getimagesize($file); 
        $height = ($width/$oldWidth)*$oldHeight;
      }
      
      Image::make($file)->resize($width, $height)->save($location);
      return $filename;
    }
  }

  public static function update_no_resize($image, $file, $name, $target_location, $old_location, $width=500, $height=null)
  {
    if(Request::hasFile($image)){
      $filename = $name.'.'.$file->getClientOriginalExtension();
      $file->move($target_location, $filename);
      return $filename;
    }
  }

  public static function delete($target_location)
  {
    if (File::exists($target_location)) {
      File::delete($target_location);
    }
  }



  
  public static function uploadWithResize($image, $file, $name, $target_location, $width="128", $hieght=null)
  {
    if(Request::hasFile($image)){
      // $oldHeight = @read_exif_data($file)['COMPUTED']["Height"]; 
      // $oldWidth  = @read_exif_data($file)['COMPUTED']["Width"];


      $filename = str_replace(' ', '', $name) . '.' . $file->getClientOriginalExtension();
      $location = ($target_location.'/'.$filename);
      if($hieght === null){
        list($oldWidth, $oldHeight) = getimagesize($file); 
        $hieght = ($width/$oldWidth)*$oldHeight;
      }
      Image::make($file)->resize($width,$hieght)->save($location,60);
      return $filename;
    }
  }


  public static function uploadWithOriginalSize($image, $file, $name, $target_location)
  {
    if(Request::hasFile($image)){
      $filename = $name . '.' . $file->getClientOriginalExtension();
      $location = ($target_location.'/'.$filename);
      Image::make($file)->save($location);
      return $filename;
    }
  }


  public static function updateWithResize($image, $file, $name, $target_location, $old_location, $width="128", $hieght=null)
  {
    if(Request::hasFile($image)){
      // $oldHeight = @read_exif_data($file)['COMPUTED']["Height"]; 
      // $oldWidth  = @read_exif_data($file)['COMPUTED']["Width"];


      if($hieght === null){
        list($oldWidth, $oldHeight) = getimagesize($file);
        $hieght = ($width/$oldWidth)*$oldHeight;
      }

      $filename = $name. '.'.$file->getClientOriginalExtension();
      File::delete($old_location);
      $location = ($target_location.'/'.$filename);
      Image::make($file)->resize($width, $hieght)->save($location);
      return $filename;
    }
  }


  public static function updateWithOriginalSize($image, $file, $name, $target_location, $old_location)
  {
    if(Request::hasFile($image)){
      $filename = $name. '.'.$file->getClientOriginalExtension();
      File::delete($old_location);
      $location = ($target_location.'/'.$filename);
      Image::make($file)->save($location);
      return $filename;
    }
  }

}
