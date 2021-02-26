<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function get_language($id)
    {
        $lang = Language::query()->where('id', $id)->first('language');
        return $lang->language;
    }

    public function solution()
    {
        return $this->hasMany(Solution::class);
    }

    public function result()
    {
        return $this->hasMany(Result::class);
    }

    public function is_owner($owner)
    {
        $logged = auth()->user()->getAuthIdentifier();
        if($logged == $owner)
            return true;
        else
            return false;
    }


}
