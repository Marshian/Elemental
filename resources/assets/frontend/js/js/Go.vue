<template>
  <div>
    Awesome!
  </div>
</template>

<script>

  export default {
    name: 'StageView',
    props: {
      name: {
        type: String,
        default: 'Username'
      },
      sectionId: {
        type: Number,
        default: null
      }
    },
    data () {
      return {}
    },
    computed: {
    },
    mounted: function(){
    },
    methods: {
    },

    created() {

    }
  }
</script>

<style>
  .go-container h2 {
    color: #fff;
  }
  .monkey {
    /*height: 300px;*/
    width: 300px;
  }
  #btn-go {
    height: 300px;
    width: 300px;
    border-radius: 100px;
  }
</style>
