import React,{useState,useEffect} from 'react'
import "../css/main.scss";
export default function Orderdetails() {
    const [Orders, setOrders] = useState([]);
    const [CustomerAddress, setCustomerAddress] = useState({});
    const [phone, setphone] = useState('');
    const [address, setaddress] = useState('');
    const [cancel, setcancel] = useState(false);
    const [msg, setmsg] = useState("");
  const customerId =localStorage.getItem('customerId'); 
    useEffect(() => {
        showOrder();
        Address();
    },[cancel]);
    const showOrder = async ()=>{
         let orderData =await fetch(`http://127.0.0.1:8000/api/confirmedOredeDetails/${customerId}`);
         let showOrder = await orderData.json();
         setOrders(showOrder);
    }
    let totalPrice =0;
    Orders.map((order)=> totalPrice+=order.productPrice*order.Orderquantity);
    const Address = async ()=>{
        let cus_address = await fetch(`http://127.0.0.1:8000/api/customerAddress/${customerId}`);
        let address = await cus_address.json();
        setCustomerAddress(address);
    }
   const submitCustomerEditData= async ()=>{
       let cusData ={
             id:customerId,
             Cus_phone:phone,
             Cus_address:address
       }
        await fetch("http://127.0.0.1:8000/api/customer_eidit_data",{
            method:"POST",
            headers:{
                "Content-Type":"application/json",
                "Accept"      :"application/json"
            },
            body:JSON.stringify(cusData)
        });
        console.log(JSON.stringify(cusData))
   }
   const cancelOrder = async (e)=>{
       let orderId = e.target.value;
       let cancelOrder = await fetch("http://127.0.0.1:8000/api/cancelorder/"+orderId);
       let cancelOrderMessage =await cancelOrder.json();
       setcancel(!cancel);
       setmsg(cancelOrderMessage.msg);
   }
    return (
        <>
          <div className="row" >
               <div className="col-8 mx-auto mt-2">
                 <div className="w-100">
                     {msg}
                    <table className="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                            Orders.map((order)=>
                            <tr>
                                <th>{order.productName}</th>
                                <th>{ order.Orderquantity}</th>
                                <th>{order.productPrice} .Tk</th>
                                <th><button onClick={cancelOrder} value={order.id} style={{border:"none",backgroundColor:"transparent"}}>Cancel</button></th>
                            </tr> 
                            )
                            }
                            <tr>
                                <th colSpan="4">Total Price : {totalPrice} .Tk</th>
                            </tr>
                        </tbody>
                    </table> 
                 </div>
                 <div className="address bg-light mt-3 d-flex justify-content-between">
                   <div className="address p-3">
                       <div className="fs-5">personal information</div>
                            <div>
                                Address : {CustomerAddress.address} 
                            </div> 
                            <div>
                               Phone : {CustomerAddress.phone}
                            </div>
                   </div>
                   <div className="p-3">
                        <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Edit
                        </button>

                        <div className="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div className="modal-dialog  modal-dialog-centered">
                            <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div className="mb-3">
                                   <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                   <input onChange={(e)=>{setphone(e.target.value)}} type="text" class="form-control" id="exampleFormControlInput1" defaultValue={CustomerAddress.phone} placeholder="Your phone number"/>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                   <textarea onChange={(e)=>{setaddress(e.target.value)}} class="form-control" defaultValue={CustomerAddress.address} id="exampleFormControlTextarea1" rows="3">
                                     
                                   </textarea>
                                </div>
                               
                            </div>
                            <div className="modal-footer">
                                <button onClick={submitCustomerEditData} type="button" className="btn btn-secondary" data-bs-dismiss="modal">Submit</button>
                            </div>
                            </div>
                        </div>
                        </div>
                   </div>
                 </div>
               </div>
          </div>
        </>
    )
}
