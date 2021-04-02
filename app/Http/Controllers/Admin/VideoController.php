<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class VideoController extends Controller



{
    public function index(){

        $video = Video::withTrashed()->paginate(10);
        
        return view('admin.video.index', compact('video'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $video = new Video();
           

          return view(
                'admin.video.create',
                compact('control','video')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $video = new Video();
         
          $this->add_or_update($request, $video);
            
           return redirect('admin/video');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $video = Video::withTrashed()->find($id);
           
             
             return view('admin.video.create', compact(
                 'control',
                 'video'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $video = Video::withTrashed()->find($id);
                $this->add_or_update($request, $video);
                return Redirect('admin/video');
            }
        
        
            public function add_or_update(Request $request, $video)
            {
               
                $video->url = $request->avatar;
            // $video->url = $request->avatar;
      
        
                if ($request->hasFile('video')) {
                    $video = $request->video;
                    $root = $request->root();
                    $video->url = $this->move_img_get_path($video, $root, 'video');
                } else if (strcmp($request->video_visible, "")  !== 0) {
                    $embeded_url = $this->get_embeddedyoutube_url($request->video_visible);
                    $video->url = $embeded_url;
               
                $video->save();
        
                return redirect()->back();
            }
        }
        
            public function destroy_undestroy($id)
            {
                $video = Video::find($id);
                if ($video) {
                    Video::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Video::withTrashed()->find($id)->restore();
                    $new_value = 'Deactivate';
                }
                $response = Response::json([
                    "status" => true,
                    'action' => Config::get('constants.ajax_action.update'),
                    'new_value' => $new_value
                ]);
                return $response;
            } 
}


