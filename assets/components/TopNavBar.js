import * as React from "react";
import MenuIcon from "@mui/icons-material/Menu";
import logoPath from "../media/images/logo.png";
import "../styles/app.css";
import Autowhatever from "react-autowhatever/dist/Autowhatever";
import ShoppingCartIcon from "@mui/icons-material/ShoppingCart";
import TopNavLink from "./customComponents/topnav/TopNavLink";
import {TopNavGrid} from "./customComponents/topnav/general";
import {
  Box,
  Select,
  MenuItem,
  Typography,
  IconButton,
  AppBar,
  TextField,
  FormControl,
  InputLabel,
  Grid,
  
} from "@mui/material";



const TopNavBar = () => {
  return (
      <Box
        sx={{
          height: 70,
          backgroundColor: "#F5F5F5",
        }}
      >
        <AppBar position="static">
          <Grid container>
            <TopNavGrid
              md={8}
              sm={11}
            >
              <IconButton
                size="large"
                edge="start"
                aria-label="open drawer"
                sx={{ mr: 3 }}
              >
                <MenuIcon />
              </IconButton>
              <img src={logoPath} className="logo" />
              <TopNavLink text="tous les encheres"></TopNavLink>
              <TopNavLink text="categories"></TopNavLink>
              <FormControl sx={{ minWidth: "8%", ml: "5%"}}>
                <InputLabel>type</InputLabel>
                <Select>
                  <MenuItem value={"enchere"}>enchere</MenuItem>
                  <MenuItem value={"enchereInv"}>enchere inverse</MenuItem>
                  <MenuItem value={"vente"}>ventes</MenuItem>
                  <MenuItem value={"user"}>utilisateurs</MenuItem>
                </Select>
              </FormControl>
              {/* uncomment for real search bar */}
              {/* <Autowhatever
                //   items={}                 //list of items to search
                //   renderItem={}            //the value to display (name)
                //   inputProps={}            //placeholder/value(the onChange state value)/onChange: 
                //   highlightedItemIndex={}  //hovered item index
              /> */}
              <TextField
                id="outlined-basic"
                label="Outlined"
                variant="outlined"
                sx={{ width: "92%", mr: 5, minWidth: 100 }}
              />
            </TopNavGrid>
            <TopNavGrid
              md={4}
              sm={1}
              sx={{
                justifyContent: "flex-end",
                paddingRight: 2
              }}
            > 
              <TopNavLink text="se connecter"></TopNavLink>
              <TopNavLink text="créer un compte"></TopNavLink>
              <IconButton
                size="large"
                edge="end"
                aria-label="open drawer"
                sx={{ ml: "0.5%" }}
              >
                <ShoppingCartIcon />
              </IconButton>
            </TopNavGrid>
          </Grid>
        </AppBar>
      </Box>
  );
};

export default TopNavBar;
