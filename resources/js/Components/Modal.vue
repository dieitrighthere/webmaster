<template>
    <teleport to="body">
        <div v-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region>
            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
                @enter="startedOpening"
                @after-leave="finishedClosing"
            >
                <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            </transition>

            <transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div
                    v-show="show"
                    class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"
                    :class="maxWidthClass"
                >
                    <div v-if="$slots.default" class="px-6 py-4">
                        <slot />
                    </div>
                </div>
            </transition>
        </div>
    </teleport>
</template>

<script>
export default {
    name: 'Modal',
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        maxWidth: {
            type: String,
            default: '2xl',
        },
        closeable: {
            type: Boolean,
            default: true,
        },
    },
    emits: ['close'],
    computed: {
        maxWidthClass() {
            return {
                'sm': 'sm:max-w-sm',
                'md': 'sm:max-w-md',
                'lg': 'sm:max-w-lg',
                'xl': 'sm:max-w-xl',
                '2xl': 'sm:max-w-2xl',
            }[this.maxWidth]
        }
    },
    methods: {
        close() {
            if (this.closeable) {
                this.$emit('close')
            }
        },
        startedOpening() {
            document.body.style.overflow = 'hidden'
        },
        finishedClosing() {
            document.body.style.overflow = null
        },
    },
}
</script>
