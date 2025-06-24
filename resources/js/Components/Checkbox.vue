<template>
    <input
        type="checkbox"
        :value="value"
        :checked="checked"
        @change="$emit('update:checked', $event.target.checked)"
        :class="classes"
        ref="input"
    />
</template>

<script>
export default {
    name: 'Checkbox',
    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
        class: String,
    },
    emits: ['update:checked'],
    computed: {
        classes() {
            return [
                'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
                this.class
            ]
        }
    }
}
</script>
