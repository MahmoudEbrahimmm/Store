@extends('layouts.dashboard')
@section('title-url', 'Profile Edit')
@section('title-page', 'Profile Edit')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-group">
            <label class="mb-2">First Name</label>
            <input type="text" name="first_name" class="form-control mb-3 @error('first_name') is-invalid @enderror"
                value="{{ old('first_name') ?? $user->profile->first_name }}">
            @error('first_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Last Name</label>
            <input type="text" name="last_name" class="form-control mb-3 @error('last_name') is-invalid @enderror"
                value="{{ old('last_name') ?? $user->profile->last_name }}">
            @error('last_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Birthday</label>
            <input type="date" name="birthday" class="form-control mb-3 @error('birthday') is-invalid @enderror"
                value="{{ old('birthday') ?? $user->profile->birthday }}">
            @error('birthday')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" @checked($user->profile->gender == 'male')>
                <label class="form-check-label">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" @checked($user->profile->gender == 'female')>
                <label class="form-check-label">
                    Female
                </label>
            </div>
            @error('gender')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">Street Address</label>
            <input type="text" name="street_address"
                class="form-control mb-3 @error('street_address') is-invalid @enderror"
                value="{{ old('street_address') ?? $user->profile->street_address }}">
            @error('street_address')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">City</label>
            <input type="text" name="city" class="form-control mb-3 @error('city') is-invalid @enderror"
                value="{{ old('city') ?? $user->profile->city }}">
            @error('city')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="mb-2">State</label>
            <input type="text" name="state" class="form-control mb-3 @error('state') is-invalid @enderror"
                value="{{ old('state') ?? $user->profile->state }}">
            @error('state')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <select name="country" class="form-select mb-3 @error('country') is-invalid @enderror">
            @foreach ($countries as $country)
                <option value="{{ is_object($country) ? $country->id : $country }}" @selected(is_object($country) ? $user->profile->country == $country->id : $user->profile->country == $country)>
                    {{ is_object($country) ? $country->name : $country }}
                </option>
            @endforeach
        </select>
        <select name="local" class="form-select mb-3 @error('local') is-invalid @enderror">
            @foreach ($locales as $local)
                <option value="{{ is_object($local) ? $local->id : $local }}" @selected(is_object($local) ? $user->profile->local == $local->id : $user->profile->local == $local)>
                    {{ is_object($local) ? $local->name : $local }}
                </option>
            @endforeach
        </select>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
@endsection
