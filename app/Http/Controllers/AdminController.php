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
    function blogs()
    {
        $blogs = Blog::paginate(10);
        return view('blogs', compact('blogs'));
    }
    function abouts()
    {
        $name = 'Nirut Suetrong';
        $date = '29 มิถุนายน 2547';
        return view('abouts', compact('name', 'date'));
    }
    function cerate()
    {
        return view('form');
    }
    function insert(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ],
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        Blog::insert($data);
        return redirect('/author/blogs');
    }
    function delete($id)
    {
        Blog::find($id)->delete();
        return redirect()->back();
    }
    function change($id)
    {
        $blog = Blog::find($id);
        $data = [
            'status' => $blog->status
        ];
        if ($blog->status == 0) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        Blog::find($id)->update($data);
        return redirect()->back();
    }
    function edit($id)
    {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }
    function update(Request $request,$id)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ],
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        Blog::find($id)->update($data);
        return redirect('/author/blogs');
    }
}
