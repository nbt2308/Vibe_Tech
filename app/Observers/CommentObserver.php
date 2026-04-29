<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Validation\ValidationException;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function creating(Comment $comment): void
    {
        //
        if (!$comment->user_id) {
            return;
        }

        // Tìm bình luận gần nhất của user này
        $lastComment = Comment::where('user_id', $comment->user_id)
            ->orderBy('created_at', 'desc')
            ->first();
        if ($lastComment) {
            $diffInSeconds = $lastComment->created_at->diffInSeconds(now());
            $limitSeconds = 10 * 60; // 10 phút mới đc bl/1 lần

            if ($diffInSeconds < $limitSeconds) {
                $remainingSeconds = $limitSeconds - $diffInSeconds;
                $minutes = ceil($remainingSeconds / 60);

                throw ValidationException::withMessages([
                    'comment_content' => ["Vui lòng đợi thêm khoảng {$minutes} phút."],
                ]);
            }
        }
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
        if ($comment->isDirty('status') && $comment->status === 0) {
            $user = $comment->user;

            // Chỉ xét user tồn tại, là khách hàng (user_type = 0) và tài khoản chưa bị khóa (status != 0)
            if ($user && $user->user_type == 0 && $user->status != 0) {
                
                
                $commentCount = Comment::where('user_id', $user->id)
                                    ->where('status', 0)
                                    ->count();

                // Nếu bình luận từ 5 bình luận bị ẩn trở lên -> Khóa tài khoản
                if ($commentCount >= 5) {
                    $user->update(['status' => 0]);
                }
            }
        }
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
