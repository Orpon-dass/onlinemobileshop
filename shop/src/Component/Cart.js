import React,{useState,useEffect} from 'react'
import { Link } from 'react-router-dom';
import "../css/main.scss"
import proImg from "../img/shoplogo.png";
import {useSelector} from 'react-redux'
import { totalCartValue } from '../Action/Action';
import { useDispatch } from 'react-redux';
const axios = require('axios');


export default function Cart(props) {
  const [quantity, setquantity] = useState(0);
  const [cartData, setcartData] = useState([]);
  const [delRefresh,setdelRefresh] = useState(false);
  //customer id
  const customerId =localStorage.getItem('customerId'); 

  //show and hide cart
   //props.total(cartData.length);
   const dispatch =useDispatch();
   dispatch(totalCartValue(cartData.length));
   const carReValue = useSelector(state =>state.cart);

   //fetch cart data
  useEffect(() => {
    const CancelToken = axios.CancelToken;
    const source = CancelToken.source();
      axios.get('http://127.0.0.1:8000/api/cartResult/'+customerId,{cancelToken: source.token})
      .then(function (response) {
        // handle success
        setcartData(response.data);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function (result) {
        // always executed
      });
    return ()=>source.cancel('Operation canceled by the user.');
  },[quantity,delRefresh,carReValue]);

  //calculate total price
  let price = 0;
  cartData.map((item)=>{
  return  price+=item.productPrice*item.quantity;
  });
  //increase product quantity
  const increaseProduct = async (arg)=>{
    arg.preventDefault();
    const product_id = arg.target.productId.value;
    let product_quantity = arg.target.producctQuantity.value;
    let sendQuantity=parseInt(product_quantity)+1;
       let updateCartData ={
          product_quantity:sendQuantity,
          product_id      :product_id,
          customer_id     :customerId
       }
      // console.log(quantity)
         await fetch("http://127.0.0.1:8000/api/updateCart",{
          method:"POST",
          headers:{
                  "Content-Type":"application/json",
                  "Accept":"application/json"
                 },
          body:JSON.stringify(updateCartData)
             }
          ).then((res)=>{
              return res.json();
          }).then((data)=>{ 
            setquantity(data);
          });
              
  }
//dercrease product quantity
  const decreaseProduct = async (arg) =>{
    arg.preventDefault();
    const product_id = arg.target.productId.value;
    const product_quantity = arg.target.producctQuantity.value;
    const sendQuantity=parseInt(product_quantity)-1;
    let updateCartData ={
       product_quantity:sendQuantity,
       product_id      :product_id,
       customer_id     :customerId

    }
    await fetch("http://127.0.0.1:8000/api/updateCart",{
               method:"POST",
               headers:{
                 "Content-Type":"application/json",
                 "Accept":"application/json"
             },
               body:JSON.stringify(updateCartData)
             }
    ).then((res)=>{
      return res.json();
  }).then((data)=>{ 
    setquantity(data);
  });
   
   
}
//submit customer order
const submitOrder= async ()=>{
   const cusID =localStorage.getItem("customerId");
    await fetch("http://127.0.0.1:8000/api/submitOrder/"+cusID);
}
//delete cart item
const deleteCartProduct = async (e)=>{
  let proDelId = e.target.value;
  let deleteSingleCartData ={
    customerDelId:customerId,
    productId :proDelId
 }
   await fetch("http://127.0.0.1:8000/api/deleteCartProduct",{
             method:"POST",
             headers:{
               "Content-Type":"application/json",
               "Accept"      :"application/json"
             },
             body:JSON.stringify(deleteSingleCartData)
   });
   setdelRefresh(!delRefresh);
   
} 
    return (
        <>
             {cartData.length>0 ? 
                <div className="cart me-1 ms-1 pt-3 pb-3 bg-light">
                    {cartData.map((item)=>
                    <div key={item.id} className="bg-light m-3 cart-product shadow-sm">
                        <div className="d-flex">
                           <img className="img-fluid img-thumbnail m-2" width="30" src={proImg} alt={proImg} />
                            <div className="cartOne p-2" >
                                <div className="d-flex justify-content-between">
                                  <div className="product-name d-flex">{item.productName}</div>
                                  <div className=""><button onClick={deleteCartProduct} value={item.productId} className="fas fa-times"></button></div>
                                </div>
                               <div className="d-flex justify-content-between p-1 productdetails" >
                                  <div className="pt-1"> {item.productPrice}</div>
                                  <div className="pt-1 d-flex justif-content-around">
                                     <div>
                                       <form onSubmit={decreaseProduct}>
                                          <input type="hidden" value={item.productId} name="productId"/>
                                          <input type="hidden" value={item.quantity} name="producctQuantity"/>
                                         <button type="submit" disabled={item.quantity ===1 ? true : false}  className="fas fa-minus p-1"></button>
                                       </form>
                                     </div>
                                     <div>
                                        <span className="Quantity ps-1 pe-1">{item.quantity}</span>
                                     </div>
                                     <div>
                                        <form onSubmit={increaseProduct}>
                                              <input type="hidden" value={item.productId} name="productId"/>
                                              <input type="hidden" value={item.quantity} name="producctQuantity"/>
                                            <button  type="submit" className="fas fa-plus p-1"></button>
                                          </form>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    </div>
                
                    )}

                    
                     <h4 className=" bg-light shadow-sm p-2 m-3" style={{borderRadius:"10px"}} >Total Price : {price} Tk</h4>
                {customerId ?
                 <Link to="/">
                    <div onClick={props.cartToggle} className="d-grid gap-2 me-3 ms-3">
                       <button onClick={submitOrder} className="btn btn-primary" type="button">Order</button>
                     </div>
                </Link>
                :
                <Link to="/registration">
                    <div onClick={props.cartToggle} className="d-grid gap-2 me-3 ms-3">
                       <button className="btn btn-primary" type="button">Registration</button>
                     </div>
                </Link>
               }

               
                </div>
          :null}
          
        </>
    )
}
