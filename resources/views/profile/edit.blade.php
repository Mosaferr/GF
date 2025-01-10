@extends('layouts.app')

@section('title', 'Profil')
@section('head-scripts')
    @vite('resources/css/style.css')
@endsection

@section('content')
<main class="custom-margin-top">
    <div class="container my-5" style="max-width: 1000px;">
        <div class="row">
            <div class="col-md-12 text-start pb-3 mt-2">
                <h3>Twój profil</h3>
                <hr>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="">
            <div class="p-4 sm:p-8 sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="p-4 sm:p-8 sm:rounded-lg">
                @include('profile.partials.update-password-form')
            </div>
            <div class="p-4 sm:p-8 sm:rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>
            <div class=" sm:p-8 sm:rounded-lg">
                @include('profile.partials.delete-client-form', ['clients' => $clients])
            </div>
        </div>
    </div>
</main>
@endsection
