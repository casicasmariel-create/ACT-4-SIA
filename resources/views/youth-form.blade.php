<!DOCTYPE html>
<html>
<head>
    <title>Youth Registration</title>

    <style>
        body {
            background: linear-gradient(to right, #ffc0cb, #ffb6c1);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            color: #ff69b4;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background: #ff69b4;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #ff1493;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Youth Activity Registration</h2>

    <!-- SUCCESS -->
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <!-- ALL ERRORS -->
    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/youth-form">
        @csrf

        <input type="text" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}">
        @error('full_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <input type="number" name="age" placeholder="Age" value="{{ old('age') }}">
        @error('age')
            <div class="error">{{ $message }}</div>
        @enderror

        <select name="activity">
            <option value="">Select Activity</option>
            <option value="Bible Study" {{ old('activity') == 'Bible Study' ? 'selected' : '' }}>Bible Study</option>
            <option value="Youth Camp" {{ old('activity') == 'Youth Camp' ? 'selected' : '' }}>Youth Camp</option>
            <option value="Outreach" {{ old('activity') == 'Outreach' ? 'selected' : '' }}>Outreach</option>
        </select>
        @error('activity')
            <div class="error">{{ $message }}</div>
        @enderror

        <textarea name="message" placeholder="Why do you want to join?">{{ old('message') }}</textarea>
        @error('message')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>