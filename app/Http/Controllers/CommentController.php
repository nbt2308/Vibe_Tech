<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->search;
        $comment_status = $request->comment_status;
        $perPage = $request->per_page ?? 5;
        $query = Comment::query()->with(['user', 'product']);
        if (!empty($keyword)) {
            $query->where('comment_content', 'LIKE', '%' . $keyword . '%');
        }
        if ($request->has('comment_status') && $comment_status !== null && $comment_status !== '') {
            $query->where('comment_status', $comment_status);
        }
        $comments = $query->orderBy('created_at', 'desc')->paginate(10);
        $comment_count = Comment::count();
        $comment_status_true = Comment::where('comment_status', 1)->count();
        $comment_status_false = Comment::where('comment_status', 0)->count();
        return view('admin.comments.index', compact('comments', 'comment_count', 'comment_status_true', 'comment_status_false'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, $productId)
    {
        //
        Comment::create([
            'comment_content' => $request->comment_content,
            'comment_rating' => $request->comment_rating,
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'comment_status' => true
        ]);
        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //


    }

    public function changeStatus($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment_status = !$comment->comment_status;
        $comment->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái bình luận thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Bình luận của bạn đã được xóa thành công!');
    }
}
