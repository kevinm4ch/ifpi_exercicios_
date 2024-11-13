<?php 
    session_start();
    $_SESSION['total_votos'];

    function votar(String $lang){
        $_SESSION['total_votos']++;

        switch($lang){
            case "python":
                $_SESSION['votos']['python']++;
            break;
            case "php":
                $_SESSION['votos']['php']++;
            break;
            case "java":
                $_SESSION['votos']['java']++;
            break;
            case "csharp":
                $_SESSION['votos']['csharp']++;
            break;
        }
    }

    function gerarBarra(int $votos = 0, int $totalVotos = 0){
        return ($votos * 100) / $totalVotos;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enquete</title>
    <style>

        .container{
            min-width: 400px;
            width: 60vw;
            margin: auto;
        }

        #title{
            background-color: #ccc;
            text-align: center;
        }

        #questao-enquete{
            display: block;
        }

        #questao-enquete .questao-op{
            margin: 5px 0;
            padding-left: 10px;
        }

        .box-btn{
            text-align: center;
            margin: 7px 0;
        }

        .result-bar{
            margin: 5px 0 7px 5px;
            background-color: black;
            height: 10px;
            width: 10px;

        }

        footer{
            text-align: center;
        }

        #python-result-bar{
            background-color: red;
        }

        
        #php-result-bar{
            background-color: green;
        }

        
        #java-result-bar{
            background-color: blue;
        }

        
        #csharp-result-bar{
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 id="title">Prova Prática - Enquete</h1>
        </header>
        <main>
            <section>
                <fieldset>
                    <legend>Enquete</legend>
                    <form method="POST">
                        <p>1. Qual a linguagem de Programação que você mais gosta ?</p>
                        <div id="questao-enquete">
                        <div class="questao-op"><input type="radio" name="lang" id="lang_python" value="python"><label for="lang_python">Python</label></div>
                        <div class="questao-op"><input type="radio" name="lang" id="lang_php" value="php"><label for="lang_php">PHP</label></div>
                        <div class="questao-op"><input type="radio" name="lang" id="lang_java" value="java"><label for="lang_java">Java</label></div>
                        <div class="questao-op"><input type="radio" name="lang" id="lang_csharp" value="csharp"><label for="lang_csharp">C#</label></div>
                        </div>
                        <div class="box-btn">
                            <button type="submit" id="btn-votar">Votar</button>
                        </div>
                    </form>
                </fieldset>
            </section>
            <hr class="divider">
            <section>
                <fieldset>
                    <legend>Resultado</legend>
                    <div class="resultado">
                        <ul>
                            <?php 
                                foreach($_SESSION['votos'] as $lang => $qtVotos):
                            ?>

                            <?php 
                                endforeach
                            ?>
                            <li>Python -  0%</li>
                            <div id="python-result-bar" class="result-bar" style="width: 0%"></div>
                            <li>PHP - 0%</li>
                            <div id="php-result-bar" class="result-bar" style="width: 0%"></div>
                            <li>Java - 0%</li>
                            <div id="java-result-bar" class="result-bar" style="width: 0%"></div>
                            <li>C# - 0%</li>
                            <div id="csharp-result-bar" class="result-bar" style="width: 0%"></div>
                        </ul>
                    </div>
                </fieldset>
            </section>
        </main>
        <footer>
            <p>&copy;Sistema de Enquete - IFPI 2024</p>
            <p>Feito por <strong>Kevin Machado</strong></p>
        </footer>
        <hr class="divider">
    </div>
<?php 
    if(isset($_POST['lang'])){
       votar($_POST['lang']);
       
    }
?>
</body>
</html>
