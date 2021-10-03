import React from 'react'
import "../css/main.scss"
export default function Main() {
    return (
        <>
          <div id="wraper">
             
                    <nav className="navbar navbar-light bg-light navCustom">
                        <div className="container-fluid">
                            <a className="navbar-brand" href="#">Navbar</a>
                        </div>
                    </nav> 
                <div className="mainarea">
                    <div className="sidebar">
                        <ul className="list-group">
                            <li className="list-group-item">One </li>
                            <li className="list-group-item">two</li>
                            <li className="list-group-item">three</li>
                            <li className="list-group-item">four</li>
                            <li className="list-group-item">five</li>
                        </ul>
                    </div>
                    <div className="content-area">
                       <div className="container-fluid">
                           <div className="row">
                               <div className="col-12">
                                   <p>lorem</p>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
          </div>  
        </>
    )
}
