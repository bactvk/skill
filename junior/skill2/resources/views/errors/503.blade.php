@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('Service Unavailable'))

@section('image')
    <div style="background-image: url({{ asset('/svg/503.jpg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center background_img">
    </div>
@endsection


@section('message', __($exception->getMessage() ?: 'Sorry, we are doing some maintenance. Please check back soon.'))
