<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertElements = document.querySelectorAll('.alert');

        alertElements.forEach(function(alertElement) {
            alertElement.classList.add('show');
        });


        setTimeout(function() {
            alertElements.forEach(function(alertElement) {
                alertElement.remove();
            });
        }, 4000);

    });
</script>
