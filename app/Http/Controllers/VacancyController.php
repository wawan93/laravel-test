<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;

class VacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my(Request $request)
    {
        $vacancies = Vacancy::where('user_id', $request->user()->id);

        $view = View::make('vacancy.list', [
            'vacancies' => $vacancies->get()
        ]);
        return $view;
    }

    public function moderation(Request $request)
    {
        $vacancies = Vacancy::where('moderated', 0);

        $view = View::make('vacancy.list', [
            'vacancies' => $vacancies->get()
        ]);
        return $view;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->vacancies()->create([
            'name' => $request->name,
            'text' => $request->text,
            'email' => $request->user()->email
        ]);

        return redirect('/vacancy');
    }

    public function view(Request $request, Vacancy $vacancy)
    {

    }

    public function destroy(Request $request, Vacancy $vacancy)
    {
        if ($vacancy->can_delete($request->user())) {
            $vacancy->delete();
        } else {
            return redirect('/')->withErrors("Only author or moderator can delete vacancy");
        }
        return redirect('/');
    }

    public function approve(Request $request, Vacancy $vacancy)
    {
        $vacancy->update(['moderated' => true]);
        return redirect('/vacancy');
    }

    public function disapprove(Request $request, Vacancy $vacancy)
    {
        $vacancy->update(['moderated' => false]);
        return redirect('/vacancy');
    }
}
