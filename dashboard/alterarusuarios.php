<?php
    require_once '../classes/DB.php';
    $db = DB::get_instance();
    $table = 'usuarios';
    $usuarios = $db->find($table,[
        'order' => 'id'
    ]);

    
    require_once '../includes/top-dashboard.php';
?>

        <h1 class="text-center oneClickEdit" data-id="6" data-field="title" data-input="input">Alterar dados dos usuarios</h1><hr>
        <div class="col-md-10 col-md-offset-1">
            <p id="message" class="bg-info info text-center">&nbsp;</p>
            <table class="table table-bordered table-striped">
                <thead>
                <th>ID</th><th>First Name</th><th>cpf</th><th>login</th><th>senha</th><th>email</th><th>Role</th>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $contact): ?>
                        <tr>
                            <td><p><?=$contact->id?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="nome" data-input="input"><?=$contact->nome?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="cpf" data-input="input"><?=$contact->cpf?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="login" data-input="input"><?=$contact->login?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="senha" data-input="input"><?=$contact->senha?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="email" data-input="input"><?=$contact->email?></p></td>
                            <td><p class="oneClickEdit" data-id="<?=$contact->id?>" data-field="role" data-input="input"><?=$contact->role?></p></td>
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
<?php require_once '../includes/bottom-dashboard.php'; ?>
