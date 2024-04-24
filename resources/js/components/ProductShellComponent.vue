<template>
    <div>
      <!-- <b-form-group
        label="Selection mode:"
        label-for="table-select-mode-select"
        label-cols-md="4"
      >
        <b-form-select v-model="selected"  v-on:change="changeshell($event)">
               <option :value="0">  ทั้งหมด</option>
                        <option
                            v-for="(option, idx) in cate"
                            :key="idx"
                            :value="option.id"
                            :title="option.title || null">
                            {{ option.title }}
                        </option>
                    </b-form-select>
      </b-form-group>
  
      <b-table
        :items="item"
        :fields="fields"
        :select-mode="selectMode"
        responsive="sm"
        ref="selectableTable"
        selectable
        @row-selected="onRowSelected"
      >
    
        <template #cell(selected)="{ rowSelected }">
          <template v-if="rowSelected">
            <span aria-hidden="true">&check;</span>
            <span class="sr-only">Selected</span>
          </template>
          <template v-else>
            <span aria-hidden="true">&nbsp;</span>
            <span class="sr-only">Not selected</span>
          </template>
        </template>
      </b-table>
      <p>
        <b-button size="sm" @click="selectAllRows">Select all</b-button>
        <b-button size="sm" @click="clearSelected">Clear selected</b-button>
        <b-button size="sm" @click="selectThirdRow">Select 3rd row</b-button>
        <b-button size="sm" @click="unselectThirdRow">Unselect 3rd row</b-button>
      </p>
      <p>
        Selected Rows:<br>
        {{ selected }}
      </p> -->

       <div class="row">
    <div class="col-6">
      <h3>Product Select Group</h3>
      <draggable class="list-group" :list="product_select" group="people" @change="log">
        <div
          class="list-group-item"
          v-for="(element, index) in product_select"
          :key="element.id"
        >
          {{ element.title }} {{ index }}
        </div>
      </draggable>
    </div>

    <div class="col-6">
      <h3>Product ALL</h3>
      <draggable class="list-group" :list="product" group="people" @change="log">
        <div
          class="list-group-item"
          v-for="(element, index) in product"
          :key="element.id"
        >
          {{ element.title }} {{ index }}
        </div>
      </draggable>
    </div>

    <!-- <rawDisplayer class="col-3" :value="list1" title="List 1" />

    <rawDisplayer class="col-3" :value="product" title="List 2" /> -->
  </div>
  <br>
   <div class="row">
  <b-button size="sm" @click="save">Update</b-button>
  </div>
 
    </div>

    
  </template>
  <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.min.js"></script>
<!-- CDNJS :: Sortable (https://cdnjs.com/) -->
<script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
<!-- CDNJS :: Vue.Draggable (https://cdnjs.com/) -->
<script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.20.0/vuedraggable.umd.min.js"></script>
  <script>
     import { FETCH_PRODUCT,FETCH_PRODUCT_CATE,FETCH_PRODUCT_IN_GROUP,SAVE_GROUP  } from "../../store/actions.type";
     import { mapGetters,mapState } from "vuex";
     import draggable from "vuedraggable";
    export default {
      components: {
    draggable,
    
  },
      data() {
        return {
          modes: ['multi', 'single', 'range'],
          fields: ['selected', 'isActive', 'age', 'first_name', 'last_name'],
          items: [],
          selectMode: 'multi',
          selected: [],
       
    
        }
      },

      computed: {
        ...mapState({
                objectscate: state => state.Product.cate,
            }),

            ...mapGetters(["cate","item","product","product_select"])

        },

        async mounted() {
          let ids = window.location.pathname.split('/')[3]
            // let product = await this.$store.dispatch(FETCH_PRODUCT);
            let group_id = {id:ids}
             let product_sel = await this.$store.dispatch(FETCH_PRODUCT_IN_GROUP,group_id);
    
     
            // let cate = await this.$store.dispatch(FETCH_PRODUCT_CATE);
      
        },

      methods: {

        

        async changeshell(event){
                console.log(event);
            },
        onRowSelected(items) {
          this.selected = items
        },
        selectAllRows() {
          this.$refs.selectableTable.selectAllRows()
        },
       async save() {
      
             let save = await this.$store.dispatch(SAVE_GROUP);
        },
        clearSelected() {
          this.$refs.selectableTable.clearSelected()
        },
        selectThirdRow() {
          // Rows are indexed from 0, so the third row is index 2
          this.$refs.selectableTable.selectRow(2)
        },
        unselectThirdRow() {
          // Rows are indexed from 0, so the third row is index 2
          this.$refs.selectableTable.unselectRow(2)
        },
            add: function() {
      this.list.push({ name: "Juan" });
    },
    replace: function() {
      this.list = [{ name: "Edgard" }];
    },
    clone: function(el) {
      return {
        name: el.name + " cloned"
      };
    },
    log: function(evt) {
      window.console.log(evt);
    }
      }
    }
  </script>