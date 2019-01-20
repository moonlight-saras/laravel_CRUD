@extends('layouts.app')
@section('title')
    Blog
@stop
@section('content')
    @component('components.header')
    @endcomponent
    @component('components.menu')
    @endcomponent
    <div>
        <p>
            @if ($message = Session::get('success'))
                {{ $message }}
            @endif
        </p>
        <table>
            <thead>
                <tr>
                    <th>
                        Facebook
                    </th>
                    <th>
                        Twitter
                    </th>
                    <th>
                        Linkedin
                    </th>
                    <th>
                        Google
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>
                        {{ $setting->facebook }}
                    </td>
                    <td>
                        {{ $setting->twitter }}
                    </td>
                    <td>
                        {{ $setting->linkedin }}
                    </td>
                    <td>
                        {{ $setting->google }}
                    </td>
                    <td>
                        <form method="post" action="{{ action('BlogController@destroy', $setting->id) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="submit" value="Delete">
                        </form>
                        <a href="{{ action('BlogController@edit', $setting->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @component('components.footer')
    @endcomponent
@stop