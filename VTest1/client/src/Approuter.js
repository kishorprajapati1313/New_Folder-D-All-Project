import React from 'react'
import {Routes, Route} from "react-router-dom"
import Home from './Pages/Home'
import ImageHome from './Component/ImagesComponents/ImageHome'
// import { Box } from '@mui/material'
import Login from './Pages/LoginPages/Login'
import Sign from './Pages/LoginPages/Sign'
import Forgot from './Pages/LoginPages/Forgot'
import Videohistroy from './Pages/Profile/Video/Videohistroy'
import Profilehome from './Pages/Profile/Profilehome'
import Profilepayemnt from './Pages/Profile/Profilepayemnt'
import Imagehistory from './Pages/Profile/Image/Imagehistory'


const Approuter = () => {
  return (
    <>
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/home" element={<Home />} />
      <Route path="/image" element={<ImageHome />} />

      {/* Login Pages */}
      <Route path="/login" element={<Login />} />
      <Route path="/signin" element={<Sign />} />
      <Route path="/forgotpas" element={<Forgot />} />

      {/* Profile Detail */}
      <Route path="/profile/home" element={<Profilehome />} />
      <Route path="/profile/billing" element={<Profilepayemnt />} />
      <Route path="/profile/video" element={<Videohistroy />} />
      <Route path="/profile/image" element={<Imagehistory />} />
      <Route path="/profile/" element={<ImageHome />} />

    </Routes>
    </>
  )
}

export default Approuter