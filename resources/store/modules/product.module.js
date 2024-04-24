import { ProductService } from "../../services/product.service";
import { FETCH_PRODUCT,FETCH_PRODUCT_CATE,FETCH_PRODUCT_IN_GROUP,SAVE_GROUP } from "../actions.type";
import { SET_CATE,SET_PRODUCTINSHELL,SET_ITEM,SET_PRO,SET_PRO_IN_SHELL } from "../mutations.type";

const state = {
    categoryshell: null,
    cate:[],
    product:[],
    id:null,
    product_select:[],
    items: [
        { isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
        { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
        { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
        { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }
      ],
      selected: [{ isActive: true, age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
      { isActive: false, age: 21, first_name: 'Larsen', last_name: 'Shaw' },
      { isActive: false, age: 89, first_name: 'Geneva', last_name: 'Wilson' },
      { isActive: true, age: 38, first_name: 'Jami', last_name: 'Carney' }]
};

const getters = {
    cate: state => {
        return state.cate
    },
    item: state => {
        return state.items
    },
    product: state => {
        return state.product
    },
    product_select: state => {
        return state.product_select
    }

    
};

const actions = {
    async [FETCH_PRODUCT](context) {
        const { data } = await ProductService.get();
        context.commit(SET_PRO, data.data);
      return data
    },
    async [FETCH_PRODUCT_IN_GROUP](context,form) {

   const { data } = await ProductService.productgroup(form);
   state.id = form.id;
   context.commit(SET_PRO_IN_SHELL, data);
    },
    async [FETCH_PRODUCT_CATE](context) {
        const { data } = await ProductService.categoryshell();
        context.commit(SET_CATE, data.data);
        return data.data;
    },

    async [SAVE_GROUP](context) {

    let save = {id:state.id,select_product:state.product_select};
    const { data } = await ProductService.productgroupsa(save);
    },
    
    

};

const mutations = {
    


    [SET_CATE](state, data) {
        state.cate = data;
    },
    [SET_PRO](state, data) {
        state.product = data;
    },
    [SET_PRO_IN_SHELL](state, data) {
       
     
        state.product_select = data.data
        state.product = data.notme
      //  state.product = data;
    },
   
    


};

export default {
    state,
    getters,
    actions,
    mutations
};
