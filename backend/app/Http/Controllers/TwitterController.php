<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\Form;

class TwitterController extends Controller
{
    // 投稿
    public function tweet(Request $request)
    {

        $form = Form::find($request->id);
        $category = $form->category;
        $working_time = $form->working_time;

        $twitter = new TwitterOAuth(env('TWITTER_CLIENT_ID'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_TOKEN_SECRET'));

        $twitter->post("statuses/update", [
            "status" =>$category . "の勉強を" . date('H時間i分', strtotime($working_time)) . "しました！" . PHP_EOL . "#studytech #今日の積み上げ #twitter連携のテストです"
        ]);
        return redirect('/home');
    }
}