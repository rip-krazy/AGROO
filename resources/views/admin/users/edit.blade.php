@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>
        
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama
                    </label>
                    <input type="text" id="name" value="{{ $user->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" id="email" value="{{ $user->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                        Role
                    </label>
                    <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($roles as $role)
                            <option value="{{ $role->value }}" {{ $user->role === $role->value ? 'selected' : '' }}>
                                {{ ucfirst($role->value) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4" id="jabatan-field">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jabatan">
                        Jabatan
                    </label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ $user->jabatan }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan jabatan">
                    @error('jabatan')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Sembunyikan field jabatan jika role bukan karyawan
        document.getElementById('role').addEventListener('change', function() {
            const jabatanField = document.getElementById('jabatan-field');
            if (this.value === 'karyawan') {
                jabatanField.style.display = 'block';
            } else {
                jabatanField.style.display = 'none';
            }
        });

        // Jalankan saat pertama kali load
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const jabatanField = document.getElementById('jabatan-field');
            if (roleSelect.value !== 'karyawan') {
                jabatanField.style.display = 'none';
            }
        });
    </script>
@endsection