<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    // عرض كل المراكز و المنجزات
    public function index()
    {
        $achievements = Achievement::all();
        return view('achievements.all', [
            'title' => 'كل المراكز و المنجزات',
            'achievements' => $achievements
        ]);
    }

    // إنشاء أجندة
    public function create()
    {
        return view('achievements.create', [
            'title' => 'إنشاء المراكز و المنجزات'
        ]);
    }

    public function store(Request $request)
    {
        $achievement = new Achievement([
            'name' => $request->name,
            'rank' => $request->rank,
            'number' => $request->number,
            'stage' => $request->stage,
            'genre' => $request->genre,
            'date' => $request->date,
        ]);
        $achievement->save();
        $msg = "ثم إنشاء المراكز و المنجزات بنجاح";
        return back()->with('create', $msg);
    }

    // تعديل المراكز و المنجزات
    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view(
            'achievements.edit',
            [
                'title' => 'تعديل المراكز و المنجزات',
                'achievement' => $achievement
            ]
        );
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $achievement = Achievement::findOrFail($id);
        $achievement->name = $request->name;
        $achievement->date = $request->date;
        $achievement->rank = $request->rank;
        $achievement->number = $request->number;
        $achievement->stage = $request->stage;
        $achievement->genre = $request->genre;
        $achievement->save();
        $msg = "ثم تعديل المراكز و المنجزات بنجاح";
        return back()->with('update', $msg);
    }

    // حذف المراكز و المنجزات
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        $msg = "ثم حذف المراكز و المنجزات";
        return back()->with('delete', $msg);
    }
}
