<?php

namespace App\Http\Controllers;

use App\Haddock;
use \Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle incoming votes.
     *
     * @param Haddock $id
     *   The current quote that is displayed. Implictly binded.
     * @param Request $request
     *
     * @return Haddock
     */
    public function vote(Haddock $id, Request $Request): Haddock
    {
        // Update like / dislike amount.
        switch ($Request->input('likedQuote')) {
            case true:
                $id->likes++;
                break;
            case false:
                $id->dislikes++;
                break;
        }

        $id->save();
        return $id;
    }
}
