<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Image;
use storage;

class AdminController extends Controller
{

    public function index()
    {
        
        $blogs = Post::all();
        // echo "<pre>";print_r($blogs);die;
        // $request->session()->put('key', 'value');
        return view('admin.index', compact('blogs'));
    }
    
    public function showsettings($id)
    {
        $admin_details = User::where(['id'=>$id])->first();
        // echo "<pre>";print_r($admin_details);die;
        return view('admin.settings', compact('admin_details'));
    }

    public function settings(Request $request, $id)
    {
        // $txt = "karachi123";
        // $chk = password_hash($txt, PASSWORD_DEFAULT);
        // $ret = ($txt == $chk) ? "Ok" : "Wrong!" ;
        // echo "<pre>";print_r(Hash::make("karachi123"));die;
        // $user->password = password_hash($request->password, PASSWORD_DEFAULT);

        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => ['required', 'string', 'min:7'],
            'confirmPassword' => 'required|same:newPassword',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/settings/'.$id)->withErrors($validator)->withInput();
        }
        $user = User::find(Auth::id());

        if ($request->isMethod('post')) {

            $data = $request->all();
            $password = $data['newPassword'];
            if (!Hash::check($data['oldPassword'], $user->password)) {
                // return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
                return redirect('/admin/settings/'.$id)->with('flash_message_error','Current Password does not match !');
            }else{
                $user->password = Hash::make($password);
                $user->save();
                return redirect('/admin/settings/'.$id)->with('flash_message_success','Password Updated Successfully');
            }

        }
        return redirect('/admin/settings/'.$id);
    }

    public function create()
    {
        $blogs = Post::all();
        return view('admin.addpost', compact('blogs'));
    }

    public function store(Request $request)
    {
        // $this->validate($request, array(
        // 'title' => 'required|max:255',
        //     'body' => 'required'
        // ));
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;

            $posts = new Post;
            $posts->title = $data['title'];
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('image/'.$filename);
                Image::make($image)->resize(300, 100)->save($location);
                $posts->image = $filename;
            }
            $posts->body = $data['body'];
            $posts->save();
            return redirect('/admin')->with('flash_message_success','Your New BlogPost Created Successfully');

        }

        return redirect('/admin')->with('flash_message_error','Something Wrong Please Try again!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blogs = Post::where(['id'=>$id])->first();
        return view('admin.editpost', compact('blogs'));
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, array(
        // 'title' => 'required|max:255',
        //     'body' => 'required',
        //     'image',
        // ));
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->isMethod('post')) {
            $title = $request->title;
            $body = $request->body;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('image/'.$filename);
                Image::make($image)->resize(300, 100)->save($location);

                $oldfilename = $post->image;

                $post->image = $filename;Storage::delete($oldfilename);
            }
            $blogs = Post::where(['id'=>$id])->update(['title'=>$title, 'body'=>$body]);
            return redirect('/admin')->with('flash_message_success','Your BlogPost Updated Successfully');
            // $blog->save;
        }
        
        return redirect('/admin')->with('flash_message_error','Something Wrong Please Try again!');
    }

    public function destroy($id)
    {
        Post::where(['id'=>$id])->delete();
        return redirect('/admin')->with('flash_message_error','Post Deleted Successfully!');
    }
}

