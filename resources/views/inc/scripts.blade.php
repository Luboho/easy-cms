<script>
    // ================================ REMOVE BUTTON CONFIRMATION====================================
    window.onload = () => {
        document.querySelector('#trash-confirm').addEventListener('click', (e) => {
            const confirmation = confirm('Ste si istý?');
            if(confirmation === false) {
                e.preventDefault();
            }
        });
    };
//================================== END OF REMOVE BUTTON CONFIRMATION====================================


//=======================================CLEAR INPUT VALIDATON ALERTS======================================
        const inputElements = document.querySelectorAll('.is-invalid');

        inputElements.forEach(function(inputEl){
            addEventListener('mousedown', function(e){
                if(e.target.className.includes('is-invalid') === true) {
                    setTimeout(function(){
                        e.target.classList.remove('is-invalid');}, 700);
                } 
            });
        });
//==================================== END OF CLEAR INPUT VALIDATON ALERTS===========================



//=====================================  CLEAR ALERT MESSAGES & CSS ====================================

    let msgs = document.querySelectorAll('.alert');
        
        msgs.forEach(function(msg){
            
            setTimeout(() => {document.querySelector('.messages').remove();}, 5000);
        }); 
// ======================================== END OF CLEAR ALERT MESSAGES ==================================


// ========================================SOCIAL MEDIA SHARE LINKS========================================


const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const pinterestBtn = document.querySelector(".pinterest-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");

function init() {

    let postUrl = encodeURI(document.location.href);
    let postTitle = document.querySelector('#title').textContent;
    // let postImg = encodeURI(pinterestImg.src);
    let postImg = document.querySelector(".share-img").src;
            
        
    facebookBtn.setAttribute(
        "href",
        `https://www.facebook.com/sharer.php?u=${postUrl}`
    );
    twitterBtn.setAttribute(
        "href",
        `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
    );
    pinterestBtn.setAttribute(
        "href",
        `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
    );
    linkedinBtn.setAttribute(
        "href",
        `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
    );
    whatsappBtn.setAttribute(
        "href",
        `https://www.wa.me/?text=${postTitle} ${postUrl}`
    );

};

init();
//================================= END OF SOCIAL MEDIA SHARE LINKS ==========================================

// ================================FACEBOOOK SHARE/LIKE BUTTON with LIKE counter ======================================= --}}

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk')
    );

// =========================================EN OF FACEBOOK SHARE / LIKE BUTTON==================================== --}}


</script>



