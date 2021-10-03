import React,{useState,useEffect} from 'react'
import { Link } from 'react-router-dom';
import "../css/main.scss"
import BlogItem from "../Component/Skeleton";
import usePageBottom from "../customhooks/usePageBottom";
import {refreshCart} from "../Action/Action";
import { useSelector,useDispatch } from 'react-redux';
export default function Product(props) {
    const [message, setmessage] = useState("");
    const [product ,setProduct]=useState([]);
    const [CartProduct, setCartproduct] = useState(0);
    const [skeleton, setskeleton] = useState(true);
    const customer_id =localStorage.getItem("customerId");
    const page =usePageBottom();
    let url ="http://127.0.0.1:8000/api/showProductForView?page=1";
    const [pageUrl, setpageUrl] = useState(url);
    const [nextPageUrl, setnextPageUrl] = useState("");
    const [cartFrsh, setcartFrsh] = useState(null);
   
    //redux
    const dispatch = useDispatch();
    dispatch(refreshCart(cartFrsh));
    //fetch product
   useEffect(() => {
     
    const AbortCont = new AbortController();
    const fetchData = async () =>{
        await fetch(pageUrl,{signal:AbortCont.signal})
            .then((data)=>{
                let res = data.json();
                return res;
            })
            .then((result)=>{
                setnextPageUrl(result.next_page_url);
                setProduct([...product,...result.data]);
                setskeleton(false);
            });
    }
     if(nextPageUrl!=null){
         setTimeout(() => {  
         fetchData(); 
         }, 1000);
     }
    return ()=>{
              AbortCont.abort();
           }
   },[pageUrl]);
   
  useEffect(() => {
    function handleScroll() {
      const {scrollHeight,clientHeight,scrollTop,offsetHeight}=document.documentElement;
      const ScTopCliheight=Math.round(scrollTop+clientHeight+2);
      if(ScTopCliheight>=scrollHeight){
        setpageUrl(nextPageUrl);
      } 
    }
    window.addEventListener("scroll", handleScroll);
    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  });


   const CartProductSend = async (e)=>{
               let cart = {product_id:e.target.value,customerID:localStorage.getItem('customerId')};
                
                 await fetch("http://127.0.0.1:8000/api/addToCart",
                {
                    method:"POST",
                    headers:{
                        "Content-Type":"application/json",
                        "Accept":"application/json"
                    },
                    body:JSON.stringify(cart)
                }
                )
                .then((data)=>{
                    let result =data.json();
                    return result;
                })
                .then((message)=>{
                    if(message.productId){
                        setcartFrsh(message.productId);
                    }
                });
                //console.log("not null");
        }
        const instantOrder = async(e)=>{
              let productId =e.target.value;
              let singleOrderProduct ={
                              customerId:localStorage.getItem('customerId'),
                              productId:productId,
                              quantity:1
                     }
             let singleOrder = await fetch("http://127.0.0.1:8000/api/SingleOrder",{
                 method:"POST",
                 headers:{
                     "Content-Type":"application/json",
                     "Accept"      :"application/json"
                 },
                 body:JSON.stringify(singleOrderProduct)
             });
            let singleOrderMessage = await singleOrder.json();
            //console.log(singleOrderMessage);
        }
        
        
    return (
        <>
          
          {skeleton && <div >
                   {[1,2,3,4,5,6,7,8,9,10,11,12].map((n)=>(
                   <BlogItem className="col-sm-6 col-md-6 col-lg-3 mt-3  col-bg " />
                   ))}
               </div> }
          {
              product.map((product)=>
            <div key={product.id} className="col-sm-6 col-md-6 col-lg-3 mt-3  col-bg ">
                <div className="productWraper m-1 shadow-sm">
                   <Link to={"/singleProduct/"+product.id}>
                     <img className="img-fluid  ps-2 pe-2 pb-2 pt-3 d-block mx-auto" src={"http://127.0.0.1:8000/storage/avatars/"+product.productImageOne} alt="productImage" style={{width:"200px",height:"250px"}}/>
                    </Link>
                    <h4 className="text-center pe-2 ps-2 pt-1">{product.productName}</h4>
                    <h5 className="text-center">Price : {product.productPrice}</h5>
                    <h6 className=" text-center text-decoration-line-through">19000 Tk (-30%)</h6>
                    <p className="text-center productText pe-2 ps-2 ">
                        {product.productDescription}
                    </p>
                   {customer_id ?
                        <div className="d-flex justify-content-between Add to Cart pe-3 ps-3 pb-3 pt-2">
                                <button onClick= {CartProductSend} value={product.id} className="btn btn-primary product-btn-cart" type="button">
                                   Add to Cart
                                </button>
                            
                                <button onClick={instantOrder} value={product.id} className="btn btn-primary product-btn-buy" type="button">
                                    Buy Now
                                </button>
                           
                        </div>
                        :
                        <div className="d-flex justify-content-between Add to Cart pe-3 ps-3 pb-3 pt-2">
                            <Link to="/registration">
                                <button  className="btn btn-primary product-btn-cart" type="button">
                                   Add to Cart
                                </button>
                            </Link>
                            <Link to="/registration">
                                <button  className="btn btn-primary product-btn-buy" type="button">
                                    Buy Now
                                </button>
                            </Link>
                           
                        </div>
                   }
                  
                </div>
            </div>

              )
          }
        </>
    )
}

