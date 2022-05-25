<?php
 namespace App\Repositories;
 use Illuminate\Support\Facades\Auth;
 use App\Models\User;
 use App\Models\Blog;
class BlogRepository 
{
    public function storeData($request)
    {
        $blog=new Blog();
        $blog->user_id=Auth::user()->id;
        $blog->title=$request->title;
        $name = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $name);
        $blog->image=$name;
        $blog->description=$request->description;
        $blog->save();
        return true;
    }

    public function getMyBlog()
    {
        $blog=Blog::where('user_id',Auth::user()->id)->get();
        return$blog;
    }

    public function getEditData($id)
    {
        $blog=Blog::where('user_id',Auth::user()->id)->where('id',$id)->first();
        return $blog;
    }

    public function updateData($data,$id)
    {
        $blog=Blog::findorfail($id);
        $blog->title=$data->title;
        if($data->hasFile('image')){
            $name = time().'.'.$data->image->extension();  
            $data->image->move(public_path('images'), $name);
            $blog->image=$name;
        }else{
            $blog->image=$data->old_image;
        }
        $blog->description=$data->description;
        $blog->save();
        return true;
    }

    public function destroyData($id)
    {
        $blog=Blog::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if($blog){
            $blog->delete();
            return true;
        }else{
            return false;
        }
    }
}
