import React from "react";
import { styled } from "@mui/system";
import { Link } from "@mui/material";

const TopNavLink = (props) => {
  return (
    <Link variant="h8" href="#" underline="none" >
      {props.text}
    </Link>
  );
};

export default TopNavLink;
