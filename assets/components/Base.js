import React from 'react'
import { Register } from './Register'
import TopNavBar from './TopNavBar'
import { Box } from '@mui/material'
import Login from './Login'



const Base = () => {
  return (
    <Box>
    <TopNavBar />
    {/* <Register /> */}
    <Login />
    </Box>
  )
}

export default Base