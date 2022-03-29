<template>
    <!-- Change email form -->
    <form action=""
          method="post"
          class="transition-all">
        <form-group>
            <text-input label="new Email"
                        name="newemail"
                        type-text="email"
                        v-model="emailaddress.telephone"/>
        </form-group>

        <form-group>
            <text-input label="repeat New Email"
                        name="newemailrepeat"
                        type-text="email"
                        v-model="emailaddress.telephone"/>
        </form-group>
    </form>

    <div class="flex">
        <button @click="changeemailaddress()"
                class="mr-auto  bg-blue-500 hover:bg-blue-700 w-1/4 text-white px-2 py-2">
            Cancel
        </button>
        <button @click="changeemailaddress()"
                class="ml-auto bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">
            Save
        </button>
    </div>

</template>

<script>
import { mapActions, mapState } from 'vuex';
import FormGroup from '../../form/skeleton/FormGroup';
import TextInput from '../../form/skeleton/TextInput';

export default {
  name: 'ChangeEmail',
  components: {
    'text-input': TextInput,
    'form-group': FormGroup,
  },
  computed: {
    ...mapState('accountPage', [
      'emailaddress',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      changeemailaddress: 'changeemailaddress',
    }),
  },
};
</script>

<style scoped>

</style>
