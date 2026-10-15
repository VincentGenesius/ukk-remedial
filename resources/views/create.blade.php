<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-3xl mx-auto my-4">
        <h1 class="text-center text-2xl font-bold mb-4">FORM SISWA</h1>


        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- nisn -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">NISN</label>
                <select id="nisn" name="nisn" required class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih NISN</option>
                    @foreach ($students as $student)
                        <option value="{{ $student['nisn'] }}">{{ $student['nisn'] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- nama -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Nama</label>
                <input type="text" id="name" name="name" readonly class="w-full border border-gray-300 bg-gray-50 rounded p-2 focus:outline-none">
            </div>

            <!-- jenis kelamin -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Jenis Kelamin</label>
                <input type="text" id="gender" name="gender" readonly class="w-full border border-gray-300 bg-gray-50 rounded p-2 focus:outline-none">
            </div>

            <!-- tanggal lahir -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Tanggal Lahir</label>
                <input type="date" id="birth_date" name="birth_date" readonly class="w-full border border-gray-300 bg-gray-50 rounded p-2 focus:outline-none">
            </div>

            <!-- input gambar -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Foto</label>
                <input type="file" name="photo" id="file-input" accept="image/*" class="w-full border border-gray-300 bg-gray-50 rounded p-2 focus:outline-none"/>
            </div>

            <!-- submit button -->
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600 transition">
                Submit
            </button>
        </form>
    </div>

    <script>
        const dataStudent = @json($students);

        const selectNisn = document.getElementById('nisn');
        const inputName = document.getElementById('name');
        const inputGender = document.getElementById('gender');
        const inputBirthDate = document.getElementById('birth_date');

        selectNisn.addEventListener('change', function () {
            const selectedNisn = this.value;

            const foundStudent = dataStudent.find(s => s.nisn === selectedNisn);

            if (selectedNisn && foundStudent) {
                inputName.value = foundStudent.name;
                inputGender.value = foundStudent.gender;
                inputBirthDate.value = foundStudent.birth_date;
            } else {
                inputName.value = '';
                inputGender.value = '';q
                inputBirthDate.value = '';
            }
        });
    </script>
</body>

</html>