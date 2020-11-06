@extends('layouts.app')

@section('title','Home/StudyTech')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span><a href="/">Top</a> > Home</span>
            <div class="card">
                <div class="card-header">{{ __('学習時間') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center" style="margin-top: 10%;">
                        <div class="col-sm-4">今日<br><b>{{ $today_time}}</b><br>時間</div>
                        <div class="col-sm-4">今月<br><b>{{ $month_time}}</b><br>時間</div>
                        <div class="col-sm-4">総計<br><b>{{ $total_time}}</b><br>時間</div>
                    </div>
                    <div class="row text-center" style="padding:2rem; border-top: solid 1px #E6ECF0; margin-top: 10%;">
                        <div class="col-sm-4">
                            <img src="image/html.png"　class="img-fluid"><br>
                            HTML/CSS<br>{{ $html}}<br>時間</div>
                        <div class="col-sm-4">
                            <img src="image/js.png"　class="img-fluid"><br>
                            JavaScript<br>{{ $javascript}}<br>時間</div>
                        <div class="col-sm-4">
                            <img src="image/ruby.png"　class="img-fluid"><br>
                            Ruby<br><b>{{ $ruby}}</b><br>時間
                        </div>
                        <div class="col-sm-4">
                            <img src="image/java.png"　class="img-fluid"><br>
                            Java<br>{{ $java}}<br>時間</div>
                        <div class="col-sm-4">
                        <img src="image/python.png"　class="img-fluid"><br>
                        Python<br>{{ $python}}<br>時間</div>
                        <div class="col-sm-4">
                        <img src="image/php.png"　class="img-fluid"><br>
                        PHP<br>{{ $php}}<br>時間</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">あなたのタイムライン</div>
                <div class="card-body py-4">
                @foreach($forms as $form)
                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                    {{ Auth::user()->name }}
                    <span>{{ $form->created_at}}</span><br>
                    <span>カテゴリ：{{ $form->category}}</span><br>
                    <span>学習時間：{{date('H時間i分', strtotime($form->working_time))}}</span><br>
                    <div>{{ $form->content }}</div>
                    
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-right float-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <form method="get" action="{{route('form_edit')}}">
                        {{ csrf_field()}}
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <input type="submit" value="編集" class="dropdown-item" onclick='return confirm("編集しますか？");'>
                        </form>

                        <form method="post" action="{{route('form_delete')}}">
                        {{ csrf_field()}}
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <input type="submit" value="削除" class="dropdown-item" onclick='return confirm("投稿を削除しますか？");'>
                        
                        </form>
                        <form method="post" action="{{route('tweet')}}">
                        {{ csrf_field()}}
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <input type="submit" value="ツイート" class="dropdown-item" onclick='return confirm("ツイートしますか？");'>
                        
                        </form>
                
                        </div>
                    
                </div>
                @endforeach

                </div>

            </div>
        </div>
        <div class="col-md-3">
            <form action="{{route('search')}}" method="GET">
            <div class="form-group">
                <label>タイムライン検索</label>
                <select name="category" class="form-control">
                    <option value="HTML/CSS">HTML/CSS</option>
                    <option value="Javascript">Javascript</option>
                    <option value="Ruby">Ruby</option>
                    <option value="Java">Java</option>
                    <option value="Python">Python</option>
                    <option value="PHP">PHP</option>
                </select>
            </div>
            <span class="input-group-btn text-right">
                <button type="submit" class="btn btn-primary">検索</button>
            </span>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
