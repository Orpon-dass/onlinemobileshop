import cart from "../Reducer/CartRefresh"
import { cartTotal } from "../Reducer/CartRefresh";
import { combineReducers } from "redux";
const reducer = combineReducers(
    {
        cart,
        cartTotal
    }
);
export default reducer;