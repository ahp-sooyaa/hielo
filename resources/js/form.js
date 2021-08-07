import { add } from "lodash";

export default class Errors{
    constructor(){
        this.errors = {};
    }

    has(field){
        return this.errors.hasOwnProperty(field);
    }

    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    } 

    clear(field){
        delete this.errors[field]
    }

    record(errors){
        this.errors = errors;
    }
}