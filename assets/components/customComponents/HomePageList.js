import { Card, CardContent, Toolbar, Typography } from '@mui/material'
import React from 'react'
import demoListImage from "../../media/images/demoListImage.png";

const styles = {
    productsTypography:{
        mt:3
    },
    productsGrid: { 
        backgroundColor: "white" , 
        justifyContent: "space-between", 
        padding: 3,
        mt: 2
      }
}
const HomePageList = ({ventes}) => {
    
  return (
    <Toolbar sx={styles.productsGrid}>
          {Object.keys(ventes).map((key, index) => (
            <Card key={index} >
              <CardContent>
                <img src={demoListImage} className="cardImage" />
                  <Typography sx={styles.productsTypography} variant="h5">{ventes[key].nom}</Typography>
                    <Typography sx={styles.productsTypography}>
                    {ventes[key].vendeur}
                  </Typography>
                  <Typography sx={styles.productsTypography}>
                    {ventes[key].prix}
                  </Typography>
                
              </CardContent>
            </Card>
          ))}
        </Toolbar>
  )
}

export default HomePageList