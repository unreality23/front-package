<template>
    <div>
        <pet-details @get-all-pets="getallpets"
                     :class="{ 'opacity-100 visible max-h-full pt-3':addNewAnimal,
                               'pt-0 max-h-0 opacity-0 invisible':!addNewAnimal }" />

        <div :class="{ 'opacity-100 visible max-h-full pt-3':!addNewAnimal,
                       'pt-0 max-h-0 opacity-0 invisible':addNewAnimal }">
            <h1 class="font-bold text-2xl mb-5">My Pets</h1>
            <div id="my-pets"
                 class="flex mt-10">
                <div id="account-newsletter"
                     v-for="animal in allanimals.message"
                     :key="animal.id"
                     class="bg-gray-200 p-5 mr-5 w-2/4 md:w-1/4" >

                    <span class="font-bold">{{ animal.name }}</span>

                    <ul class="text-sm mt-5">
                        <li><b>Species: </b> {{ animal.species_type }}</li>
                        <li><b>Date Of Birth: </b> {{  animal.date_of_birth }}</li>
                    </ul>

                    <div class="flex">
                        <button type="button"
                                class="w-2/6 bg-blue-500 text-xs text-center py-3 float-right mt-7
                                px-2 text-white mr-auto hover:bg-blue-700 transition-all">
                            Edit
                        </button>
                        <button type="button"
                                @click="removepetfromthelist(animal.id)"
                                class="w-2/6 bg-red-500 text-xs text-center py-3 float-right mt-7
                                px-2 text-white ml-auto hover:bg-red-700 transition-all" >
                            Delete
                        </button>
                    </div>

                </div>
                <div id="account-email"
                     class="bg-gray-200 p-5 mr-5  cursor-pointer w-2/5 md:w-1/4"
                     @click="addnewpettolist">
                    <span class="font-bold ">Add new animal</span>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
import { mapState, mapActions } from 'vuex';
import axios from 'axios';

export default {
  name: 'MyPets',
  data() {
    return {
      allanimals: [],
    };
  },
  computed: {
    ...mapState('accountPage', [
      'addNewAnimal',
    ]),
  },
  methods: {
    ...mapActions('accountPage', {
      addnewpettolist: 'addnewpettolist',
    }),
    getallpets() {
      axios.get('/account/getanimal')
        .then((response) => {
          this.allanimals = response.data;
          console.log(response.data);
        })
        .catch((error) => error.response.data);
    },
    removepetfromthelist(petId) {
      axios.post(`/account/deletepetfromthelist/${petId}`)
        .then(() => {
          this.getallpets();
        })
        .catch((error) => error.response.data);
    },

  },
  mounted() {
    this.getallpets();
  },

};
</script>

<style scoped>

</style>
