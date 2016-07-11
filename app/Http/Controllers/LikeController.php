<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ExampleLike;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ExamplePost;

class LikeController extends Controller
{

    /**
     * Kiem tra Like cho san pham nao, loai nao? Like/ Unlike
     * @author NTHanh
     * @param type $type
     * @param type $id
     */
    public function handleLike($type, $id)
    {
        $exitsting_like = ExampleLike::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();
        if (is_null($exitsting_like))
        {
            ExampleLike::create([
                'user_id' => Auth::id(),
                'likeable_id' => $id,
                'likeable_type' => $type,
            ]);
        } else
        {
            if (is_null($exitsting_like->deleted_at))
            {
                $exitsting_like->delete();
            } else
            {
                $exitsting_like->restore();
            }
        }
    }

    public function likeProduct($id)
    {
        $this->handleLike(Product::class, $id);
        return redirect()->back();
    }

    public function likePost($id)
    {
        $this->handleLike(ExamplePost::class, $id);
        return redirect()->back();
    }

}
