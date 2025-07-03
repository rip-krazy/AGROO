@extends('home')
@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Edit Unit</h2>
    <form action="{{ route('admin.unit.update', $unit->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="nama" value="{{ $unit->nama }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border px-3 py-2 rounded">{{ $unit->deskripsi }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium">Lokasi</label>
            <input type="text" name="lokasi" value="{{ $unit->lokasi }}" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $unit->tanggal }}" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
