@if (null !== Auth::user())
    @if ($vacancy->can_delete(Auth::user()))
        <form action="/vacancy/{{ $vacancy->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button>Delete</button>
        </form>
    @endif
@endif