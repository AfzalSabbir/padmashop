<?php

namespace App\Helpers;

use Image;
use Request;
use File;

use App\Models\Developer;
use App\Models\Post;

class ReturnPathHelper
{

  public static function getDeveloperImage($developer_id, $width="100")
  {
    $developer = Developer::find($developer_id);

    if ($developer->image == NULL || $developer->image == "") {
      $image_url = 'public/website-images/defaults/default.png';
      //Find Gravator image from Gravaton
      if (GravatarHelper::validate_gravatar($developer->email)) {
        return GravatarHelper::gravatar_image($developer->email, $width, "identicon");
      }
    }else{
      if (File::exists('public/website-images/developers/'.$developer->image)) {
        $image_url = 'public/website-images/developers/'.$developer->image;
      }else{
        //Find Gravator image from Gravaton
        if (GravatarHelper::validate_gravatar($developer->email)) {
          return GravatarHelper::gravatar_image($developer->email, $width, "identicon");
        }
        $image_url = 'public/website-images/defaults/default.png';
      }
    }
    return url($image_url);
  }

  public static function getPostImage($post_id)
  {
    $post = Post::find($post_id);

    if ($post->featured_image == NULL) {
      $image_url = 'public/website-images/defaults/tutorial-demo.jpg';
    }else{
      if (File::exists('public/website-images/posts/'.$post->featured_image)) {
        $image_url = 'public/website-images/posts/'.$post->featured_image;
      }else{
        $image_url = 'public/website-images/defaults/tutorial-demo.jpg';
      }
    }
    return url($image_url);
  }

}
