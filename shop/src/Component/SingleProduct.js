import React,{useEffect,useState} from 'react'
import {useParams} from 'react-router-dom'
import Product from "./Product";
import EventsLoader from "../Component/SingleProSkeleton";
import "../css/main.scss"
export default function SingleProduct() {
     const [SingleProduct, setSingleProduct] = useState({});
     const [newImage, setnewImage] = useState()
     const [singleSkeleton, setsingleSkeleton] = useState(true);
    let { id } = useParams();
      useEffect(() => {
          setTimeout(() => {
              const singleData = async ()=>
                 {
                   let singleProductData = await fetch("http://127.0.0.1:8000/api/singleProduct/"+id);
                   let product           = await singleProductData.json();
                                        if(product.productName){
                                            setSingleProduct(product);
                                            setnewImage(product.productImageOne)
                                            setsingleSkeleton(false);
                                        }
                 }
            singleData();
          },1000);
      },[id]);
        
         const fileLocation ="http://127.0.0.1:8000/storage/avatars/";
         let image ={
             imageOne:fileLocation+SingleProduct.productImageOne,
             imageTwo:fileLocation+SingleProduct.productImageTwo,
             imageThree:fileLocation+SingleProduct.productImageThree,
             imageFour:fileLocation+SingleProduct.productImageFour,

         }
    return (
        <>
        {singleSkeleton ?
         <div className="d-flex justify-content-center mt-4">
            <EventsLoader />
         </div>
         :
            <div className="row">
                <div className="col-sm-12 col-md-6 col-lg-6 mt-3 mb-3  d-flex justify-content-center align-items-center ">
                    <div className="singleProductWraaper ps-2 pe-2">
                        <img className="img-fluid" src={fileLocation+newImage} alt="productImage" width="300px" height="300px" />
                    </div>
                    <div className="singleSmallImage d-flex flex-column ps-2">
                        <img className="img-fluid pt-2" onClick={()=>{setnewImage(SingleProduct.productImageOne)}} src={image.imageOne} alt="productImage" width="40px" height="40px" />
                        <img className="img-fluid pt-2" onClick={()=>{setnewImage(SingleProduct.productImageTwo)}} src={image.imageTwo} alt="productImage" width="40px" height="40px" />
                        <img className="img-fluid pt-2" onClick={()=>{setnewImage(SingleProduct.productImageThree)}} src={image.imageThree} alt="productImage" width="40px" height="40px" />
                        <img className="img-fluid pt-2"onClick={()=>{setnewImage(SingleProduct.productImageFour)}} src={image.imageFour} alt="productImage" width="40px" height="40px" />
                    </div>
                </div>
                <div className="col-sm-12 col-md-6 col-lg-6 mt-3 ">
                    <div className="productDetailsWraper pe-2 ps-2">
                        <h4 className="pt-1">{SingleProduct.productName}</h4>
                        <h4>Price : {SingleProduct.productPrice} Tk </h4>
                        <h4>Brand : {SingleProduct.brandName} </h4>
                        <h6 className="fw-bolder">Product Details : </h6>
                        <p>{SingleProduct.productDescription}</p>

                    </div>
                </div>
                <div className="col-12 text-center pt-3 pb-2" >
                    <h3>Similar Product </h3>
                </div>
                   
            </div>
}    
<div className="row">
<Product />
</div>
        </>
    )
}
