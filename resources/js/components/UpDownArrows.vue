<template>
<div>
    <div class="up-down">
        <p>
            <button class="up-btn bt-lg">
                <a href="#up" title="Hore"><i class="fa fa-angle-double-up"></i></a>
            </button>
        </p>

        <p>
            <button class="down-btn bt-lg">
                <a href="#down" title="Dole"><i class="fa fa-angle-double-down"></i></a>
            </button>
        </p>
    </div>
</div>   
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

    .up-down {
        position:fixed;
        z-index: 100;
        top: 80%;
        right:1%;
    }
    .up-down button {
        /* background-color: rgba(5, 4, 4, 0.63); */
        transition-property: background-color;
        /* transition-delay: 0.5s; */
        transition-duration: 0.5s;
        border-radius: 3px;
    } 
        
    
    .up-btn>a, .down-btn>a {
        font: normal bold 2em/100% Arial;
        color: rgba(58, 58, 57, 0.5);
        text-shadow: 2px 2px 2px whitesmoke;
        transition: opacity 1s;
    }
    .up-btn>a:hover, .down-btn>a:hover {
        opacity: 1;
        text-decoration: none;
    }

    @media only screen and (max-width: 500px) {
        .up-btn a, .down-btn a {
            font-size: 1.7em;
        }
    }
    
</style>