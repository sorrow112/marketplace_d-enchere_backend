import React from 'react'
import Register from '../register/Register.js'
import TopNavBar from './subComponents/TopNavBar'
import { Box } from '@mui/material'
import Login from '../login/Login.js'
import Homepage from '../homepage/Homepage.js'
import VentesListing from '../productsPage/VentesListing.js'
import CreerArticle from '../forms/CreerArticle.js'


const styles = {
  body:{
    backgroundColor: "primary.main"
  }
}
const Base = () => {
  return (
    <Box sx={styles.body}>
    
    <TopNavBar />
    <CreerArticle />
    
    {/* <Homepage /> */}
    {/* <Register /> */}
    {/* <Login /> */}
    {/* <VentesListing /> */}
    </Box>
  )
}

export default Base