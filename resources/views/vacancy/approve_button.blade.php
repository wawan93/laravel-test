@if (null !== Auth::user() && Auth::user()->is_moderator())
    <form action="/vacancy/{{ $vacancy->moderated ? 'disapprove' : 'approve' }}/{{ $vacancy->id }}" method="POST">
        {{ csrf_field() }}

            <button>{{ $vacancy->moderated ? 'Disapprove' : 'Approve' }}</button>
    </form>
@endif