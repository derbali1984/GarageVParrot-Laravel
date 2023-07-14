<template>
  <div>
    <div class="form-group" v-for="(input, index) in inputs" :key="index">
      <input
        type="text"
        name="equipment[]"
        accept="equipment/*"
        class="form-control"
        placeholder="Équipement"
      />
      <span>
        <a
          href=""
          @click.prevent="add(index)"
          v-show="index == inputs.length - 1"
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
<script type="text/javascript">
export default {
  data() {
    return {
      inputs: [{}],
    };
  },
  methods: {
    add() {
      this.inputs.push({
        equipment: "",
      });
    },
    remove(index) {
      this.inputs.splice(index, 1);
    },
  },
};
</script>