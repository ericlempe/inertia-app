<template class="tw-h-full tw-bg-gray-50">

    <v-app>
        <div class="tw-min-h-full tw-flex tw-flex-col tw-justify-center tw-py-12 sm:tw-px-6 lg:tw-px-8">
            <div class="sm:tw-mx-auto sm:tw-w-full sm:tw-max-w-md">
                <img class="tw-mx-auto tw-h-12 tw-w-auto"
                     src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                     alt="Workflow"/>
                <h2 class="tw-mt-6 tw-text-center tw-text-3xl tw-font-extrabold tw-text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="tw-mt-8 sm:tw-mx-auto sm:tw-w-full sm:tw-max-w-md">
                <div class="tw-bg-white tw-py-8 tw-px-4 tw-shadow sm:tw-rounded-lg sm:tw-px-10">
                    <slot/>
                </div>
            </div>

            <Snackbar />
        </div>
    </v-app>
</template>

<script>
import Snackbar from '../Components/Snackbar'

export default {
    components: {
        Snackbar
    }
}
</script>
