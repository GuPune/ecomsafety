import { ProductService } from "../../services/product.service";
import { FETCH_PRODUCT,FETCH_PRODUCT_CATE } from "../actions.type";
import { SET_CATE,SET_PRODUCTINSHELL,SET_ITEM } from "../mutations.type";

const state = {
    categoryshell: null,
    cate:[]
};

const getters = {
    cate: state => {
        return state.cate
    }
};

const actions = {
    async [FETCH_PRODUCT](context) {
        const { data } = await ProductService.get();
      
      return data
    },
    async [FETCH_PRODUCT_CATE](context) {
        const { data } = await ProductService.categoryshell();
        context.commit(SET_CATE, data.data);
        return data.data;
    },
    


};

const mutations = {
    


    [SET_CATE](state, data) {
        state.cate = data;
    },
   
    


};

export default {
    state,
    getters,
    actions,
    mutations
};
