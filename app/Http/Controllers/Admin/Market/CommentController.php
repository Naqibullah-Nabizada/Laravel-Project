<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Comment\StoreCommentRequest;
use App\Models\Content\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $unSeenComments = Comment::where('commentable_type', 'App\Models\Market\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            $unSeenComment->seen = 1;
            $unSeenComment->save();
        }

        $comments = Comment::where('commentable_type', 'App\Models\Market\Product')->orderBy('id', 'desc')->get();
        return view('admin.market.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::FindOrFail($id);
        return view('admin.market.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::FindOrFail($id);
        $comment->destroy($id);
        return redirect()->route('product.comment.index')->with('swal-success', 'نظر با موفقیت حذف شد');
    }


    public function answer(StoreCommentRequest $request, $id)
    {
        $comment = Comment::FindOrFail($id);
        $comment->create(
            [
                'body' => $request->body,
                'parent_id' => $request->id,
                'author_id' => 1,
                'commentable_id' => $comment->commentable_id,
                'commentable_type' => $comment->commentable_type,
                'approved' => 1,
                'status' => 1,
            ]
        );
        return redirect()->route('product.comment.index')->with('swal-success', 'پاسخ شما با موفقیت ثبت شد');
    }


    public function approved($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->approved = $comment->approved == 0 ? 1 : 0;

        $result = $comment->save();

        if ($result) {
            return redirect()->route('product.comment.index')->with('swal-success', 'وضعیت نظر با موفقیت تغییر کرد');
        } else {
            return redirect()->route('product.comment.index')->with('swal-error', 'وضعیت نظر با خطا مواجه شد');
        }
    }

    public function status($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->status = $comment->status == 0 ? 1 : 0;

        $result = $comment->save();

        if ($result) {
            return redirect()->route('product.comment.index')->with('swal-success', 'وضعیت تایید با موفقیت تغییر کرد');
        } else {
            return redirect()->route('product.comment.index')->with('swal-error', 'وضعیت تایید با خطا مواجه شد');
        }
    }
}
