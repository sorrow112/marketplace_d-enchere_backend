import React from 'react'
import Register from '../register/Register.js'
import TopNavBar from './subComponents/TopNavBar'
import { Box } from '@mui/material'
import Login from '../login/Login.js'
import Homepage from '../homepage/Homepage.js'


const styles = {
  body:{
    backgroundColor: "secondary.main"
  }
}
const Base = () => {
  return (
    <Box sx={styles.body}>
    
    <TopNavBar />
    <Homepage />
    {/* <Register /> */}
    {/* <Login /> */}
    </Box>
  )
}

export default Base