@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <livewire:edit-book :book="$book" />
@endsection
