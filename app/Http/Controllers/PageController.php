<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // This will fetch all questions with their related category and user, ordered by the latest
        $questions = Question::with('category', 'user')->latest()->get();

        return view('pages.home', [
            'questions' => $questions
        ]);
    }
}
