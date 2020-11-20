<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsEntry;
use Auth;
use Validator;

class ManageEntryController extends Controller
{
    /* 記事の作成 */
    public function showCreateForm()
    {
        return view('news.create_form');
    }

    public function create(Request $request)
    {
        $input = $request->nly('title', 'description', 'body');

        $validator = Validator::make($input, [
            'title' => 'required|string|max:30',
            'description' => 'string|max:200',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('news/create')->withErrors($validator)->withInput();
        }

        $news = new NewsEntry();
		$news->title = $input["title"];
		$news->description = $input["description"];
		$news->body = $input["body"];
		$news->user_id = Auth::id();
		$news->thumbnail_url = "";
		$news->image_url = "";
		$news->save();

        return redirect('home')->withStatus('記事を作成しました');
    }

    /* 記事の編集 */
    public function showEditForm()
    {
        return view('news.edit_form');
    }

    public function update(Request $request, $id)
    {
        // @TODO 記事の更新
        return redirect('home')->withStatus('記事を更新しました');
    }

    /* 記事の削除 */
    public function delete($id)
    {
        return rediredt('home')->withStatus('記事を削除しました');
    }
}
