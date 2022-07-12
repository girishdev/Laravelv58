@extends('layouts.app')

@section('title', 'Question and Answers')

@section('content')
    <h1>Question and Answers</h1>
    <p><a href="qanda/create">Add Question and Answers</a></p>

    <div class="accordion" id="accordionExample">
        <!--Laravel-->
        <div class="card">
            <div class="card-header" id="laravelOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#laravelDescription" aria-expanded="true" aria-controls="laravelDescription">
                        Laravel
                    </button>
                </h2>
            </div>

            <div id="laravelDescription" class="collapse show" aria-labelledby="laravelOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="laravelBasic-tab" data-toggle="tab" href="#laravelBasic" role="tab" aria-controls="laravelBasic" aria-selected="true">Laravel Basic</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="laravelIntermediate-tab" data-toggle="tab" href="#laravelIntermediate" role="tab" aria-controls="laravelIntermediate" aria-selected="false">Laravel Intermediate</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="laravelAdvanced-tab" data-toggle="tab" href="#laravelAdvanced" role="tab" aria-controls="laravelAdvanced" aria-selected="false">Laravel Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="laravelBasic" role="tabpanel" aria-labelledby="laravelBasic-tab">
                            @foreach ($laravelBasic as $key => $question)
                                <p><b>Question Number: </b>{{ ++$key }}</p>
                                <p><b>Topic: </b>{{ $question->topic }}</p>
                                <p><b>Question Type: </b>{{ $question->qtype }}</p>
                                <p><b>Question: </b>{{ $question->question }}</p>
                                <p><b>Answer: </b>{!! $question->answer !!}</p>
                                @isset($question->link)
                                    <p><b>Link: </b><a href="{{ $question->link }}" target="_blank">{{ $question->link }}</a></p>
                                @endisset
                                <form action="/qanda/{{ $question->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <p>
                                        <b>Created At: </b>{{ $question->created_at }} |
                                        <a class="btn btn-primary btn-sm" href="/qanda/{{ $question->id }}/edit" role="button">Edit</a> |
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </p>
                                </form>
                                <hr>
                            @endforeach

                            <div class="pagination">
                                {!! $laravelBasic->render() !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="laravelIntermediate" role="tabpanel" aria-labelledby="laravelIntermediate-tab">
                            @foreach ($laravelIntermediate as $key => $question)
                                <p><b>Question Number: </b>{{ ++$key }}</p>
                                <p><b>Topic: </b>{{ $question->topic }}</p>
                                <p><b>Question Type: </b>{{ $question->qtype }}</p>
                                <p><b>Question: </b>{{ $question->question }}</p>
                                <p><b>Answer: </b>{!! $question->answer !!}</p>
                                @isset($question->link)
                                    <p><b>Link: </b><a href="{{ $question->link }}" target="_blank">{{ $question->link }}</a></p>
                                @endisset
                                <form action="/qanda/{{ $question->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <p>
                                        <b>Created At: </b>{{ $question->created_at }} |
                                        <a class="btn btn-primary btn-sm" href="/qanda/{{ $question->id }}/edit" role="button">Edit</a> |
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </p>
                                </form>
                                <hr>
                            @endforeach

                            <div class="pagination">
                                {!! $laravelIntermediate->render() !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="laravelAdvanced" role="tabpanel" aria-labelledby="laravelAdvanced-tab">
                            @foreach ($laravelAdvanced as $key => $question)
                                <p><b>Question Number: </b>{{ ++$key }}</p>
                                <p><b>Topic: </b>{{ $question->topic }}</p>
                                <p><b>Question Type: </b>{{ $question->qtype }}</p>
                                <p><b>Question: </b>{{ $question->question }}</p>
                                <p><b>Answer: </b>{!! $question->answer !!}</p>
                                @isset($question->link)
                                    <p><b>Link: </b><a href="{{ $question->link }}" target="_blank">{{ $question->link }}</a></p>
                                @endisset
                                <form action="/qanda/{{ $question->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <p>
                                        <b>Created At: </b>{{ $question->created_at }} |
                                        <a class="btn btn-primary btn-sm" href="/qanda/{{ $question->id }}/edit" role="button">Edit</a> |
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </p>
                                </form>
                                <hr>
                            @endforeach

                            <div class="pagination">
                                {!! $laravelAdvanced->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Php-->
        <div class="card">
            <div class="card-header" id="phpOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#phpDescription" aria-expanded="false" aria-controls="phpDescription">
                        Php
                    </button>
                </h2>
            </div>
            <div id="phpDescription" class="collapse" aria-labelledby="phpOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="phpBasic-tab" data-toggle="tab" href="#phpBasic" role="tab" aria-controls="phpBasic" aria-selected="true">Php Basic</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="phpIntermediate-tab" data-toggle="tab" href="#phpIntermediate" role="tab" aria-controls="phpIntermediate" aria-selected="false">Php Intermediate</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="phpAdvanced-tab" data-toggle="tab" href="#phpAdvanced" role="tab" aria-controls="phpAdvanced" aria-selected="false">Php Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="phpBasic" role="tabpanel" aria-labelledby="phpBasic-tab">
                            Basic
                        </div>
                        <div class="tab-pane fade" id="phpIntermediate" role="tabpanel" aria-labelledby="phpIntermediate-tab">
                            Intermediate
                        </div>
                        <div class="tab-pane fade" id="phpAdvanced" role="tabpanel" aria-labelledby="phpAdvanced-tab">
                            Advanced
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Mysql-->
        <div class="card">
            <div class="card-header" id="mysqlOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mysqlDescription" aria-expanded="false" aria-controls="mysqlDescription">
                        Mysql
                    </button>
                </h2>
            </div>
            <div id="mysqlDescription" class="collapse" aria-labelledby="mysqlOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="mysqlBasic-tab" data-toggle="tab" href="#mysqlBasic" role="tab" aria-controls="mysqlBasic"
                               aria-selected="true">Mysql Basic</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="mysqlIntermediate-tab" data-toggle="tab" href="#mysqlIntermediate" role="tab" aria-controls="mysqlIntermediate"
                               aria-selected="false">Mysql Intermediate</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="mysqlAdvanced-tab" data-toggle="tab" href="#mysqlAdvanced" role="tab" aria-controls="mysqlAdvanced"
                               aria-selected="false">Mysql Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="mysqlBasic" role="tabpanel" aria-labelledby="mysqlBasic-tab">
                            mysqlBasic
                        </div>
                        <div class="tab-pane fade" id="mysqlIntermediate" role="tabpanel" aria-labelledby="mysqlIntermediate-tab">
                            mysqlIntermediate
                        </div>
                        <div class="tab-pane fade" id="mysqlAdvanced" role="tabpanel" aria-labelledby="mysqlAdvanced-tab">
                            mysqlAdvanced
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--JavaScript-->
        <div class="card">
            <div class="card-header" id="javaScriptOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#javaScriptDescription" aria-expanded="false" aria-controls="javaScriptDescription">
                        JavaScript
                    </button>
                </h2>
            </div>
            <div id="javaScriptDescription" class="collapse" aria-labelledby="javaScriptOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="javaScriptBasic-tab" data-toggle="tab" href="#javaScriptBasic" role="tab" aria-controls="javaScriptBasic"
                               aria-selected="true">JavaScript Basic</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="javaScriptIntermediate-tab" data-toggle="tab" href="#javaScriptIntermediate" role="tab" aria-controls="javaScriptIntermediate"
                               aria-selected="false">JavaScript Intermediate</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="javaScriptAdvanced-tab" data-toggle="tab" href="#javaScriptAdvanced" role="tab" aria-controls="javaScriptAdvanced"
                               aria-selected="false">JavaScript Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="javaScriptBasic" role="tabpanel" aria-labelledby="javaScriptBasic-tab">
                            javaScriptBasic
                        </div>
                        <div class="tab-pane fade" id="javaScriptIntermediate" role="tabpanel" aria-labelledby="javaScriptIntermediate-tab">
                            javaScriptIntermediate
                        </div>
                        <div class="tab-pane fade" id="javaScriptAdvanced" role="tabpanel" aria-labelledby="javaScriptAdvanced-tab">
                            javaScriptAdvanced
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--AWS-->
        <div class="card">
            <div class="card-header" id="awsOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#awsDescription" aria-expanded="false" aria-controls="awsDescription">
                        AWS
                    </button>
                </h2>
            </div>
            <div id="awsDescription" class="collapse" aria-labelledby="awsOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="awsBasic-tab" data-toggle="tab" href="#awsBasic" role="tab" aria-controls="awsBasic"
                               aria-selected="true">AWS Basic</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="awsIntermediate-tab" data-toggle="tab" href="#awsIntermediate" role="tab" aria-controls="awsIntermediate"
                               aria-selected="false">AWS Intermediate</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="awsAdvanced-tab" data-toggle="tab" href="#awsAdvanced" role="tab" aria-controls="awsAdvanced"
                               aria-selected="false">AWS Advanced</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="awsBasic" role="tabpanel" aria-labelledby="awsBasic-tab">
                            @foreach ($awsBasic as $key => $question)
                                <p><b>Question Number: </b>{{ ++$key }}</p>
                                <p><b>Topic: </b>{{ $question->topic }}</p>
                                <p><b>Question Type: </b>{{ $question->qtype }}</p>
                                <p><b>Question: </b>{{ $question->question }}</p>
                                <p><b>Answer: </b>{!! $question->answer !!}</p>
                                @isset($question->link)
                                    <p><b>Link: </b><a href="{{ $question->link }}" target="_blank">{{ $question->link }}</a></p>
                                @endisset
                                <form action="/qanda/{{ $question->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <p>
                                        <b>Created At: </b>{{ $question->created_at }} |
                                        <a class="btn btn-primary btn-sm" href="/qanda/{{ $question->id }}/edit" role="button">Edit</a> |
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </p>
                                </form>
                                <hr>
                            @endforeach

                            <div class="pagination">
                                <!-- {!! $awsBasic->render() !!} -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="awsIntermediate" role="tabpanel" aria-labelledby="awsIntermediate-tab">
                            awsIntermediate
                        </div>
                        <div class="tab-pane fade" id="awsAdvanced" role="tabpanel" aria-labelledby="awsAdvanced-tab">
                            awsAdvanced
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
