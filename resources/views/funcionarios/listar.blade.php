<!DOCTYPE html>
<html>
    <body>
        <table>
            <tr><th>Nome</th><th>Endereço</th></tr>
            @foreach($funcionarios as $funcionario)
                <tr><td>{{$funcionario->nome}}</td>
                    <td>{{$funcionario->endereco}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>