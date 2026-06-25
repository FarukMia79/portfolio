<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'projects_count' => Project::count(),
            'skills_count'   => Skill::count(),
            'messages_count' => ContactMessage::count(),
            // পেজ ভিউর জন্য আপনার আলাদা টেবিল না থাকলে আপাতত স্ট্যাটিক রাখতে পারেন
            'page_views'     => '2.4k', 
            'recent_messages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
