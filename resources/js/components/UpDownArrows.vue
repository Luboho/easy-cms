<template>
<div>
    <div class="up-down">
        <p>
            <button class="up-btn bt-lg">
                <a href="#up"><i class="fa fa-angle-double-up"></i></a>
            </button>
        </p>

        <p>
            <button class="down-btn bt-lg">
                <a href="#down"><i class="fa fa-angle-double-down"></i></a>
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
        top: 74%;
        right: 5px;
    }
    .up-down button {
        background-color: rgba(5, 4, 4, 0.63);
        border: 1px solid silver;
        box-shadow:snow;
        transition-property: background-color;
        /* transition-delay: 0.5s; */
        transition-duration: 0.5s;
        border-radius: 4px;
    } 
        .up-down button:hover {
            background-color: black;
        }
    
    .up-btn>a, .down-btn>a {
        opacity: 0.5;
        font: normal bold 2em/100% Arial;
        color: rgb(89, 88, 79);
        text-shadow: 2px 2px 2px whitesmoke;
        transition: opacity 1s;
    }
    .up-btn>a:hover, .down-btn>a:hover {
        opacity: 1;
        text-decoration: none;
    }

    @media only screen and (max-width: 500px) {
        .up-btn a, .down-btn a {
            font-size: 1em;
        }
    }
    
</style>