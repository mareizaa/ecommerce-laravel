<template>
    <div>

    </div>
</template>

<script>

export default ({
    el:'#app',
    data() {
        return {
            arrayProduct:[],
        }
    },
    methods:{
        pushProducts (product){
            this.arrayProduct.push(product);
        }
    }
})

</script>
