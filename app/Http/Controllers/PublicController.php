<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function home() {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category) {
        
        return view('categoryShow', compact('category'));
    }

    public function searchAnnouncements(Request $request){
        $announcements=Announcement::search($request->searched)->paginate(3);
        return view('announcements.index', compact('announcements'));
        
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
