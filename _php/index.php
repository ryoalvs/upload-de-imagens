<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: flex;
            margin-bottom: 15px;
        }
        input{
            display: flex;
        }
    </style>
</head>
<body>
    <form action="inserir.php" method="post" enctype="multipart/form-data">
    <label for="imagem">Selecione uma imagem para upload: </label>
        <input type="file" name="imagem" id="imagem" accept="image/*">
        <input type="submit" value="Pronto" name="submit">
    </form>
</body>
</html>