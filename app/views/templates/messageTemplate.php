
            <?php if($data["messagesBid"]) : ?>								
                <?php foreach($data['messagesBid'] as $message) :
                        //  $image = URL_ROOT . '/img/profiles/' . $message->sendIconImage;
                        ?>
                        <?php if($message->receiverId == $_SESSION['uId']) : 
                            // $GLOBALS['image']= URL_ROOT . '/img/profiles/' . $message->sendIconImage;
                            ?>
                            <div class="message-reciever">
                                <img src="<?=URL_ROOT?>/img/profiles/<?=$message->sendIconImage?>" />
                                <div class="msg-content">
                                    <p><?=$message->msgContent?></p>
                                    <span><?=$message->msgDate?></span>
                                </div>
                            </div>
                        <?php else :?>
                            <div class="current-user-sender icon-receiver">
                                <div class="msg-content">
                                    <p><?=$message->msgContent?></p>
                                    <span><?=$message->msgDate?> <i class="far fa-check"></i></span>
                                </div>
                                <img src="<?php echo URL_ROOT. '/img/profiles/' . $user->img_path; ?>" />
                            </div>
                        <?php endif;?>
                <?php endforeach;?>
            <?php else : ?>
        
            <?php endif;?>