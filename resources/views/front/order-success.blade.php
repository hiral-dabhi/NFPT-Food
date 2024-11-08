@extends('front.layouts.app')
@section('title')
    {{ __('Home') }}
@endsection
@section('content')
    @livewire('front.order-success')
@endsection

@section('scripts')
    <script>
        console.log('hereee');
    </script>
@endsection
