import * as React from "react";
import MenuIcon from "@mui/icons-material/Menu";
import logoPath from "../media/images/logo.png";
import "../styles/app.css";
import Autowhatever from "react-autowhatever/dist/Autowhatever";
import ShoppingCartIcon from "@mui/icons-material/ShoppingCart";
import {
  Box,
  Select,
  MenuItem,
  Toolbar,
  Typography,
  Link,
  IconButton,
  AppBar,
  TextField,
  FormControl,
  InputLabel,
  Grid,
} from "@mui/material";
import { makeStyles } from "@mui/styles";
import TopNavLink from "./customComponents/topnav/TopNavLink";

const useStyles = makeStyles({
  topnavlink: {
    display: "block",
    color: "black!important",
    marginRight: "3%!important",
    marginLeft: "2%!important",
  },
  logo: {
    width: "10%",
    marginRight: "1%",
    minWidth: 100,
    marginRight:20
  },
});

const TopNavBar = () => {
  const classes = useStyles(); //could take props
  return (
    <div>
      <Box
        sx={{
          height: 70,
          backgroundColor: "#F5F5F5",
        }}
      >
        <AppBar sx={{ backgroundColor: "#DCDCDC" }} position="static">
          <Grid container>
            <Grid xs={9} sx={{
              display: "flex",
              paddingLeft: "20px",
              alignItems: "center",

            }}>
              <IconButton
                size="large"
                edge="start"
                aria-label="open drawer"
                sx={{ mr: "1%" }}
              >
                <MenuIcon />
              </IconButton>

              <img src={logoPath} className={classes.logo} />

              <TopNavLink text="tous les encheres"></TopNavLink>
              <TopNavLink text="categories"></TopNavLink>
              <FormControl sx={{ width: "8%" , marginLeft:5}}>
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
                sx={{ width: "30%",
              mr:5
              , minWidth:100}}
              />
              
            </Grid>
            <Grid

              xs={3}
              sx={{
                display: "flex",
                justifyContent: "flex-end",
                alignItems: "center",
                paddingRight: "20px",
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
            </Grid>
          </Grid>
        </AppBar>
      </Box>
    </div>
  );
};

export default TopNavBar;
