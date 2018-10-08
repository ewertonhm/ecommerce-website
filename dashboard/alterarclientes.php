<?php
    require_once '../classes/DB.php';
    $db = DB::get_instance();
    $table = 'clientes';
    $clientes = $db->find($table,[
        'order' => 'id'
    ]);
    require_once 'layout/header.php';
?>

        <h1 class="text-center oneClickEdit" data-id="6" data-field="title" data-input="input">Alterar dados dos clientes</h1><hr>
        <div class="col-md-10 col-md-offset-1">
            <p id="message" class="bg-info info text-center">&nbsp;</p>
            <table class="table table-bordered table-striped">
                <thead>
                <th>ID</th><th>Data de Nascimento</th><th>telefone</th><th>celular</th><th>endereço</th><th>cidade</th><th>estado</th>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><p><?=$cliente->id?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="datadenasc" data-input="input"><?=$cliente->datadenasc?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="teefone" data-input="input"><?=$cliente->telefone?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="celular" data-input="input"><?=$cliente->celular?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="endereco" data-input="input"><?=$cliente->endereco?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="cidade" data-input="input"><?=$cliente->cidade?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$cliente->id?>" data-field="estado" data-input="input"><?=$cliente->estado?></p></td>
                        </tr>
                    <?php endforeach; ?>   
                </tbody>
            </table>
        </div>
        <p id="message"></p>
            <script>
            function oneClickSuccess(resp){
                var r = JSON.parse(resp);
                if(r.success){
                    alertMessage("I have updated your user, sir!");
                }else{
                    alertMessage("oops... something has gone wrong.");
                }
            }    
                
            function alertMessage(msg){
                clearTimeout(window.timer);
                $('#message').html(msg);
                window.timer = setTimeout(function(){$('#message').html('&nbsp;');randomMessage();},5000);
                
            }
            
            function randomMessage(){
                var msgs = ['Hello','Welcome Back!','I missed you','Do you need to update a contact?','I\'m lonely...','My Name is Robert Paulson','They all float down here...',
                '\"Our great depression is our lives\"','Please talk to me...','Hey! Listem!','Get your stinking paws off me, you dammed durt ape!','You have my axe!','Chewie, we\'re home',
                'They call it a Royale with cheese','They\'re here!','My precious'];
            var msg = msgs[Math.floor(Math.random()*msgs.length)];
            alertMessage(msg);
            }
            
            $('.oneClickEdit').oneClickEdit({url : 'parser.php'},oneClickSuccess);
            
            
            $('document').ready(function(){
                randomMessage();
            });
            </script>
<?php require_once 'layout/footer.php'; ?>
