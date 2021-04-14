@extends('layout')

@section('bulmaLink')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
   
	<div id="wrapper">
		<div id="page" class="container">
		<h2 class="heading has-text-weight-bold is-size-4">New Article</h2>
		
		<form method="post" action="/articles">
			@csrf
			<div class="field">
				<label class="label" for="title">Title</label>
				<div class="comtrol">
					<input class="input @error('title') is-danger  @enderror" type="text" name="title" id="title" value="{{old('title')}}">	
					@error('title')
						<p class="help is-danger">{{ $errors->first('title') }}</p>
					@enderror
				</div>
			</div>
			<div class="field">
				<label class="label" for="excerpt">excerpt</label>
				<div class="comtrol">
					<input class="input @error('excerpt') is-danger  @enderror" type="text" name="excerpt" id="excerpt" value="{{old('excerpt')}}">
					@error('excerpt')
						<p class="help is-danger">{{ $errors->first('excerpt') }}</p>
					@enderror	
				</div>
			</div>
			<div class="field">
				<label class="label " for="body">body</label>
				<div class="comtrol">
					<textarea class="textarea @error('body') is-danger  @enderror" name="body" id="body">{{old('body')}}</textarea>
					@error('body')
						<p class="help is-danger">{{ $errors->first('body') }}</p>
					@enderror		
				</div>
			</div>

			<div class="field">
				<label class="label " for="body">TAGS</label>
				<div class="comtrol select is-multiple">
					<select name="tags[]" multiple> 
						@foreach ($tags as $tag)
							<option value="{{ $tag->id}}"> {{ $tag->name}} </option>
						@endforeach
					</select>
					@error('tags')
						<p class="help is-danger">{{ $message }}</p>
					@enderror		
				</div>
			</div>
			<div class="field is-grouped">
				<div class="comtrol">
					<button class="button is-link" type="submit">Submit</button>	
				</div>
			</div>
		</form>
	</div>

@endsection