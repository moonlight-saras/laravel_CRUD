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
        <form method="post" action="{{ (isset($setting)) ? action('BlogController@update', $id) : url('blog') }}">
            {{ csrf_field() }}
            @if(isset($setting))
                <input name="_method" type="hidden" value="PATCH">
            @endif
            <label>Facebook</label>
            <input type="text" name="facebook" value="{{ (isset($setting)) ? $setting->facebook : old('facebook') }}" />
            @if($errors->has('facebook'))
                {{ $errors->first('facebook') }}
            @endif
            <br />
            <label>Twitter</label>
            <input type="text" name="twitter" value="{{ (isset($setting)) ? $setting->twitter : old('twitter') }}" />
            @if($errors->has('twitter'))
                {{ $errors->first('twitter') }}
            @endif
            <br />
            <label>Linkedin</label>
            <input type="text" name="linkedin" value="{{ (isset($setting)) ? $setting->linkedin : old('linkedin') }}" />
            <br />
            <label>Google</label>
            <input type="text" name="google" value="{{ (isset($setting)) ? $setting->google : old('google') }}" />
            <br />
            <input type="submit" value="Submit">
        </form>
    </div>
    @component('components.footer')
    @endcomponent
@stop