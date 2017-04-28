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

    public function all(Request $request)
    {
        $vacancies = Vacancy::all();
        $view = View::make('vacancy.list', [
            'vacancies' => $vacancies
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
            'email' => $request->user()->email,
            'moderated' => false,
        ]);

        return redirect('/vacancy');
    }

    public function view(Request $request, Vacancy $vacancy)
    {

    }

    public function destroy(Request $request, Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect('/');
    }

    public function approve(Request $request, Vacancy $vacancy)
    {
        $vacancy->update(['moderated' => !$vacancy->moderated]);
        return redirect('/vacancy');
    }
}
