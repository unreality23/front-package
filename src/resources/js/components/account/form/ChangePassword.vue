<template>
    <!-- Change password form -->
    <form action=""
          method="post"
          class="transition-all">
        <form-group>
            <text-input label="Old Password"
                        name="oldpassword"
                        type-text="password"
                        v-model="changepassword.telephone"/>
        </form-group>

        <form-group>
            <text-input label="New Password"
                        name="newpassword"
                        type-text="password"
                        v-model="changepassword.telephone"/>
        </form-group>
    </form>

    <div class="flex">
        <button @click="changepasswordbool()"
                class="mr-auto  bg-blue-500 hover:bg-blue-700 w-1/4 text-white px-2 py-2">
            Cancel
        </button>
        <button @click="changepasswordbool()"
                class="ml-auto  bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">
            Save
        </button>
    </div>

</template>

<script>
import { mapActions, mapState } from 'vuex';
import TextInput from './skeleton/TextInput';
import FormGroup from '../../form/skeleton/FormGroup';

export default {
  name: 'ChangePassword',
  components: {
    'text-input': TextInput,
    'form-group': FormGroup,
  },
  computed: {
    ...mapState('accountPage', [
      'changepassword',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      changepasswordbool: 'changepasswordbool',
    }),
  },
};
</script>

<style scoped>

</style>
