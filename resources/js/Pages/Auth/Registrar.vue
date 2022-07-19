<template>
    <Layout>
        <Head title="Registrar"/>
        <v-form>
            <v-row>
                <v-col cols="12">
                    <v-text-field
                        label="Nome"
                        type="text"
                        v-model="form.name"
                        :error-messages="form.errors.name"
                        dense
                    ></v-text-field>
                </v-col>
            </v-row>
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
                    <v-text-field
                        label="Confirmar Senha"
                        type="password"
                        v-model="form.passwordConfirmation"
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
                        @click="registrar"
                    >
                        <span class="tw-text-white">Cadastrar</span>
                    </v-btn>
                </v-col>
            </v-row>
        </v-form>
        <div class="tw-flex tw-justify-center tw-mt-5 tw-text-sm">
            <Link href="login">
                <v-icon>mdi-arrow-left</v-icon>
                <span class="tw-bg-white tw-text-gray-500">Voltar</span>
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
                name: null,
                email: null,
                password: null,
                passwordConfirmation: null,
            }),
            loading: false
        }
    },
    methods: {
        async registrar() {
            this.loading = true;
            await this.form.post('/registrar', {
                onSuccess: () => this.$root.$emit('snackbar', "Usuário registrado com sucesso", 'green')
            });
            setTimeout(() => {
                this.loading = false;
            }, 1000);
        },
    }
}
</script>
