export const refreshCart =(value)=>{
      return {
          type:"CARTFRESH",
          payload:value
      }
}
export const totalCartValue =(value)=>{
    return {
        type:"CART_TOTAL",
        payload:value
    }
} 