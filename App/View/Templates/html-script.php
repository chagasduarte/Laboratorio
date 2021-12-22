<script src="<?php echo $js ?>/bootstrap.min.js"></script>
<script src="<?php echo $js ?>/jquery.min.js"></script>
<script src="<?php echo $js ?>/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script type="text/javascript">
    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.celular').mask(SPMaskBehavior, spOptions);
    $('.cep').mask('00000-000');
</script>
