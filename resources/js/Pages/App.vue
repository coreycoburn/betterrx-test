<template>
    <div>
        <form class="mx-auto max-w-lg space-y-8 divide-y divide-gray-200" @submit.prevent="search">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">NPI Search</h3>
                    </div>
                    <div class="space-y-6 sm:space-y-5">
                        <block-input field="First name">
                            <input type="text" name="first-name" id="first-name" v-model="form.first_name" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="Last name">
                            <input type="text" name="last-name" id="last-name" v-model="form.last_name" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="NPI number">
                            <input type="text" name="number" id="number" v-model="form.number" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="Taxonomy description">
                            <textarea id="taxonomy-description" name="taxonomy-description" rows="3" v-model="form.taxonomy_description" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="City">
                            <input type="text" name="city" id="city" v-model="form.city" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="State">
                            <input type="text" name="state" id="state" v-model="form.state" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>

                        <block-input field="Zip">
                            <input type="text" name="zip" id="zip" v-model="form.zip" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </block-input>
                    </div>
                </div>
            </div>

            <div v-if="npiError" class="pt-5">
                <span class="rounded-full bg-red-200 text-red-900 px-4 py-2" v-text="npiError" />
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search NPI</button>
                </div>
            </div>
        </form>

        <modal :open="modalOpen" :form="form" :npi="npi" @close="modalOpen = false" @skip="paginate" />
    </div>
</template>

<script>
import BlockInput from '../Components/BlockInput.vue';
import Modal from '../Components/Modal.vue';

export default {
    components: {
        BlockInput,
        Modal,
    },

    data() {
        return {
            modalOpen: false,
            form: {
                first_name: '',
                last_name: '',
                number: '',
                taxonomy_description: '',
                city: '',
                state: '',
                zip: '',
                skip: 0,
            },
            npi: {},
            npiError: '',
        };
    },

    methods: {
        search() {
            this.form.skip = 0;
            this.submit();
        },
        async submit() {
            try {
                this.npiError = '';
                const response = await fetch('/api/npi', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.form),
                });
                this.npi = await response.json();

                if (response.status === 422) {
                    throw Error(this.npi.message);
                }

                this.modalOpen = true;
            } catch (error) {
                this.modalOpen = false;
                this.npiError = error;
                console.error(error);
            }
        },
        paginate(count) {
            this.form.skip = count;
            this.submit();
        },
    },
}
</script>
