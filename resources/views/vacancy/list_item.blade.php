<tr>
    <td class="table-text">
        <div>{{ $vacancy->name }}</div>
    </td>

    <td class="table-text">
        <div>{{ $vacancy->email }}</div>
    </td>

    @if (!Auth::guest())
        <td class="table-text">
            @if ($vacancy->moderated)
                <div>Approved</div>
            @else
                <div>Not approved</div>
            @endif
        </td>
    @endif
    <td>
        <a href="{{ url('/vacancy', $vacancy->id) }}">View</a>
    </td>
    @if (!Auth::guest())
        <td>
            @include('vacancy.delete_button')
            @include('vacancy.approve_button')
        </td>
    @endif
</tr>
