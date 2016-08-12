@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (!Auth::guest())
                    @include('vacancy.form')
                @endif

                @if (count($vacancies) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current Vacancies
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Title</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                </thead>

                                <tbody>
                                @foreach ($vacancies as $vacancy)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $vacancy->name }}</div>
                                        </td>

                                        <td class="table-text">
                                            <div>{{ $vacancy->email }}</div>
                                        </td>

                                        <td>
                                            <!-- TODO: View link -->
                                        </td>
                                        <td>
                                            <!-- TODO: Delete Button -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
