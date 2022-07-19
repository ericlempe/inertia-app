<template>
    <Layout>
        <Head title="Login"/>
        <v-form>
            <v-row>
                <v-col cols="12">
                    <v-text-field
                        label="E-mail"
                        type="email"
                        v-model="form.email"
                        :error-messages="form.errors.email"
                        dense
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <v-text-field
                        label="Senha"
                        type="password"
                        v-model="form.password"
                        :error-messages="form.errors.password"
                        dense
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12">
                    <v-btn
                        depressed
                        block
                        color="black"
                        dense
                        @click="logar"
                    >
                        <span class="tw-text-white">Entrar</span>
                    </v-btn>
                </v-col>
            </v-row>
        </v-form>
        <div class="tw-flex tw-justify-center tw-mt-5 tw-text-sm">
            <Link href="registrar">
                <span class="tw-px-2 tw-bg-white tw-text-gray-500">Não possui conta? Registre-se aqui</span>
            </Link>
        </div>
        <v-overlay :value="loading">
            <v-progress-circular
                indeterminate
                size="64"
            ></v-progress-circular>
        </v-overlay>
    </Layout>
</template>

<script>
import Layout from '../../Layouts/Auth'
import {Head} from '@inertiajs/inertia-vue'
import {Link} from '@inertiajs/inertia-vue'

export default {
    components: {
        Layout,
        Link,
        Head
    },
    props: {
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: null,
                password: null,
            }),
            loading: false
        }
    },
    methods: {
        async logar() {
            this.loading = true;
            await this.form.post('/login');
            setTimeout(() => {
                this.loading = false;
            }, 500);
        },
    }
}
</script>
