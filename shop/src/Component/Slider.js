import React from 'react'
import OwlCarousel from 'react-owl-carousel';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel/dist/assets/owl.theme.default.css';
import bannerOne from "../img/banneronw.jpg";
import bannerTwo from "../img/bannertwo.jpg"
import bannerthree from "../img/bannerthree.jpg"
import bannerfour from "../img/bannerfour.jpg"
import bannerfive from "../img/bannerfive.jpg"


export default function Slider() {
    let resOption = {
        0: {
            items:1
        },
        600: {
            items:2
        },
        1000: {
            items:3
        }
    }
    return (
        <>
           <div className="row">
               <div className="col-12">
                    <OwlCarousel className='owl-theme' loop margin={15} dots={false} autoplay={true} responsive={resOption} >
                        <div className='item'>
                            <img src={bannerOne} alt={bannerOne} height="200" width="200"/>
                        </div>
                        <div className='item'>
                            <img src={bannerTwo} alt={bannerTwo} height="200" width="200" />
                        </div>
                        <div className='item'>
                            <img src={bannerthree} alt={bannerthree} height="200" width="200" />
                        </div>
                        <div className='item'>
                            <img src={bannerfour} alt={bannerfour} height="200" width="200" />
                        </div>
                        <div className='item'>
                            <img src={bannerthree} alt={bannerthree} height="200" width="200"/>
                        </div>
                        <div className='item'>
                            <img src={bannerfive} alt={bannerfive} height="200" width="200" />
                        </div>
                       
                        
                    </OwlCarousel>
               </div>
           </div> 

        </>
    )
}
