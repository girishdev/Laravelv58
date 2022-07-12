<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QandA extends Model
{

    protected $fillable = ['topic', 'qtype', 'question', 'answer', 'link'];

    protected $guarded = [];

    public function lessons()
    {
        return 450;
    }
}
