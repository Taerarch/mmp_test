<template>
  <div id="getDat">
    <h1>Get Data</h1>
    {{ info }}
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'getData',
    data: function () {
      return {
        info: null
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
