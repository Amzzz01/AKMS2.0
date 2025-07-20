<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekod Anak Kariah</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Reuse the same CSS styles from the previous file */
        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(180deg, rgb(187, 213, 236), #e6eff9);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #005f73;
            color: white;
            padding: 6px 1px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 5px 40px;
            font-size: 1.5rem;
        }

        header a {
            color: white;
            margin: 5px 35px;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 20px;
            background-color: #0a9396;
            border-radius: 11px;
            transition: background-color 0.3s ease;
        }

        header a:hover {
            background-color: #003f4c;
        }

        body {
            padding-top: 80px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #0a9396;
        }

        input[type="text"],
        textarea,
        select,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            transition: box-shadow 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(10, 147, 150, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #0a9396;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #005f73;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <header>
        <h1>Tambah Rekod Anak Kariah</h1>
        <a href="{{ route('anak-kariah.list') }}"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
    </header>

    <div class="container">
        <form id="anak-kariah-form" action="{{ route('anak-kariah.stored') }}" method="POST">
            @csrf
            <label for="full_name">Nama Penuh:</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="Masukkan nama penuh anda" required>

            <label for="ic_number">Nombor IC:</label>
            <input type="text" id="ic_number" name="ic_number" value="{{ old('ic_number') }}" placeholder="Contoh: 890101-01-1234" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" placeholder="Masukkan alamat anda" required>{{ old('address') }}</textarea>

            <label for="areas">Kawasan:</label>
            <select id="areas" name="areas" required>
                <option value="" disabled selected>Pilih Kawasan</option>
                <option value="Kampung Luar" {{ old('area') == 'Kampung Luar' ? 'selected' : '' }}>Kampung Luar</option>
                <option value="Kampung Padang Mengkudu" {{ old('area') == 'Kampung Padang Mengkudu' ? 'selected' : '' }}>Kampung Padang Mengkudu</option>
                <option value="Kampung Tengah" {{ old('area') == 'Kampung Tengah' ? 'selected' : '' }}>Kampung Tengah</option>
                <option value="Lorong Kenanga" {{ old('area') == 'Lorong Kenanga' ? 'selected' : '' }}>Lorong Kenanga</option>
                <option value="Lorong Penghulu Lama" {{ old('area') == 'Lorong Penghulu Lama' ? 'selected' : '' }}>Lorong Penghulu Lama</option>
                <option value="Lorong Tok Imam" {{ old('area') == 'Lorong Tok Imam' ? 'selected' : '' }}>Lorong Tok Imam</option>
                <option value="Taman Bagan Indah" {{ old('area') == 'Taman Bagan Indah' ? 'selected' : '' }}>Taman Bagan Indah</option>
                <option value="Taman Bagan Permai" {{ old('area') == 'Taman Bagan Permai' ? 'selected' : '' }}>Taman Bagan Permai</option>
                <option value="Taman Desa Kiara" {{ old('area') == 'Taman Desa Kiara' ? 'selected' : '' }}>Taman Desa Kiara</option>
                <option value="Taman Seri Bagan" {{ old('area') == 'Taman Seri Bagan' ? 'selected' : '' }}>Taman Seri Bagan</option>
            </select>

            <label for="phone_number">Nombor Telefon:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Contoh: 012-3456789" required>

            <label for="gender">Jantina:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Pilih Jantina</option>
                <option value="Lelaki" {{ old('gender') == 'Lelaki' ? 'selected' : '' }}>Lelaki</option>
                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <label for="date_of_birth">Tarikh Lahir:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>

            <button type="submit">Tambah Rekod</button>
        </form>
    </div>
</body>
</html>
