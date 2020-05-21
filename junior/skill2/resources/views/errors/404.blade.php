@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Page not found'))

@section('image')
    <div style="background-image: url({{ asset('/svg/404.jpg') }}); background-size: contain;" class="absolute pin bg-cover background_img">
    </div>
@endsection


@section('message', __($exception->getMessage() ?: 'Sorry, Page not found.'))
