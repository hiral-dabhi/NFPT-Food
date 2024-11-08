@extends('front.layouts.app')
@section('title')
    {{ __('Business Detail') }}
@endsection
@section('content')
    @livewire('front.business-detail', ['business' => $business])
@endsection
@section('scripts')
  
@endsection
