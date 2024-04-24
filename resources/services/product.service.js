import ApiService from "../services/api.service";

export const ProductService = {
    get() {
      return ApiService.get("productshell");
    },
    categoryshell() {
        return ApiService.get("category");
    },
    productgroup(param) {
        return ApiService.post("productgroup",param);
    },
    productgroupsave(param) {
        return ApiService.post("productgroupsave",param);
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
