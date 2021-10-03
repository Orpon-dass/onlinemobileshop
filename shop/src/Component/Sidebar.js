import React, { useState,useEffect} from 'react';
import { useHistory } from 'react-router';
import "../css/main.scss";
import {Link} from 'react-router-dom';
export default function Sidebar() {
    const [banrname, setbanrname] = useState([]);
    const [arrow, setarrow] = useState(true);
    const [arrowtwo, setarrowtwo] = useState(true);
    const [arrowthree, setarrowthree] = useState(true);
    const history = useHistory();
    const arrowControl=()=>{
        setTimeout(() => {
            setarrow(!arrow);
        }, 200)
    }
   const brandName = async ()=>{
       let brand = await fetch("http://127.0.0.1:8000/api/brandname");
       let allbrand = await brand.json();
       setbanrname(allbrand);
   }
   useEffect(() => {
    brandName(); 
   }, []);
   const logOutFunction = ()=>{
       localStorage.removeItem("customerId");
       history.push("/");
   }
    return (
        <>
          <div className="sidebarItem">
           <div className="text-center mt-2 mb-2 " style={{fontSize:"20px",color:'red'}}>Sidebar title</div>
             <ul className="list-group list-group-flush me-2 ms-2">
                    <li  className="list-group-item ms-2 me-2 mt-1"><i className={arrow ? 'fas fa-arrow-circle-right sideLiastIcon pe-2' : 'fas fa-arrow-circle-down sideLiastIcon pe-2'}></i>
                        <a onClick={arrowControl} data-bs-toggle="collapse" href="#collapseExampleone" role="button" aria-expanded="false" aria-controls="collapseExampleone">Brand Name </a>
                        <ul className="collapse subListItem" id="collapseExampleone">
                            {banrname.map((brand)=>
                            <li key={brand.id}>
                                <Link to={"/productByBrandName/"+brand.BrandName}>
                                  {brand.BrandName}
                                </Link>
                            </li>
                            )}
                            
                        </ul>
                    </li>

                    <li className="list-group-item ms-2 me-2 mt-1">
                        <i className={arrowtwo ? 'fas fa-arrow-circle-right sideLiastIcon pe-2' : 'fas fa-arrow-circle-down sideLiastIcon pe-2'}></i>
                        <a onClick={() => { setarrowtwo(!arrowtwo)}} data-bs-toggle="collapse" href="#collapseExampletwo" role="button" aria-expanded="false" aria-controls="collapseExampletwo">Category </a>
                        <ul className="collapse subListItem" id="collapseExampletwo">
                            <li>Subitem one</li>
                            <li>Subitem two</li>
                            <li>Subitem three</li>
                        </ul>
                    </li>

                    <li className="list-group-item ms-2 me-2 mt-1" >  <i className='fas fa-arrow-circle-right sideLiastIcon pe-2' />Item two </li>
                    {!localStorage.getItem("customerId") ? 
                   <Link to="/login" style={{textDecoration:"none"}}>
                     <li className="list-group-item ms-2 me-2 mt-1">  <i className='fas fa-arrow-circle-right sideLiastIcon pe-2' />LogIn</li>
                   </Link>
                      :
                    <li className="list-group-item ms-2 me-2 mt-1">
                        <i className={arrowthree ? 'fas fa-arrow-circle-right sideLiastIcon pe-2' : 'fas fa-arrow-circle-down sideLiastIcon pe-2'}></i>
                        <a onClick={() => { setarrowthree(!arrowthree)}} data-bs-toggle="collapse" href="#collapseExamplethree" role="button" aria-expanded="false" aria-controls="collapseExampletwo">Profile </a>
                        <ul className="collapse subListItem" id="collapseExamplethree">
                            <Link to="/orderDetails">
                            <li>Order details</li>
                            </Link>
                            <li style={{cursor:"pointer"}} onClick={logOutFunction}>Logout</li>
                            <li >Subitem three</li>
                        </ul>
                    </li>
                   }
             </ul>
                
          </div>  
        </>
    )
}
