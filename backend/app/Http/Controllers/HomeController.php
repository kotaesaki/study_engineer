<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete(Request $request)
    {
        $form = Form::find($request->id);
        $form->delete();
        return redirect('/home');
    }

    public function edit(Request $request)
    {
        $forms = Form::find($request->id);
        return view('edit', ['forms' => $forms]); 
    }

    public function update(Request $request)
    {
        $form = Form::find($request->id);
        $form->working_time = $request->working_time;
        $form->content = $request->content;
        $form->save();
        return redirect('/home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
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
