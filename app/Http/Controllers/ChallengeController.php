<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeTaken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $c = Auth::user()->challengeTaken;
            $recap = [
                "wait" => $c->where('status', 1)->count(),
                "finish" => $c->where('status', 2)->count(),
                "point" => $c->where('status', 2)->sum('point')
            ];
            return view('main/challenge', [
                "title" => "Tantangan",
                "challenge" => Challenge::all(),
                "recap" => $recap
            ]);
        } else {
            return view('main/challenge', [
                "title" => "Tantangan",
                "challenge" => Challenge::all()
            ]);
        }
    }

    public function detail(Challenge $challenge)
    {
        if (Auth::check()) {
            $id = ChallengeTaken::where([['user_id', Auth::user()->id], ['challenge_id', $challenge->id]])->first();
            if ($id) {
                return redirect('/challenge/detail/' . $challenge->id . '/' . $id->id);
            } else {
                return view('main/detail_challenge', [
                    "title" => "Detail Tantangan",
                    "detail" => Challenge::find($challenge->id),
                    "taken" => null
                ]);
            }
        } else {
            return view('main/detail_challenge', [
                "title" => "Detail Tantangan",
                "detail" => Challenge::find($challenge->id)
            ]);
        }
    }

    public function detailTaken(Challenge $challenge, ChallengeTaken $challengeTaken)
    {
        $taken = ChallengeTaken::find($challengeTaken->id);
        return view('main/detail_challenge', [
            "title" => "Detail Tantangan",
            "detail" => Challenge::find($taken->challenge_id),
            "taken" => $taken
        ]);
    }

    public function join(Request $request)
    {
        $ct = ChallengeTaken::create([
            'challenge_id' => $request->input('id_challenge'),
            'user_id' => Auth::user()->id
        ]);
        return redirect('/challenge/detail/' . $request->input('id_challenge') . '/' . $ct->id);
    }

    public function challengeSubmit(Request $request)
    {
        $request->validate([
            'answer' => 'file|required|max:2048'
        ]);

        $ct = ChallengeTaken::find($request->input('id'));
        if ($request->file()) {
            $fileName = time() . '_' . $ct->user_id . '_' . $request->file('answer')->getClientOriginalName();
            $request->file('answer')->storeAs('challenge', $fileName);
            $ct->answer_file = $fileName;
            $ct->submit_date = date('Y-m-d H:i:s');
            $ct->status = 1;

            $ct->save();
        }

        return back();
    }

    public function manageChallenge(Request $request)
    {

        $search = $request->input('search');
        if ($search) {
            $challenges = Challenge::where('judul', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $challenges = Challenge::paginate(10);
        }
        return view('admin/manage_challenge', [
            "title" => "Tantangan",
            "challenges" => $challenges,
            "search" => $search
        ]);
    }

    public function createChallenge()
    {
        return view('admin/create_challenge', [
            "title" => "Tantangan"
        ]);
    }

    public function storeChallenge(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'step' => 'required|string',
            'point' => 'required|integer',
            'xp' => 'required|integer'
        ]);

        Challenge::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'isi' => $request->input('isi'),
            'step' => $request->input('step'),
            'point' => $request->input('point'),
            'xp' => $request->input('xp')
        ]);

        return redirect()->route('admin.manageChallenge')->with('success', 'Challenge created successfully.');
    }

    public function upload(Request $request)
    {
        $material = new Challenge();
        $material->id = 0;
        $material->exists = true;

        $image = $material->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }

    public function deleteChallenge(Challenge $challenge)
    {
        $challenge->delete();
        return redirect()->route('admin.manageChallenge')->with('success', 'Challenge deleted successfully.');
    }

    public function editChallenge(Challenge $challenge)
    {
        return view('admin/edit_challenge', [
            "title" => "Tantangan",
            "challenge" => $challenge
        ]);
    }

    public function updateChallenge(Request $request, Challenge $challenge)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required|string',
            'step' => 'required|string',
            'point' => 'required|integer',
            'xp' => 'required|integer'
        ]);

        $challenge->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'isi' => $request->input('isi'),
            'step' => $request->input('step'),
            'point' => $request->input('point'),
            'xp' => $request->input('xp')
        ]);

        return redirect()->route('admin.manageChallenge')->with('success', 'Challenge updated successfully.');
    }
}
