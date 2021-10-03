import React,{useState} from 'react'
import { useHistory } from 'react-router';
import "../css/main.scss"
export default function Login() {
    const [Phone, setPhone] = useState(null);
    const [otp, setotp] = useState(null);
    const history =useHistory();
   const loginUser = async ()=>{
       let userInfo ={
           userPhone:Phone,
           userOtp:otp
       }
         let user = await fetch("http://127.0.0.1:8000/api/loginuser",{
             method:"POST",
             headers:{
                 "Content-Type":"application/json",
                 "Accept":"application/json"
             },
             body:JSON.stringify(userInfo)
         });
          let userId = await user.json();
          if(userId){
              history.push("/");
              localStorage.setItem("customerId",userId.id);
          }
         //console.log(userId.id);
   }
    return (
        <>
          <div className="row test-class">
             <div className="col-8 mx-auto">
                <div className="form-floating mb-3 mt-4">
                    <input onChange={(e)=>{setPhone(e.target.value)}} type="text" className="form-control" id="floatingInput" placeholder="017xxxxxxxx"/>
                    <label for="floatingInput">Phone Number</label>
                </div> 
                <div className="form-floating mb-4 mt-4">
                    <input onChange={(e)=>{setotp(e.target.value)}} type="text" className="form-control" id="floatingInput" placeholder="017xxxxxxxx"/>
                    <label for="floatingInput">OTP</label>
                </div>
                <div className="d-grid gap-2 col-6 mx-auto">
                    <button onClick={loginUser} className="btn btn-login" type="button">Button</button>
                </div> 
             </div>
          </div>
        </>
    )
}
