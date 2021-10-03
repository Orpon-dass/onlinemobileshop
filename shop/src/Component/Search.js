import React from 'react'
import "../css/main.scss";
import {Link} from "react-router-dom";
export default function Search(props) {
    let Search_value =props.SearchData;

    const HideSearch = ()=>{
        props.sendSearchFun();
    }
    return (
        <> 
            <div className="bg-light me-2 pb-3 mt-5 mt-md-0">
                {Search_value.map((val)=>
                <Link to={"/singleProduct/"+val.id} style={{ textDecoration: 'none' }} >
                    <div key={val.id} className="" onClick={HideSearch} >
                        <div key={val.id} className="d-flex align-items-center">
                            <div>
                                <img className="img-fluid mt-2 ms-3" src={"http://127.0.0.1:8000/storage/avatars/"+val.productImageOne} width="30" alt="productImage" />
                            </div>

                            <div className="productName ms-3">{val.productName}</div>
                        </div>
                    </div> 
                </Link>
                )}
            </div> 
        </>
    )
}
