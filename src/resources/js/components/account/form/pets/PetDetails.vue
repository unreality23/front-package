<template>
    <!-- Add pet to your list -->
    <form @submit.prevent="addnewpet" class="transition-all duration-500"
          :class="{'pt-0 max-h-0 opacity-0 invisible':!addNewAnimal}"
    >

        <form-group >
            <select-input :enabled-value="true"
                          :option-value="'Species'"
                          :label="'Species Type'"
                          :name="'species'"
                          v-model="petform.species"
                          :options="petform.speciestype.type"/>
        </form-group>

        <form-group >
            <text-input label="Name"
                        :name="'name'"
                        :type="''"
                        v-model="petform.name"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <text-input  label="Other Species Type"
                         :name="'otherspecies'"
                         v-model="petform.other_species_type"/>
        </form-group>

        <form-group v-if="!isMultipleAnimals">
            <text-input label="Weight"
                        name="weight"
                        v-model="petform.weight"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <text-input label="Lightest Weight"
                        name="lighestweight"
                        v-model="petform.lightestweight"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <text-input label="Heavest Weight"
                        name="heavestweight"
                        v-model="petform.heaviestweight"/>
        </form-group>

        <form-group >
            <text-input label="Date Of Birth"
                        name="dob"
                        type="date"
                        v-model="petform.dob"/>
        </form-group>

        <form-group>
            <select-input label="Is he/she currently healthy?"
                          name="ishealthy"
                          v-model="petform.ishealthy"
                          :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"/>
        </form-group>

        <form-group v-if="!isMultipleAnimals">
            <select-input  label="Are all of them healthy?"
                           :name="isallhealthy"
                           v-model="petform.isallhealthy"
                           :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <select-input  label="Is he/she on prescriptions?"
                           name="onprescriptions"
                           v-model="petform.onprescriptions"
                           :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <select-input  label="Are any of them on prescriptions?"
                           name="anyonprescriptions"
                           v-model="petform.anyonprescriptions"
                           :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"/>
        </form-group>

        <form-group>
            <text-input label="Details of the medication:"
                        name="prescriptiondetails"
                        v-model="petform.prescriptiondetails"/>
        </form-group>

        <form-group v-if="!isMultipleAnimals">
            <select-input  label="If female, is she currently pregnant or lactating?"
                           name="islactating"
                           v-model="petform.islactating"
                           :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"/>
        </form-group>

        <form-group v-if="isMultipleAnimals">
            <select-input label="Are any females currently pregnant or lactating?"
                          name="isanylactating"
                          v-model="petform.isanylactating"
                          :options="[{value: 'true', text: 'Yes'},{value: 'false', text: 'No'}]"
            />
        </form-group>

        <div class="flex mt-5">
            <button
                class="mr-auto  bg-blue-500 hover:bg-blue-700 w-1/4 text-white px-2 py-2"
                @click.prevent="addnewpettolist">Cancel Me
            </button>

            <button class="ml-auto  bg-red-500 hover:bg-red-700 w-1/4 text-white px-2 py-2">
                Save
            </button>
        </div>
    </form>

</template>

<script>
import { mapActions, mapState } from 'vuex';

import axios from 'axios';
import SelectInput from '../../../form/skeleton/SelectInput';
import FormGroup from '../../../form/skeleton/FormGroup';
import TextInput from '../../../form/skeleton/TextInput';

export default {
  name: 'PetDetails',
  components: {
    'select-input': SelectInput,
    'form-group': FormGroup,
    'text-input': TextInput,
  },
  data() {
    return {
      petform: {
        speciestype: {
          type: [
            { value: 'DOG', text: 'Dog' },
            { value: 'KENNEL', text: 'Kennels' },
            { value: 'CAT', text: 'Cat' },
            { value: 'CATTERY', text: 'Cattery' },
            { value: 'HORSE', text: 'Horse' },
            { value: 'STABLEYARD', text: 'Stable Yard' },
            { value: 'DONKEY', text: 'Donkey' },
            { value: 'FERRET', text: 'Ferret' },
            { value: 'RABBIT', text: 'Rabbit' },
            { value: 'OTHER', text: 'Other' },
          ],
        },
        name: '',
        other_species_type: '',
        weight: 0,
        lightestweight: 0,
        heaviestweight: 0,
        dob: new Date(),
        ishealthy: false,
        isallhealthy: false,
        onprescriptions: false,
        anyonprescriptions: false,
        prescriptiondetails: '',
        islactating: false,
        isanylactating: false,

      },
    };
  },
  computed: {
    picked: new Date(),
    ...mapState('accountPage', [
      'multipleanimals',
      'addNewAnimal',
    ]),
    isMultipleAnimals() {
      const animalvalue = this.petform.species;
      this.ishealthy = !this.ishealthy;
      return ['KENNEL', 'CATTERY', 'STABLEYARD'].includes(animalvalue);
    },
    transitionClasses() {
      return this.isMultipleAnimals ? 'opacity-100 visible max-h-full pt-3' : 'pt-0 max-h-0 opacity-0 invisible';
    },
  },
  methods: {
    ...mapActions('accountPage', {
      addnewpettolist: 'addnewpettolist',
    }),
    addnewpet() {
      axios.post('/account/adddanimal', {
        species_type: this.petform.species,
        name: this.petform.name,
        other_species_type: this.petform.other_species_type,
        weight: this.petform.weight,
        lightest_weight: this.petform.lightestweight,
        heaviest_weight: this.petform.heaviestweight,
        date_of_birth: this.petform.dob,
        is_healthy: this.petform.ishealthy,
        is_all_healthy: this.petform.isallhealthy,
        on_prescriptions: this.petform.onprescriptions,
        any_on_prescriptions: this.petform.anyonprescriptions,
        prescription_details: this.petform.prescriptiondetails,
        is_lactating: this.petform.islactating,
        is_any_lactating: this.petform.isanylactating,
      }).then(() => {
        this.addnewpettolist();
        this.$emit('get-all-pets');
      }).catch((error) => {
        console.log(`errosr: ${error.response.data}`);
      });
    },

  },

};
</script>

<style scoped>

</style>
