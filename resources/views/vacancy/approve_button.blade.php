@if (null !== Auth::user() && Auth::user()->is_moderator())
    <form action="/vacancy/approve/{{ $vacancy->id }}" method="POST">
        {{ csrf_field() }}

        @if ($vacancy->moderated)
            <button>Disapprove</button>
        @else
            <button>Approve</button>
        @endif
    </form>
@endif