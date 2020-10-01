<script>
    // Confirm Remove button
    window.onload = () => {
        document.querySelector('#trash-confirm').addEventListener('click', (e) => {
            const confirmation = confirm('Ste si istý?');
            if(confirmation === false) {
                e.preventDefault();
            }
        });
    };


// Clear Input Validation Alerts.
        const inputElements = document.querySelectorAll('.is-invalid');

        inputElements.forEach(function(inputEl){
            addEventListener('mousedown', function(e){
                if(e.target.className.includes('is-invalid') === true) {
                    setTimeout(function(){
                        e.target.classList.remove('is-invalid');}, 700);
                } 
            });
        });

// Clear Alert Messages
    let msgs = document.querySelectorAll('.alert');
        
        msgs.forEach(function(msg){
            
            setTimeout(() => {document.querySelector('.messages').remove();}, 5000);
        }); 
</script>