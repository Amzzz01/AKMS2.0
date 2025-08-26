@extends('layouts.admin')
@section('content')

<div class="container">
    <h1>Edit Anak Kariah</h1>

    <style>
        body {
            font-family: 'Amiri', serif;
            background: linear-gradient(180deg, rgb(187, 213, 236), #e6eff9);
            margin: 0;
            padding: 0;
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
        textarea:focus {
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

        .btn-secondary {
            background-color: #e2e8f0;
            border-color: #e2e8f0;
            color: #333;
            transition: all 0.3s ease-in-out;
            padding: 8px 12px;
        }

        .btn-secondary:hover {
            background-color: #cbd5e1;
            border-color: #cbd5e1;
        }

        button:hover {
            background-color: #005f73;
            transform: translateY(-3px);
        }

        .alert-danger {
            color: #e63946;
            font-size: 0.9rem;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Add Flexbox styling for button alignment */
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            width: 70%; /* Make Kemaskini button larger */
        }

        .btn-secondary {
            width: 25%; /* Make Batal button smaller */
        }

    </style>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('anak-kariah.update', $anakKariah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="full_name">Nama Penuh:</label>
        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $anakKariah->full_name) }}" required>

        <label for="ic_number">Nombor IC:</label>
        <input type="text" name="ic_number" id="ic_number" class="form-control" value="{{ old('ic_number', $anakKariah->ic_number) }}" required>

        <label for="phone_number">Nombor Telefon:</label>
        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $anakKariah->phone_number) }}" required>

        <label for="address">Alamat:</label>
        <textarea name="address" id="address" class="form-control" required>{{ old('address', $anakKariah->address) }}</textarea>

        <label for="areas">Kawasan:</label>
        <input type="text" name="area" id="areas" class="form-control" value="{{ old('areas', $anakKariah->areas) }}" required>

        <label for="date_of_birth">Tarikh Lahir:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $anakKariah->date_of_birth) }}" required>

        <div class="button-container">
            <button type="submit" class="btn btn-primary">Kemaskini</button>
            <a href="{{ route('anak-kariah.list') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection
