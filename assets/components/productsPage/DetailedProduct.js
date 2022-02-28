import { Grid, Typography } from '@mui/material'
import React from 'react'
import img1 from "../../media/images/demosToBeReplaced/pc1.jpg"
// import img2 from "../../media/images/demosToBeReplaced/pc2.jpg"
// import img3 from "../../media/images/demosToBeReplaced/pc3.jpg"
// import img4 from "../../media/images/demosToBeReplaced/pc4.jpg"

const DetailedProduct = () => {


    // replace these with a real product
    const articleData = {
        name: "name",
        state: "state",
        localisation: "localisation",
        codeBar: "codeBar",
        marque: "marque",
        description: "description",
      };

      const enchereData = {
        quantity: "quantity",
        initPrice: "initPrice",
        immediatePrice: "immediatePrice",
        startDate: "startDate",
        endDate: "endDate",
        category: "category"
    }
    // replace these with paths of documents
    const myImg = "../../media/images/demosToBeReplaced/pc1.jpg"
    const myImgs = ["../../media/images/demosToBeReplaced/pc2.jpg", "../../media/images/demosToBeReplaced/pc3.jpg", "../../media/images/demosToBeReplaced/pc4.jpg"]
    const test = ()=>{
        myImgs.map(path=>console.log(path))
    }
    
  return (
    <Grid container>
        <Grid item xs={6}>
            <Grid item>
            <Typography variant='h3'>{articleData.name}</Typography>
            </Grid>
            <Grid item sx={{height: "30%", width: "50%", backgroundColor: "blue"}}>
                {/* main image goes here, remove the styling  */}
            </Grid>                
            <Grid item>
            </Grid>
            
        </Grid>

    </Grid>
  )
}

export default DetailedProduct