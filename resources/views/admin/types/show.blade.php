@extends('layouts.app')

@section('page-title', 'Il mio type')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1>Il mio type</h1>

            <ul>

                <li>
                    ID:{{ $type->id }}</th>
                </li>

                <li>
                    Titolo: {{ $type->name }}
                </li>

                <li>
                    Slug: {{ $type->slug }}
                </li>

                <li>
                    Progetti collegati:
                    <ul>
                        @foreach ($type->projects as $project)
                            <li>
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                    {{ $project->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>


        </div>
    </div>
@endsection
