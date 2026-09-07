<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function blogs(){
    $blogs = Blog::paginate(10);
    return view("blogs",compact("blogs"));

    }
    function abouts() {
    $name = "Jantharat Sampaothong";
    $Date = "6 กรกฎาคม 2569";
    return view("abouts",compact("name","Date"));
    }
    function create() 
    {
        return view('form');
    }
    function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
        ],[
            'title.required'=>'กรุณากรอกชื่อบทความ',
            'title.max'=>'ชื่อบทความไม่เกิน 50 ตัวอักษร',
            'content.required'=>'กรุณากรอกเนื้อหาบทความ'
        ]);
        $data= [
            'title'=>$request->title,
            'content'=>$request->content,
           
        ];
        DB:: table('blogs')->insert($data);
        return redirect()->back();
    } 
    function delete($id){
        Blog::find($id)->delete();
        return redirect()->back();
    }
    function change($id){
        $blog = Blog::find($id);
        $data=[
            'status'=>$blog->status
        ];
        if($blog->status==0){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        Blog::find($id)->update($data);
        return redirect()->back();
    }
    function edit($id){    
        $blog = Blog::Find($id);
        return view("edit",compact("blog"));
    }
     function update($id,Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
        ],[
            'title.required'=>'กรุณากรอกชื่อบทความ',
            'title.max'=>'ชื่อบทความไม่เกิน 50 ตัวอักษร',
            'content.required'=>'กรุณากรอกเนื้อหาบทความ'
        ]);
        $data= [
            'title'=>$request->title,
            'content'=>$request->content,
           
        ];
        Blog::find($id)->update($data);
        return redirect()->route('author.blogs');
    } 
}  