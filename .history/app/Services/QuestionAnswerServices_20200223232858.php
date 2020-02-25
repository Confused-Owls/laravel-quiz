<?php

namespace App\Services;
use App\Quiz;

class QuestionAnswerServices
{
    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function get()
    {
        return $this->quiz->get();
    }
}