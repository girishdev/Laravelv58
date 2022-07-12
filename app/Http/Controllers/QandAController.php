<?php

namespace App\Http\Controllers;

use App\QandA;
use App\Customer;
use Illuminate\Http\Request;

class QandAController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetching all the Question and Answers
        // $questions = QandA::all();
        // $questions = QandA::simplePaginate(10);
        // ToDo: Paginating Eloquent Results
        $questions = QandA::paginate(10);

        // Query Bases On Topics
        $laravelBasic = QandA::where([['topic','=','Laravel'],['qtype','=','Basic']])->paginate(10);
        $laravelIntermediate = QandA::where([['topic','=','Laravel'],['qtype','=','Intermediate']])->paginate(10);
        $laravelAdvanced = QandA::where([['topic','=','Laravel'],['qtype','=','Advanced']])->paginate(10);

        $phpQuestions = QandA::where('topic','=','Php')->paginate(10);

        $mysqlQuestions = QandA::where('topic','=','Mysql')->paginate(10);

        $awsBasic = QandA::where([['topic','=','AWS'], ['qtype','=','Basic']])->paginate(10);
        $awsIntermediate = QandA::where([['topic','=','AWS'], ['qtype','=','Intermediate']])->paginate(10);
        $awsAdvanced = QandA::where([['topic','=','AWS'], ['qtype','=','Advanced']])->paginate(10);
        // dd($awsBasic);
        return view('QandA.index', compact(
            'laravelBasic',
            'laravelIntermediate',
            'laravelAdvanced',
            'phpQuestions',
            'mysqlQuestions',
            'awsBasic',
            'awsIntermediate',
            'awsAdvanced',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = new QandA();
        $topics = ['Laravel', 'Php', 'Mysql', 'JavaScript', 'AWS', 'GIT', 'jQuery', 'AJAX'];
        $qtype = ['Basic', 'Intermediate', 'Advanced'];
        return view('QandA.create', compact('questions', 'topics', 'qtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        // $input = $request->all();
        $data = $request->validate([
            'topic' => 'required',
            'qtype' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'link' => '',
        ]);

        // Saving to Database In One Line
        QandA::create($data);

        return redirect('qanda');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function show(QandA $qandA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function edit(QandA $qandA, $id)
    {
        $question = QandA::where('id', '=', $id)->firstOrFail();
        $topics = ['Laravel', 'Php', 'Mysql', 'JavaScript', 'AWS','GIT', 'jQuery', 'AJAX'];
        $qtype = ['Basic', 'Intermediate', 'Advanced'];
        return view('QandA.edit', compact('question', 'topics', 'qtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QandA $qandA, $id)
    {
        // Validation
        $data = $request->validate([
            'topic' => 'required',
            'qtype' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'link' => '',
        ]);

        // Updating Data to the Database
        QandA::where('id', $id)
            ->update([
                'topic' => $request->topic,
                'qtype' => $request->qtype,
                'question' => $request->question,
                'answer' => $request->answer,
                'link' => $request->link,
            ]);

        return redirect('qanda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QandA  $qandA
     * @return \Illuminate\Http\Response
     */
    public function destroy(QandA $qandA, $id)
    {
        // DB::table('qand_a_s')->where('id', '=', $id)->delete();
        // QandA::where('id', '=', $id)->delete();
        QandA::findOrFail($id)->delete();

        return redirect('qanda');
    }

    public function searchQuestion(Request $request)
    {
        // $searchQuestion = QandA::where('question', 'LIKE', "%$request->value%")->get();
        // $searchQuestion = QandA::select(['question', 'answer'])->where('question', 'LIKE', "%$request->value%")->get();
        $searchQuestion = QandA::select(['id','question', 'answer'])->where('question', 'LIKE', "%$request->value%")->get()->toArray();

        return response()->json([$searchQuestion]);
    }

    public function uploadimage(Request $request)
    {

        // $QandA = new QandA();
        // $QandA->id = 0;
        // $QandA->exists = true;
        // $image = $QandA->addMediaFromRequest('upload')->toMediaCollection('images');

        // $url = 'https://ckeditor.com/assets/images/header/ckeditor-5-0d286a7dcd.png';

        // return response()->json([
        //     'url' => $image->getUrl()
        // ]);

        // if ($request->hasFile('upload')) {
        //     $originName = $request->file('upload')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('upload')->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . time() . '.' .$extension;

        //     $request->file('upload')->move(public_path('media', $fileName));
        //     $url = asset('media/'.$fileName);

        //     return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        // }
    }

    // Laravel Features
    public function laravelfeatures()
    {

    }

    // Laravel Basic
    public function laravelbasic()
    {
        // Query Bases On Topics
        $laravelBasic = QandA::where([['topic','=','Laravel'],['qtype','=','Basic']])->paginate(10);

        return view('QandA.laravelbasic', compact('laravelBasic'));
    }

    // Laravel Intermediate
    public function laravelintermediate()
    {
        // Query Bases On Topics
        $laravelIntermediate = QandA::where([['topic','=','Laravel'],['qtype','=','Intermediate']])->paginate(10);

        return view('QandA.laravelintermediate', compact('laravelIntermediate'));
    }

    // Laravel Advanced
    public function laraveladvanced()
    {
        // Query Bases On Topics
        $laravelAdvanced = QandA::where([['topic','=','Laravel'],['qtype','=','Advanced']])->paginate(10);

        return view('QandA.laraveladvanced', compact('laravelAdvanced'));
    }

    // PHP Basic
    public function phpbasic()
    {
        // Query Bases On Topics
        $phpbasic = QandA::where([['topic','=','Php'],['qtype','=','Basic']])->paginate(10);

        return view('QandA.phpbasic', compact('phpbasic'));
    }

    // PHP Intermediate
    public function phpintermediate()
    {
        // Query Bases On Topics
        $phpintermediate = QandA::where([['topic','=','Php'],['qtype','=','Intermediate']])->paginate(10);

        return view('QandA.phpintermediate', compact('phpintermediate'));
    }

    // PHP Advanced
    public function phpadvanced()
    {
        // Query Bases On Topics
        $phpadvanced = QandA::where([['topic','=','Php'],['qtype','=','Advanced']])->paginate(10);

        return view('QandA.phpadvanced', compact('phpadvanced'));
    }

    // Mysql Basic
    public function mysqlbasic()
    {
        // Query Bases On Topics
        $mysqlbasic = QandA::where([['topic','=','Mysql'],['qtype','=','Basic']])->paginate(10);

        return view('QandA.mysqlbasic', compact('mysqlbasic'));
    }

    // Mysql Intermediate
    public function mysqlintermediate()
    {
        // Query Bases On Topics
        $mysqlintermediate = QandA::where([['topic','=','Mysql'],['qtype','=','Intermediate']])->paginate(10);

        return view('QandA.mysqlintermediate', compact('mysqlintermediate'));
    }

    // Mysql Advanced
    public function mysqladvanced()
    {
        // Query Bases On Topics
        $mysqladvanced = QandA::where([['topic','=','Mysql'],['qtype','=','Advanced']])->paginate(10);

        return view('QandA.mysqladvanced', compact('mysqladvanced'));
    }

    // JavaScript Basic
    public function javascriptbasic()
    {
        // Query Bases On Topics
        $javascriptbasic = QandA::where([['topic', '=', 'JavaScript'], ['qtype', '=', 'Basic']])->paginate(10);

        return view('QandA.javascriptbasic', compact('javascriptbasic'));
    }

    // MyJavaScriptsql Intermediate
    public function javascriptintermediate()
    {
        // Query Bases On Topics
        $javascriptintermediate = QandA::where([['topic', '=', 'JavaScript'], ['qtype', '=', 'Intermediate']])->paginate(10);

        return view('QandA.javascriptintermediate', compact('javascriptintermediate'));
    }

    // JavaScript Advanced
    public function javascriptadvanced()
    {
        // Query Bases On Topics
        $javascriptadvanced = QandA::where([['topic', '=', 'JavaScript'], ['qtype', '=', 'Advanced']])->paginate(10);

        return view('QandA.javascriptadvanced', compact('javascriptadvanced'));
    }

    // AWS Basic
    public function awsbasic()
    {
        // Query Bases On Topics
        $awsbasic = QandA::where([['topic', '=', 'AWS'], ['qtype', '=', 'Basic']])->paginate(10);

        return view('QandA.awsbasic', compact('awsbasic'));
    }

    // AWS Intermediate
    public function awsintermediate()
    {
        // Query Bases On Topics
        $awsintermediate = QandA::where([['topic', '=', 'AWS'], ['qtype', '=', 'Intermediate']])->paginate(10);

        return view('QandA.awsintermediate', compact('awsintermediate'));
    }

    // AWS Advanced
    public function awsadvanced()
    {
        // Query Bases On Topics
        $awsadvanced = QandA::where([['topic', '=', 'GIT'], ['qtype', '=', 'Advanced']])->paginate(10);

        return view('QandA.awsadvanced', compact('awsadvanced'));
    }

    // GIT Basic
    public function gitbasic()
    {
        // Query Bases On Topics
        $gitbasic = QandA::where([['topic', '=', 'GIT'], ['qtype', '=', 'Basic']])->paginate(10);

        return view('QandA.gitbasic', compact('gitbasic'));
    }

    // GIT Intermediate
    public function gitintermediate()
    {
        // Query Bases On Topics
        $gitintermediate = QandA::where([['topic', '=', 'GIT'], ['qtype', '=', 'Intermediate']])->paginate(10);

        return view('QandA.gitintermediate', compact('gitintermediate'));
    }

    // GIT Advanced
    public function gitadvanced()
    {
        // Query Bases On Topics
        $gitadvanced = QandA::where([['topic', '=', 'GIT'], ['qtype', '=', 'Advanced']])->paginate(10);

        return view('QandA.gitadvanced', compact('gitadvanced'));
    }

    // jQuery Basic
    public function jquerybasic()
    {
        // Query Bases On Topics
        $jquerybasic = QandA::where([['topic', '=', 'jQuery'], ['qtype', '=', 'Basic']])->paginate(10);

        return view('QandA.jquerybasic', compact('jquerybasic'));
    }

    // jQuery Intermediate
    public function jqueryintermediate()
    {
        // Query Bases On Topics
        $jqueryintermediate = QandA::where([['topic', '=', 'jQuery'], ['qtype', '=', 'Intermediate']])->paginate(10);

        return view('QandA.jqueryintermediate', compact('jqueryintermediate'));
    }

    // jQuery Advanced
    public function jqueryadvanced()
    {
        // Query Bases On Topics
        $jqueryadvanced = QandA::where([['topic', '=', 'jQuery'], ['qtype', '=', 'Advanced']])->paginate(10);

        return view('QandA.jqueryadvanced', compact('jqueryadvanced'));
    }

    // AJAX Basic
    public function ajaxbasic()
    {
        // Query Bases On Topics
        $ajaxbasic = QandA::where([['topic', '=', 'AJAX'], ['qtype', '=', 'Basic']])->paginate(10);

        return view('QandA.ajaxbasic', compact('ajaxbasic'));
    }

    // AJAX Intermediate
    public function ajaxintermediate()
    {
        // Query Bases On Topics
        $ajaxintermediate = QandA::where([['topic', '=', 'AJAX'], ['qtype', '=', 'Intermediate']])->paginate(10);

        return view('QandA.ajaxintermediate', compact('ajaxintermediate'));
    }

    // AJAX Advanced
    public function ajaxadvanced()
    {
        // Query Bases On Topics
        $ajaxadvanced = QandA::where([['topic', '=', 'AJAX'], ['qtype', '=', 'Advanced']])->paginate(10);

        return view('QandA.ajaxadvanced', compact('ajaxadvanced'));
    }

}
