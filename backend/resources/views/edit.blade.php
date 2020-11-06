@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
    	<div class="col-md-8 text-center">
			<form action="{{ route('form_update')}}" method="POST">
				{{ csrf_field() }}
				<input type='hidden' name='id' value='{{ $forms->id }}'>

				<div class="form-group">
				<label>カテゴリ</label>
				<select name="category" class="form-control">
					<option value="HTML/CSS">HTML/CSS</option>
					<option value="Javascript">Javascript</option>
					<option value="Ruby">Ruby</option>
					<option value="Java">Java</option>
					<option value="Python">Python</option>
					<option value="PHP">PHP</option>
				</select>
				</div>

				<div class="form-group">
					<label>勉強時間</label>
					<input type="time" name="working_time" class="form-control" value="{{$forms->working_time }}">
				</div>
				<div class="form-group">
					<label>要点・メモ</label>
					<input type="text" name="content" class="form-control" style="height:200px;" placeholder="要点・メモなどを記載してください" value="{{$forms->content}}">
				</div>
				<div class="form-group">
					<button type="submit">保存する</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
