<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = 'members';

    public function save(PostRequest $request)
    {
        // データベース登録
        $member = new Member;
        $member->name = $request->name;
        $member->tel = $request->tel;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->content = $request->content;
        $member->save();

        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('form.complete');
    }
}
