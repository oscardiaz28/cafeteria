<div class="alert-container">
        <?php foreach($alertas as $key => $mensajes):
                foreach($mensajes as $mensaje):
        ?>
                <p class="alert <?php echo $key ?>"><?php echo $mensaje ?></p>

        <?php        
                endforeach;
        endforeach; 
        ?>
</div>
