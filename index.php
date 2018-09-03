<?php require_once 'calculaTrocoClass.php'; ?>        
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>Calcula Troco</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>.col-centered{float: none;margin: 0 auto;}
            .main-form-calcula{margin-top: 15px;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-centered main-form-calcula"> 
                    <?php
                    if (!empty($_POST["pago"]) && !empty($_POST["devido"])) {

                        $pagamento = new calculaTrocoClass($_POST["pago"], $_POST["devido"]);
                        $troco = $pagamento->getTroco();
                        $stillOwes = $pagamento->retornaTroco();
                    }
                    ?>
                    <form action="index.php" method="post" class="form-horizontal">
                        <fieldset>
                            <legend>Calcula Troco</legend>
                            <div class="form-group">
                                <label class="control-label" for="textinput">Total Devido</label>  
                                <div class="">
                                    <input name="devido" placeholder="Digite o valor total que o cliente tem que pagar" class="form-control input-md" required="" type="text">

                                </div>
                            </div>                       
                            <div class="form-group">
                                <label class="control-label" for="pago">Valor Pago</label>  
                                <div class="">
                                    <input name="pago" placeholder="Digite o valor que foi pago pelo cliente" class="form-control input-md" required="" type="text">
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="control-label" for="singlebutton"></label>
                                <div class="">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Calcular troco</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>