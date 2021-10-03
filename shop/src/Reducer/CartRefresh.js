
const cart = (state = 0,action) =>{
    if(action.type==="CARTFRESH"){
        return  action.payload;
    }else{
        return state; 
    }
//     switch (action.type) {
//         case "CARTFRESH": return state = action.payload;
//         default: return state;
//     }
}
 export const cartTotal = (state =0,action)=>{
           if(action.type==="CART_TOTAL"){
              return action.payload;
           }else{
               return state;
           }
}
export default cart;