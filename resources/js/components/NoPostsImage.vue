<template>
    <div>
        <div id="no-posts" class="container">
            <span class="center">
                <img src="storage/default-pics/no-posts.png">
            </span>
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
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    
</style>