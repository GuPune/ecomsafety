import ApiService from "../services/api.service";

export const ProductService = {
    get() {
      return ApiService.get("productshell");
    },
    categoryshell() {
        return ApiService.get("categoryshell");
    },
    productshell(param) {

        return ApiService.post("productinshell",param);
    },
    updateproductshell(param) {

        return ApiService.post("updateproductinshell",param);
    },
    deleleproductshell(param){

        return ApiService.post("deleteproductinshell",param);
    }
};
