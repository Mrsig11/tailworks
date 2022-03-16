@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-green-500 mb-3">{{ $job->title }}</h1>
<div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
    <p class="text-md text-gray-800">{{ $job->description }}</p>
    <span class="text-sm text-gray-600">{{ number_format($job->price / 100, 2, ',', ' ') }} FCFA</span>
</div>

<section x-data="{open:false}">
<a href="#" class="text-green-500" @click="open = !open">Cliquez ici pour soumettre une candidature</a>
<form action="{{ route('proposals.store', $job) }}" method="POST" class="" x-show="open" x-cloak>
    @csrf
    <textarea name="content" class="p-3 font-thin w-full max-w-lg" id="" cols="30" rows="10"></textarea>
    <button type="submit" class="block bg-green-500 text-white px-3 py-2">Soumettre ma lettre de candidature</button>
</form>
</section>
@endsection
