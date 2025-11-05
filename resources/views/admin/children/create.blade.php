
@section('title', 'Tambah Anak')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        Tambah Anak: {{ $orphanage->name }}
    </h1>

    <form action="{{ route('admin.orphanages.children.store', $orphanage) }}" method="POST">
        @csrf
        <div class="bg-white p-6 rounded-lg shadow">
            @include('admin.children._form', ['child' => null]) <!-- KIRIM $child = null -->

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded font-medium hover:bg-green-700">
                    Simpan Anak
                </button>
                <a href="{{ route('admin.orphanages.children.index', $orphanage) }}" 
                   class="text-gray-600 hover:text-gray-800 font-medium">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
