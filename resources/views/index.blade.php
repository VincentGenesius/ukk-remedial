<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-3xl mx-auto flex justify-between items-center my-4">
        <h1 class="text-2xl font-bold">DAFTAR SISWA</h1>

        <form action="{{ route('students.reset') }}" method="POST">
            @csrf

            <button type="submit" class="p-2 text-white bg-red-600 hover:bg-red-800 transition-colors">Delete
                Students</button>
        </form>
    </div>f

    @if (empty($students))
        <p class="text-red-500 text-center py-4">Belum ada data siswa yang dikirim.</p>
    @else
        <table class="max-w-3xl mx-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2 text-left">Foto</th>
                    <th class="border border-gray-300 p-2 text-left">NISN</th>
                    <th class="border border-gray-300 p-2 text-left">Nama</th>
                    <th class="border border-gray-300 p-2 text-left">Jenis Kelamin</th>
                    <th class="border border-gray-300 p-2 text-left">Tanggal Lahir</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border border-gray-300 text-center">
                            <img class="border border-gray-300 p-2 text-center w-20 h-20 object-cover mx-auto rounded"
                                src="{{ asset('uploads' . '/' . $student['photo']) }}">
                            <div class="border border-gray-300 p-2 text-center">{{ $student['nisn'] }}</div>
                            <div class="border border-gray-300 p-2">{{ $student['name'] }}</div>
                            <div class="border border-gray-300 p-2 text-center">{{ $student['gender'] }}</div>
                            <div class="border border-gray-300 p-2 text-center">{{ $student['birth_date'] }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>