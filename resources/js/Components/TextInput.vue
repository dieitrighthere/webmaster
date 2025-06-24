<template>
    <input
        :class="classes"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>

<script>
export default {
    name: 'TextInput',
    props: {
        modelValue: String,
        class: String,
    },
    emits: ['update:modelValue'],
    computed: {
        classes() {
            return [
                'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm',
                this.class
            ]
        }
    }
}
</script>
