<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $userMessage = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');

        // if api key not found return default response
        if (!$apiKey) {
            return response()->json([
                'reply' => "Hi! I am Faruk's AI Assistant. Faruk hasn't configured my API key yet. Please reach him at farukmia7979@gmail.com."
            ]);
        }

        // my cv details
        $systemInstruction = "You are Faruk's AI Assistant, representing Md. Faruk Mia, a Full Stack Web Developer. "
            . "Answer professionally, warmly, and concisely (maximum 2-3 sentences per answer) based on Faruk's CV details below. "
            . "If asked things not on his CV, politely redirect them to Faruk's contact details. Do not make up facts.\n\n"
            . "Faruk's CV details:\n"
            . "- Name: Md. Faruk Mia\n"
            . "- Location: Gazipur, Bangladesh\n"
            . "- Email: farukmia7979@gmail.com\n"
            . "- Phone/WhatsApp: +880 1790-647979\n"
            . "- GitHub: github.com/FarukMia79\n"
            . "- LinkedIn: linkedin.com/in/md-faruk-mia\n"
            . "- Education: B.Sc in CSE from Green University of Bangladesh (Rupganj, Narayanganj-1461).\n"
            . "- Technical Skills:\n"
            . "  * Languages: PHP, JavaScript, SQL, HTML5, CSS3\n"
            . "  * Frameworks: Laravel 12, Vue.js, Laravel Sanctum, Laravel Livewire, Tailwind CSS, Bootstrap\n"
            . "  * Backend & DB: REST APIs, MySQL, Database Design, Query Optimization\n"
            . "  * Tools: Git, GitHub, Postman, WordPress, VS Code\n"
            . "- Work Experience:\n"
            . "  * Intern Full Stack Web Developer at Robo Tech Valley (Feb 2026 - Apr 2026)\n"
            . "  * Freelance WordPress Developer (2024 - Present)\n"
            . "- Projects:\n"
            . "  * News Portal: Laravel 12, MySQL, Tailwind CSS\n"
            . "  * AI E-Commerce Platform: Laravel 12, Vue.js, MySQL, Python (real-time recommendation engine with Python model)\n"
            . "  * Inventory Management System: Laravel 12, Vue.js, MySQL\n"
            . "- Languages: Bengali (Native), English (Proficient)";

        try {
            // google gemini api request
            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $systemInstruction . "\n\nUser Question: " . $userMessage]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'maxOutputTokens' => 150,
                    'temperature' => 0.7
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? "Sorry, I couldn't generate a reply.";
                return response()->json(['reply' => trim($reply)]);
            }

            return response()->json([
                'reply' => "I am having some connection trouble. Please reach Faruk directly at farukmia7979@gmail.com!"
            ]);

        } catch (\Exception $e) {
            \Log::error("Chatbot Error: " . $e->getMessage());
            return response()->json([
                'reply' => "I am having some connection trouble. Please reach Faruk directly at farukmia7979@gmail.com!"
            ]);
        }
    }
}