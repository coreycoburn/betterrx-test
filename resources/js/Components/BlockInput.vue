<template>
    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" v-text="field" />
        <div class="mt-1 sm:col-span-2 sm:mt-0">
            <div class="flex max-w-lg rounded-md shadow-sm">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BlockInput',

    props: {
        field: {
            type: String,
            required: true,
        },
    },
}
</script>
