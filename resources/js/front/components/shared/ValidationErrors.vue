<template>
    <div class="error-div">
        <small class="text_danger" v-for="(err, index) in errors" :key="key(index)">{{ err }}</small>
    </div>
</template>

<script>
export default {
    props: ['errors'],
    methods: {
        key(index) {
            return `validation_error_${index}_${Math.random()}`
        }
    }
}
</script>

<style scoped>
.error-div {
    width: 100%;
}

.error-div small {
    color: red;
}
</style>
