@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
    <a href="{{ route('admin.orphanages.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
        Kelola Panti Asuhan
    </a>
</div>
@endsection