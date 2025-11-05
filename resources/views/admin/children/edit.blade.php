
@section('title', 'Edit Anak')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        Edit Anak: {{ $child->name }}
    </h1>

    <form action="{{ route('admin.orphanages.children.update', [$orphanage, $child]) }}" method="POST">
        @csrf @method('PUT')
        <div class="bg-white p-6 rounded-lg shadow">
            @include('admin.children._form', ['child' => $child]) <!-- KIRIM $child ASLI -->

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded font-medium hover:bg-blue-700">
                    Update Anak
                </button>
                <a href="{{ route('admin.orphanages.children.index', $orphanage) }}" 
                   class="text-gray-600 hover:text-gray-800 font-medium">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
