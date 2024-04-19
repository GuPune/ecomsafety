import { ProductService } from "../../services/product.service";
import { FETCH_PRODUCT,FETCH_PRODUCT_CATE } from "../actions.type";
import { SET_CATEGORYSHELL,SET_PRODUCTYSHELL,SET_PRODUCTINSHELL,SET_ITEM } from "../mutations.type";

const state = {
    categoryshell: null,
    item:[],
    itempos:[],
    itemsinshell:[]
};

const getters = {
    categoryshell: state => {
        return state.categoryshell
    },
    item: state => {
        return state.item
    },
    itemsinshell: state => {
        return state.itemsinshell
    },
    itempos: state => {
        return state.itempos
    },
};

const actions = {
    async [FETCH_PRODUCT](context) {
        const { data } = await ProductService.get();
      
      return data
    },
    async [FETCH_PRODUCT_CATE](context) {
        const { data } = await ProductService.categoryshell();
        console.log(data);
      return data
    },
    


};

const mutations = {
    
    [SET_PRODUCTYSHELL](state, data) {
        state.item = data;
    },
   
    


};

export default {
    state,
    getters,
    actions,
    mutations
};
