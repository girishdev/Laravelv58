@extends('layouts.app')

@section('title')
    Edit Question and Answers
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Question and Answers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/qanda/{{ $question->id }}" method="POST">
                @method('PATCH')
                <div class="form-group">
                    <label for="topic">Topic: </label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="" disabled>Select Question and Answers Topic</option>
                        @foreach($topics as $topicsValue)
                            <option value="{{ $topicsValue }}" {{ $question->topic == $topicsValue ? 'selected' : ''}}>{{ $topicsValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qtype">Question Type: </label>
                    <select name="qtype" id="qtype" class="form-control">
                        <option value="" disabled>Select Question Type</option>
                        @foreach($qtype as $qtypeValue)
                            <option value="{{ $qtypeValue }}" {{ $question->qtype == $qtypeValue ? 'selected' : ''}}>{{ $qtypeValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="question">Question: </label>
                    <input type="text" id="question" name="question" value="{{ old('question') ?? $question->question }}" class="form-control">
                    <div>{{ $errors->first('question') }}</div>
                </div>

                <div class="form-group">
                    <label for="answer">Answer: </label>
                    <textarea class="form-control" id="answer" name="answer" rows="8">{{ $question->answer }}</textarea>
                    <div>{{ $errors->first('answer') }}</div>
                </div>

                <div class="form-group">
                    <label for="link">Link: </label>
                    <input type="text" name="link" value="{{ old('link') ?? $question->link }}" class="form-control">
                    <div>{{ $errors->first('link') }}</div>
                </div>

                @csrf
                <button type="submit" class="btn btn-primary">Save Question and Answers</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#answer' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
