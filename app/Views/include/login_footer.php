</div>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.r-input').click(function() {
                    $('input:not(:checked)').parent().removeClass("active");
                    $('input:checked').parent().addClass("active");
                });
            });
        </script>
    </body>
</html>