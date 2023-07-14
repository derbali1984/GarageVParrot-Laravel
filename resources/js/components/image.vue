<template>
  <div>
    <div class="form-group" v-for="(input, index) in inputs" :key="index">
      <input
        type="file"
        name="image[]"
        accept="image/*"
        class="form-control file-upload-info"
        @change="onFileChange(index, $event)"
      />
      <span>
        <a
          href=""
          @click.prevent="add(index)"
          v-show="index === inputs.length - 1"
          style="color: green"
          >Ajouter plus</a
        >
        <a
          href=""
          @click.prevent="remove(index)"
          v-show="index || (!index && inputs.length > 1)"
          >Retirer</a
        >
      </span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      inputs: [{}],
    };
  },
  methods: {
    add() {
      this.inputs.push({});
    },
    remove(index) {
      this.inputs.splice(index, 1);
    },
    onFileChange(index, event) {
      const file = event.target.files[0];
      if (file) {
        this.inputs[index].file = file;
      }
    },
  },
};
</script>
