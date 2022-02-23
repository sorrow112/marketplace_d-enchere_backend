import React from 'react'
import { Register } from './Register'
import TopNavBar from './TopNavBar'
import { Box } from '@mui/material'
import Login from './Login'
import Homepage from './Homepage'


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