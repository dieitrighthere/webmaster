<template>
    <div v-show="message" class="text-sm text-red-600">
        {{ message }}
    </div>
</template>

<script>
export default {
    name: 'InputError',
    props: {
        message: String,
    }
}
</script>
