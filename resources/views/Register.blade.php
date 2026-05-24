<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Usuario</title>

    @vite('resources/css/app.css')
</head>

<body>

    <div class="container">

        <h1>Registro de Estudiante</h1>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">

            @csrf

            <label for="name">Nombre:</label>

            <input
                type="text"
                id="name"
                name="name"
                required
            >

            <label for="email">Correo:</label>

            <input
                type="email"
                id="email"
                name="email"
                required
            >

            <label for="password">Contraseña:</label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <label for="password_confirmation">
                Confirmar Contraseña:
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
            >

            <label for="career_id">Carrera:</label>

            <select name="career_id" id="career_id" required>

                @foreach($careers as $career)

                    <option value="{{ $career->id }}">
                        {{ $career->name }}
                    </option>

                @endforeach

            </select>

            <label for="terms_accepted">

                <input
                    type="checkbox"
                    name="terms_accepted"
                    id="terms_accepted"
                    required
                >

                Acepto los términos y condiciones

            </label>

            <br><br>

            <button type="submit">
                Registrar
            </button>

        </form>

    </div>

</body>

</html>