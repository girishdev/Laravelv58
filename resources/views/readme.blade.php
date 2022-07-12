@extends('layouts.app')

@section('title', "Read Me")

@section('content')
<h2>Read Me:</h2>
<hr>

<h4>Upcoming Features:</h4>
<hr>

<ul>
    <li>Image / Vidoe Uploading Options</li>
    <li>Adding Quotes / Tables Structure Feature Needed</li>
    <li>Planning to Give Multiple Question and Answers</li>
    <li>Need to Create Blog<br>
        - based on topic we can create Blog<br>
            => For Eg:- Laravel, PHP<br><br>

        Requirement:<br>
        Type: QandA Or Blog<br><br>

        Topic: Laravel, Php, Mysql, JavaScript, AWS, GIT, jQuery, Ajax etc...<br>
        Question / Blog Type: Basic, Intermediate, Advanced<br>
        Question / Title: <br>
        Answer / Description: <br>
        Upload Single Imgae / Multiple Images / Vidoes: <br>
        Link: <br>

    </li>
</ul>

<br><br><br><br>

<h4>Released Feature:</h4>
<hr>

<h4>Version: 1.00</h4>
<ul>
    <li>Add Question and Answers for Ralted Topics</li>
    <li>Question and Answers are divided into<br>
        - Basic<br>
        - Intermediat<br>
        - Advance<br>
    </li>
    <li>Add Pagination</li>
    <li>Implemented Ck Editor</li>
</ul>



@endsection