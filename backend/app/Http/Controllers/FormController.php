<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;

class FormController extends Controller
{
    public function showPage()
    {
    	return view('form');
    }

    public function postTweet(Request $request)
    {
    	Form::create([ 
            'user_id' => Auth::user()->id, // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'category' => $request->category,
            'working_time' => $request->working_time,
            'content' => $request->content, // ツイート内容
        ]);
        
        $today_time = Form::where('user_id', Auth::user()->id)->whereDate('created_at', today())->sum('working_time');
        $month_time = Form::where('user_id', Auth::user()->id)->whereMonth('created_at', now())->sum('working_time');
        $total_time = Form::where('user_id', Auth::user()->id)->sum('working_time');

        $html = Form::where('user_id', Auth::user()->id)->where('category','HTML/CSS')->sum('working_time');
        $javascript = Form::where('user_id', Auth::user()->id)->where('category','Javascript')->sum('working_time');
        $ruby = Form::where('user_id', Auth::user()->id)->where('category','Ruby')->sum('working_time');
        $java = Form::where('user_id', Auth::user()->id)->where('category','Java')->sum('working_time');
        $python = Form::where('user_id', Auth::user()->id)->where('category','Python')->sum('working_time');
        $php = Form::where('user_id', Auth::user()->id)->where('category','PHP')->sum('working_time');

        $forms = Form::where('user_id', Auth::user()->id)->latest()->get();

        return view('home', ['forms' => $forms,
            'today_time' => $today_time,
            'month_time' => $month_time,
            'total_time' => $total_time,
            'html' => $html,
            'javascript' => $javascript,
            'ruby' => $ruby,
            'java' => $java,
            'python' => $python,
            'php' => $php]);
    }
}
