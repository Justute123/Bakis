<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\Theory;
use App\Models\Topic;

class ChatGPTController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {

        $request->validate([
                'chatGPT' => 'required']
            , [
                'chatGPT' => 'chat GPT field is required',

            ]);

        $result = '';
        $chat = $request->input('chatGPT');
        $topics = Topic::all();



            $messages = [
                ['role' => 'user', 'content' => $chat],
            ];

            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
            ]);


            $result = Arr::get($result, 'choices.0.message')['content'] ?? '';

        return view('/pages/dashboardTheoryForm', compact('result','topics'));

    }

}
