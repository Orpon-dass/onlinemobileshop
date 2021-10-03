import React,{useState} from 'react'
import { Link } from 'react-router-dom';
import logo from "../img/logo2.png";
import "../css/main.scss";
import { useSelector } from 'react-redux';


export default function Nav(props) {
   const [searchToggle, setsearchToggle] = useState(false);
   const totalCartProduct = useSelector(state=>state.cartTotal);
   const SearchProduct=(e)=>{
         let searchValue = e.target.value;
         props.getSearchValue(searchValue);
   }
    return (
        <>
            <div className="container-fluid bg-light fixed-top">
               <div className="row">
                   <div className="col-2">
                         <Link to="/">
                            <img className="img-fluid text-center mt-3 mb-2 ms-3" src={logo} alt="" width="40" height="35"/>
                         </Link>
                   </div>
                   <div className="col-10 d-flex justify-content-end">
                       <div className="w-100 d-flex justify-content-end mt-2 mb-2 me-2 ">
                           
                            <input autoComplete="off" onChange={SearchProduct} name="search"  className="d-none d-lg-block Search_Input_Top" type="text" placeholder="search here"/>

                            <i onClick={() => { setsearchToggle(!searchToggle)}} className="fas fa-search Search_top mt-2 ms-3  mb-2"></i>       
                       </div>
                        <div className="">
                            <div onClick={props.cartToggle} className="mt-3 mb-2 me-2 ms-1">
                                <i className="fas fa-shopping-cart navCart"><span className="ms-2">{totalCartProduct}</span></i>
                            </div>
                        </div>
                   </div>
                    <div className={searchToggle?'col-12 d-lg-none d-flex justify-content-start':'d-none'}>
                        <input autoComplete="off" onChange={SearchProduct} className="Search_Input_Top_two mt-1 mb-2 me-2 ms-2" type="text" placeholder="search here" />
                    </div>
               </div>
           </div>

        </>
    )
}
