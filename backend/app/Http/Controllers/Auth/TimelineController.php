<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Tweet;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->get();
        return view('auth.timeline', compact('tweets'));
    }

    public function postTweet(Request $request) //ここはあとで実装します。(Requestはpostリクエストを取得するためのものです。)
    {
    	 $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'tweet' => ['required', 'string', 'max:280'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
        Tweet::create([ // tweetテーブルに入れるよーっていう合図
            'user_id' => Auth::user()->id, // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'tweet' => $request->tweet, // ツイート内容
        ]);
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）

    }
}
