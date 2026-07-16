<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = trim($request->message);

        if (in_array(strtolower($message), ['hi', 'hello', 'hey', 'salam', 'assalamu alaikum'])) {
            return response()->json([
                'reply' => "Hello! I'm Faruk's Portfolio AI Assistant. Ask me about Faruk's skills, projects, experience, education or contact information."
            ]);
        }

        $apiKey = env('GROQ_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'reply' => 'AI service is not configured.'
            ]);
        }

        $systemPrompt = <<<PROMPT
You are Faruk's Portfolio AI Assistant.

Answer only about Md. Faruk Mia.

Profile:
- Full Stack Web Developer
- Location: Gazipur, Bangladesh
- Email: farukmia7979@gmail.com
- Phone: +8801790647979
- GitHub: https://github.com/FarukMia79
- LinkedIn: https://linkedin.com/in/md-faruk-mia

Skills:
PHP, Laravel 12, Vue.js, JavaScript, MySQL, SQL, HTML5, CSS3,
Laravel Sanctum, Livewire, Tailwind CSS, Bootstrap,
REST APIs, Git, GitHub, Postman, WordPress.

Experience:
- Intern Full Stack Web Developer, Robo Tech Valley (Feb 2026-Apr 2026)
- Freelance WordPress Developer (2024-Present)

Projects:
- AI E-Commerce Platform
- Inventory Management System
- News Portal

Education:
B.Sc. in CSE, Green University of Bangladesh.

Rules:
- Never invent information.
- Maximum 3 short sentences.
- If unrelated, politely say you only answer about Faruk's professional profile.
- If someone wants to hire Faruk, provide email and phone.
PROMPT;

        try {

            $response = Http::withToken($apiKey)
                ->timeout(20)
                ->retry(2, 1000)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    "model" => "llama-3.3-70b-versatile",
                    "messages" => [
                        ["role" => "system", "content" => $systemPrompt],
                        ["role" => "user", "content" => $message]
                    ],
                    "temperature" => 0.2,
                    "max_tokens" => 180,
                    "top_p" => 0.9
                ]);

            if (!$response->successful()) {
                Log::error("Groq Error", [
                    "status" => $response->status(),
                    "body" => $response->body()
                ]);

                return response()->json([
                    "reply" => "Sorry, the AI service is temporarily unavailable."
                ]);
            }

            $reply = trim($response->json()['choices'][0]['message']['content'] ?? '');

            return response()->json([
                "reply" => $reply ?: "Sorry, I couldn't generate a response."
            ]);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json([
                "reply" => "Connection error. Please try again."
            ]);
        }
    }
}
