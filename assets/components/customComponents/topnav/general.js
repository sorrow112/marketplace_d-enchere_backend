import { Grid } from "@mui/material";
import { styled } from "@mui/system";

export const TopNavGrid = styled(Grid)(({ theme }) => ({
  display: "flex",
  paddingLeft: "20px",
  alignItems: "center",
  alignContent: "space-between",
}));
