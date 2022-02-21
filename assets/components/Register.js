import { Box, Button, Grid, TextField } from "@mui/material";
import React from "react";
import { useState } from "react";
import DateAdapter from "@mui/lab/AdapterDateFns";
import LocalizationProvider from "@mui/lab/LocalizationProvider";
import DesktopDatePicker from "@mui/lab/DesktopDatePicker";

export const Register = () => {

  //#region form data state
  const [date, setDate] = React.useState(new Date());
  const [name, setName] = React.useState("");
  const [telephone, setTelephone] = React.useState("");
  const [email, setEmail] = React.useState("");
  const [password, setPassword] = React.useState("");
  const [displayName, setDisplayName] = React.useState("");
  //#endregion

  //#region state manipulation mathods
  const handleChange = (newValue) => {
    setDate(newValue);
  };
  const handleDate = (event) => {
    setDate(event.target.value);
  };
  const handleName = (event) => {
    setName(event.target.value);
  };
  const handleTelephone = (event) => {
    setTelephone(event.target.value);
  };
  const handleEmail = (event) => {
    setEmail(event.target.value);
  };
  const handlePassword = (event) => {
    setPassword(event.target.value);
  };
  const handleDisplayName = (event) => {
    setDisplayName(event.target.value);
  };
  //#endregion

  //#region registration POST request on submit
  const onSubmit = (event) => {
    event.preventDefault();
    const axios = require("axios");
    axios
      .post("/api/users", {
        name: name,
        displayName: displayName,
        email: email,
        password: password,
        telephone: telephone,
        avatar: "demo",
        isActive: true,
        birthDate: date,
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
  };
  //#endregion

  return (
    <Grid
      container
      spacing={0}
      direction="column"
      alignItems="center"
      justifyContent="center"
      style={{ minHeight: "100vh" }}
    >
      <Grid item xs={8}>
        <Box
          component="form"
          onSubmit={onSubmit}
          sx={{
            "& .MuiTextField-root": { m: 1, width: "25ch" },
            width: "80%",
            display: "flex",
            flexDirection: "column",
          }}
        >
          <TextField
            required
            id="name"
            label="Nom complet"
            value={name}
            onChange={handleName}
          />
          <TextField
            required
            id="displayName"
            label="Nom d'utilisateur"
            value={displayName}
            onChange={handleDisplayName}
          />
          <TextField
            required
            id="email"
            label="Adresse Email"
            value={email}
            onChange={handleEmail}
          />
          <TextField
            required
            id="password"
            label="mot de passe"
            type="password"
            value={password}
            onChange={handlePassword}
          />
          <TextField
            required
            id="telephone"
            label="numero de téléphone"
            value={telephone}
            onChange={handleTelephone}
          />
          <LocalizationProvider dateAdapter={DateAdapter}>
            <DesktopDatePicker
              label="date de naissance"
              inputFormat="MM/dd/yyyy"
              value={date}
              onChange={setDate}
              renderInput={(params) => <TextField {...params} />}
            />
          </LocalizationProvider>
          <Button type="submit">sub</Button>
        </Box>
      </Grid>
    </Grid>
  );
};
