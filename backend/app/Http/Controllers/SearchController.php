<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __construct()
	{
    $this->middleware('auth');
	}

	public function search(Request $request)
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

		$forms = Form::where('user_id', Auth::user()->id)->where('category', $request->category)->latest()->get();
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