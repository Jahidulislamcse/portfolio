@extends('layouts.master')

@section('title', 'Branches')

@section('content')

<div class="max-w-7xl mx-auto card-container">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl tracking-tight">
            @if(!empty($setting->branches_header))
                {{ $setting->branches_header }} 
            @endif</h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-500">
            @if(!empty($setting->branches_desc))
                {{ $setting->branches_desc }} 
            @endif
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($branches as $branch)
        <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
            <div class="flex-shrink-0">
                @if($branch->image)
                <img alt="{{ $branch->name }}" class="h-48 w-full object-cover" src="{{ asset('upload/' . $branch->image) }}">
                @else
                <img alt="{{ $branch->name }}" class="h-48 w-full object-cover" src="https://via.placeholder.com/400x200?text=No+Image">
                @endif
            </div>
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div>
                    <p class="text-sm font-medium text-[var(--primary-color)]">{{ $branch->address ?? 'Location Unknown' }}</p>
                    <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ $branch->name }}</h3>
                    <p class="mt-3 text-base text-gray-500">
                        @if(!empty($branch->phone))
                            Phone: {{ $branch->phone }} <br>
                        @endif

                        @if(!empty($branch->email))
                            Email: {{ $branch->email }}
                        @endif
                    </p>

                </div>
                <div class="mt-6">
                    <a href="{{ $branch->link ?? '#' }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[var(--primary-color)] hover:bg-opacity-90">
                        Visit Branch
                    </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .card-container {
        margin-top: 50px;
        margin-bottom: 80px;
    }
</style>
@endsection