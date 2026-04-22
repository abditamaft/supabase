<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-200 p-8 font-sans">
    <div class="max-w-2xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-yellow-500 mb-6">Edit Biodata</h2>
        
        <form action="{{ route('biodatas.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-400 mb-2">NIM</label>
                <input type="text" name="nim" value="{{ $biodata->nim }}" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $biodata->name }}" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400 mb-2">Jurusan</label>
                <select name="department_id" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-blue-500" required>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ $biodata->department_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-400 mb-2">Alamat</label>
                <textarea name="address" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white focus:outline-none focus:border-blue-500">{{ $biodata->address }}</textarea>
            </div>
            <div class="mb-6">
                <label class="block text-gray-400 mb-2">Ganti Foto Profil (Biarkan kosong jika tidak diganti)</label>
                <input type="file" name="profile_photo" class="w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                @if($biodata->profile_photo)
                    <div class="mt-3">
                        <p class="text-sm text-gray-500 mb-1">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $biodata->profile_photo) }}" class="w-20 h-20 rounded border border-gray-600 object-cover">
                    </div>
                @endif
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('biodatas.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded transition">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 font-semibold rounded shadow transition">Update Data</button>
            </div>
        </form>
    </div>
</body>
</html>