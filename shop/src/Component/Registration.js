import React,{useState} from 'react'
import "../css/main.scss"
export default function Registration(props) {
    const [name, setname]       = useState("");
    const [phone, setphone]     = useState("");
    const [address, setaddress] = useState("");
   // const [msg, setmsg] = useState();
     const Registration =  () =>{
         const formData = new FormData();
         formData.append('name',name);
         formData.append('phone',phone);
         formData.append('address',address);
         props.registration(formData);
     }
    return (
        <>
          <div className="row">
              <div className="col-10 offset-1">
                 <div className="text-center regis_head_text">
                   <h1 className="mt-3 mb-3 ">Registration</h1>
                     <div className="mb-2" style={{color:"red",fontSize:"18px"}}>{props.msg}</div>
                 </div>
                 
                        <div className="form-floating mb-3">
                            <input onChange={(arg)=>{setname(arg.target.value)}} type="text" className="form-control" id="floatingInput" placeholder="name@example.com"/>
                             <label for="floatingInput">Name </label>
                        </div>
                        <div className="form-floating">
                            <input onChange={(arg)=>{setphone(arg.target.value)}} type="text" className="form-control" id="floatingPassword" placeholder="Password"/>
                            <label for="floatingPassword">Phone</label>
                        </div>
                        <div className="form-floating mt-3">
                            <textarea  onChange={(arg)=>{setaddress(arg.target.value)}} className="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style={{height:"100px"}}></textarea>
                            <label for="floatingTextarea2">Addres</label>
                        </div>
                        <div class="d-grid gap-2 mt-4 mb-4 form-button">
                            <button onClick={Registration} className="btn btn-primary" type="button"><span className="form-button-text">Register</span></button>
                        </div>
                 
              </div>
          </div>

        </>
    )
}

