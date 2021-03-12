<template>
  <div id="getData">
    <h1>Get Data</h1>
    <select v-model="stateSelected">
      <option v-for="option in info.data['st']" v-bind:value="option" v-bind:key="option.code">
        {{ option.Code }}
      </option>
    </select>
    <br/>
    <span>Selected: {{ stateSelected.Code }}</span>
    <br/>
    <select v-model="regionSelected">
      <option v-for="option in info.data['reg'].filter(region => region.State === stateSelected.Code)" v-bind:value="option" v-bind:key="option.Name">
          {{ option.Name }}
      </option>
    </select>
    <br/>
    <span>Selected: {{ regionSelected.Name }}</span>
    <br/>

  </div>


</template>

<script>
  import axios from 'axios';

  export default {
    name: 'getData',
    data: function () {
      return {
        info: '',
        stateSelected: '',
        regionSelected: ''
      }
    },
    mounted () {
      axios.get('http://localhost:7000/').then(response => (this.info = response))
  }
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
