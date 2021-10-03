import React,{useState} from 'react'
import { Route,Switch} from "react-router-dom";
import "../css/main.scss";
import Sidebar from "./Sidebar";
import Nav from "./Nav";
import Product from "./Product";
import  Cart from "./Cart";
import SingleProduct from "./SingleProduct";
import Slider from "./Slider";
import Registration from "./Registration";
import BrandProduct from "./BrandProduct";
import Search from "./Search"
import Orderdetails from './Orderdetails';
import { useHistory } from 'react-router';
import Login from './Login'



export default function Blueprint() {
    const [toggle, setToggle] = useState(false);
    const [cartToggle,setCartToggle]=useState(false);
    const [customerId, setcustomerId] = useState();
    const [Message, setMessage] = useState("");
    const [search, setsearch] = useState([]);
    const [SowSearch, setSowSearch] = useState(false);
    const history =useHistory();
    const toggleFunction=()=>{
        setToggle(!toggle);
    }
    //cart toggle
    const setCartTogglefun=()=>{
        setCartToggle(!cartToggle);
    }
    //set total cart product
  

 
//console.log(cartData)
    const registerUser = async (formData)=>{
           await fetch("http://127.0.0.1:8000/api/customerRegistration",{
            method:"POST",
            body:formData
        })
        .then((data)=>{
             var msg= data.json();
             return msg;
        })
        .then((result)=>{
            if(result.customerID){
                setcustomerId(result.customerID);
                localStorage.setItem("customerId",result.customerID);
                history.push("/");
            }else{
                setMessage(result.msg);
            }
        });
   }
   const SearchFun = async (value)=>{
       if(value.length >1){
           let search = await fetch("http://127.0.0.1:8000/api/search/"+value);
           let searchData = await search.json();
           setSowSearch(true);
           setsearch(searchData);
       }else{
        setSowSearch(false);
        setsearch([]);
       }
   }
   const searchFunt =()=>{
    setSowSearch(false);
   }
    return (
        <>
            <Nav cartToggle={setCartTogglefun} getSearchValue={SearchFun} />
         <div className="wrapper position-relative">
                <div className={toggle ? ' bg-light sidebar position-absolute sidebaritemtwo position-fixed' : 'bg-light sidebartoggleone sidebar position-absolute position-fixed'}>
                <Sidebar />
                    <div onClick={toggleFunction} className="sidebarIcon position-absolute top-50 start-100 translate-middle">
                        <i className={toggle?'fas fa-times' : 'fas fa-arrow-right'} />
                        
                    </div>
             </div>
             <div className="cartOption position-absolute end-0 position-fixed">
                    {cartToggle ?
                        <Cart cartToggle={setCartTogglefun} />
                        : null
                    }
             </div>
             <div className="searchOption position-absolute end-0 position-fixed col-12 col-md-6" >
             { SowSearch ? <Search SearchData ={search}  sendSearchFun = {searchFunt}/> :null}
             </div>
             <div className="container-fluid content position-absolute">
             {/* content area */} 
                        <div className="row">
                            <Route exact path="/">
                                <Slider />     
                                <Product />    
                            </Route>
                        </div>
                            <Switch>
                                <Route path="/singleProduct/:id" >
                                    <SingleProduct />
                                </Route>
                            </Switch>
                            <Switch>
                                <Route path="/productByBrandName/:brand_id">
                                    <BrandProduct />
                                </Route>
                            </Switch>

                                <Route path="/registration">
                                    <Registration registration={registerUser} msg={Message} />
                                </Route>
                            <Switch>
                                <Route path="/orderDetails">
                                    <Orderdetails />
                                </Route>
                            </Switch>

                            <Switch>
                                <Route path="/login">
                                    <Login />
                                </Route>
                            </Switch>


             </div>
         </div>   
        </>
    )
}
