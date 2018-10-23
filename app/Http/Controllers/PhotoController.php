<?php

namespace App\Http\Controllers;

use File;
use Intervention\Image;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    protected $photo;

    /**
     * [__construct description]
     * @param Photo $photo [description]
     */
    public function __construct(
        Photo $photo )
    {
        $this->photo = $photo;
    }

    /**
     * Display photo input and recent images
     * @return view [description]
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photo', compact('photos'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //check if image exist
        if ($request->hasFile('image')) {
            $images = $request->file('image');

            //setting flag for condition
            $org_img = $thm_img = true;

            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory(public_path('images/originals/'), 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory(public_path('images/thumbnails'), 0777, true);
            }

            // loop through each image to save and upload
            foreach($images as $key => $image) {
                //create new instance of Photo class
                $newPhoto = new $this->photo;
                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                //path of image for upload
                $org_path = 'images/originals/' . $filename;
                $thm_path = 'images/thumbnails/' . $filename;

                $newPhoto->image     = 'images/originals/'.$filename;
                $newPhoto->thumbnail = 'images/thumbnails/'.$filename;

                //don't upload file when unable to save name to database
                if ( ! $newPhoto->save()) {
                    return false;
                }

                // upload image to server
                if (($org_img && $thm_img) == true) {
                    Image::make($image)->fit(900, 500, function ($constraint) {
                        $constraint->upsize();
                    })->save($org_path);
                    Image::make($image)->fit(270, 160, function ($constraint) {
                        $constraint->upsize();
                    })->save($thm_path);
                }
            }
        }

        return redirect()->action('PhotoController@index');

    }
}