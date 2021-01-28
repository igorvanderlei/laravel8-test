<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </body>

        Hello

@can("create", App\Models\Funcionario::class)
       Pode criar Funcionarios
@endcan    
    </body>
</html>
