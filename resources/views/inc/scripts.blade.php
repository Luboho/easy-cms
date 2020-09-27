<script>
    // Confirm Remove button
    window.onload = () => {
        document.querySelector('#trash-confirm').addEventListener('click', (e) => {
            const confirmation = confirm('Ste si istý?');
            if(confirmation === false) {
                e.preventDefault();
            }
        });
    }
</script>