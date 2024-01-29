<script>
    $(document).ready(function () {
        new PNotify({title: 'Oh No!', text: '<?= $user->error ?>', type: 'error', styling: 'bootstrap3'});
    })
</script>