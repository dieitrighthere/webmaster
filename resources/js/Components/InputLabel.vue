<template>
    <label :class="classes">
        <slot />
    </label>
</template>

<script>
export default {
    name: 'InputLabel',
    props: {
        value: String,
        class: String,
    },
    computed: {
        classes() {
            return [
                'block font-medium text-sm text-gray-700',
                this.class
            ]
        }
    }
}
</script>
