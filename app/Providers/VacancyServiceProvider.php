<?php

namespace App\Providers;

use App\User;
use App\Vacancy;
use Illuminate\Support\ServiceProvider;
use Mail;

class VacancyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Vacancy::creating(function (Vacancy $vacancy) {
            $moderated = Vacancy::where([
                'user_id' => $vacancy->user_id,
                'moderated' => 1,
            ])->count();

            if ($moderated) {
                $vacancy->moderated = 1;
            }
            return $vacancy;
        });

        Vacancy::created(function (Vacancy $vacancy) {
            $vacancyUrl = url('/vacancy', ['vacancy' => $vacancy]);
            if ($vacancy->moderated === 0) {
                $admin = User::where('role', User::ROLE_MODERATOR)->first();
                foreach ([$vacancy->user()->first(), $admin] as $user) {
                    Mail::raw("View: $vacancyUrl", function ($m) use ($user) {
                        $m->from($user->email, 'Vacancies App');
                        $m->to($user->email, $user->name)->subject('New vacancy!');
                    });
                }
            }
        });
    }

    public function register() {}
}
