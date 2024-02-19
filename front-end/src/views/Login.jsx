import React, { useState } from 'react'
import { NavLink, useNavigate } from 'react-router-dom'

const Login = () => {
    const navigate = useNavigate()
    let [email, setEmail] = useState("")
    let [password, setPassword] = useState("")

    const loginHandle = () => {
        fetch("http://127.0.0.1:8000/api/login", {
            method: "POST",
            headers: {
                "Accept" : "application/json"
            },
            body: JSON.stringify({
                "email" : email,
                "password" : password
            })
        })
        .then(response => console.log(response))
    }
    console.log(email)
    console.log(password)

  return (
    <>
    <div className='w-screen h-screen flex flex-col gap-[1rem] justify-center items-center'>
        <h1 className='font-bold text-[3rem]'>Login</h1>
        <form className="w-[80vw] mx-auto">
            <div className="mb-5">
                <label htmlFor="email" className="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                <input type="email" id="email" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onChange={e => setEmail(e.target.value)} placeholder="Masukkan nama" value={email} required />
            </div>
            <div className="mb-5">
                <label htmlFor="password" className="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
                <input type="password" id="password" onChange={e => setPassword(e.target.value)} value={password} className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div className="flex items-start mb-5">
                <div className="flex items-center h-5">
                <input id="remember" type="checkbox" value="" className="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required />
                </div>
                <label htmlFor="remember" className="ms-2 text-sm font-medium text-gray-900 -300">Remember me</label>
            </div>
            <button type="button" onClick={loginHandle} className="text-white bg-blu hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center  -blu -blue-800">Submit</button>
        </form>
    </div>
    </>
  )
}

export default Login