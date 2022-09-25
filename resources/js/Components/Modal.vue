<template>
    <transition-root as="template" :show="open">
        <dialog-wrapper as="div" class="relative z-10" @close="open = false">
            <transition-child as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </transition-child>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <transition-child as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <dialog-panel class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-2/3 sm:p-6">
                            <div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <dialog-title as="h3" class="text-lg font-medium leading-6 text-gray-900">NPI Registry Results</dialog-title>
                                    <div class="mt-2">
                                        <div v-if="results.length === 0">
                                            <p class="text-sm text-gray-500">There are no results</p>
                                        </div>
                                        <div v-else>
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Number</th>
                                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr v-for="result in results" :key="result.number">
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ result.basic.first_name }} {{ result.basic.last_name }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ result.number }}</td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a :href="`https://npiregistry.cms.hhs.gov/provider-view/${ result.number }`" target="_blank" class="text-indigo-600 hover:text-indigo-900">
                                                            More info
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6">
                                <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm" @click="open = false">Go back to search</button>
                            </div>
                        </dialog-panel>
                    </transition-child>
                </div>
            </div>
        </dialog-wrapper>
    </transition-root>
</template>

<script>
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue';

export default {
    name: 'Modal',

    props: {
        open: {
            type: Boolean,
            default: true,
        },
        results: {
            type: Array,
            required: true,
        },
    },

    components: {
        DialogWrapper: Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
    },
}
</script>
