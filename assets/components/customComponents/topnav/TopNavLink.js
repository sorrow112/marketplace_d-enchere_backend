import React from "react";
import { styled } from "@mui/system";
import { Link } from "@mui/material";

const TopNavLink = (props) => {
  const CustomLink = styled(Link)(({ theme }) => ({
    [theme.breakpoints.down("md")]: {
      display: "none",
    },
    marginLeft:5
  }));
    return (
      <CustomLink variant="h6" href="#" underline="none" >
        {props.text}
      </CustomLink>
  )

};

export default TopNavLink;
