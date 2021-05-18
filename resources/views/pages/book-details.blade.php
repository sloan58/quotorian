@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <livewire:pages.book-details :book="$book" />
@endsection
