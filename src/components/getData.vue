<template>
  <div id="getData">
    <h1>ATLAS API Get Sydney Accommodation</h1>


    <div class="selectForm">
      <h3> Region Filter </h3>
      <select v-model="regionFilter">
        <option class="filterBox" v-for="option in info.data['reg'].filter(region => region.State === stateSelected)" v-bind:value="option" v-bind:key="option.Name">
            {{ option.Name }}
        </option>
      </select>
      <br/>
    </div>


    <div class="selectForm">
      <h3> Area Filter </h3>
      <select v-model="areaFilter">
        <option class="filterBox" v-for="option in info.data['ar'].filter(area => area.DomesticRegionId === regionFilter.RegionId)" v-bind:value="option" v-bind:key="option.Name">
            {{ option.Name }}
        </option>
      </select>
      <br/>
    </div>

    <br/>
    <!-- <span>Filter: {{ areaFilter.Name }}</span> -->
    <br/>


    <ul id="results">
      <li v-for="item in info.data['accomm'].filter(accomm => (accomm.addresses.address.region === regionFilter.Name && areaFilter.length === 0) || accomm.addresses.address.area === areaFilter.Name)" v-bind:value="item" v-bind:key="item.product_id">
        <br/>
        <h3>{{ item.product_name }}</h3>
        <p>{{ item.addresses.address.address_line }}</p>
        <p>{{ item.product_description }}</p>
        <img :src="item.product_image" />
        <br/>
      </li>
    </ul>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'getData',
    data: function () {
      return {
        info: '',
        stateSelected: 'NSW',
        regionFilter: '',
        areaFilter: ''
      }
    },
    mounted () {
      axios.get('http://localhost:7000/').then(response => (this.info = response))
  }
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1 {
  text-align: center;
  margin: 2em;
}
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
.selectForm {
  text-align: center;
}
.filterBox {
  min-width: 30%;
}


</style>
